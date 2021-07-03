<?php
// plugin = _translations
// creation date : 
// 
// 
function _translations_field_id($field, $id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $field FROM _translations WHERE id= ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function _translations_search_by_unique($field, $FieldUnique, $valueUnique) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $field FROM banks WHERE $FieldUnique = ?");
    $req->execute(array($valueUnique));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function _translations_list() {
    global $db;
    $limit = 999;

    $data = null;

    $req = $db->prepare("SELECT * FROM _translations ORDER BY id DESC LIMIT $limit ");

    $req->execute(array(
        "limit" => $limit
    ));
    $data = $req->fetchall();
    return $data;
}

function _translations_details($id) {
    global $db;
    $req = $db->prepare("SELECT * FROM _translations WHERE id= ? ");
    $req->execute(array($id));
    $data = $req->fetch();
    return $data;
}

function _translations_delete($id) {
    global $db;
    $req = $db->prepare("DELETE FROM _translations WHERE id=? ");
    $req->execute(array($id));
}

function _translations_edit($id ,  $content ,  $language ,  $translation   ) {

    global $db;
    $req = $db->prepare(" UPDATE _translations SET "
            
            ."content=:content , "   
."language=:language , "   
."translation=:translation  "   

            
                    
            
                    
            . " WHERE id=:id ");
    $req->execute(array(
 "id" =>$id ,   "content" =>$content ,   "language" =>$language ,   "translation" =>$translation ,  
                

));
}

function _translations_add($content ,  $language ,  $translation   ) {
    global $db;
    $req = $db->prepare(" INSERT INTO `_translations` ( `id` ,   `content` ,   `language` ,   `translation`   )
                                       VALUES  (:id ,  :content ,  :language ,  :translation   ) ");

    $req->execute(array(

 "id" => null ,  
 "content" => $content ,  
 "language" => $language ,  
 "translation" => $translation   
                        
            )
    );
    
     return $db->lastInsertId();
}



function _translations_search($txt) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT * FROM _translations 
    
            WHERE id like :txt OR id like :txt
OR content like :txt
OR language like :txt
OR translation like :txt
                           
");
    $req->execute(array(
        "txt" => "%$txt%"
    ));
    $data = $req->fetchall();
    return $data;
}



function _translations_select($k, $v, $selected="", $disabled=array()) {    
    $c = "";    
    foreach (_translations_list() as $key => $value) {        
        $s = ($selected == $value[$k])?" selected  ":"";       
        $d = ( in_array($value[$k], $disabled )) ? " disabled ":"";                        
        $c .= "<option value=\"$value[$k]\" $s $d >". ucfirst($value[$v])."</option>" ;
    }    
    echo  $c;     
}
function _translations_is_id($id){
     return true;
}

function _translations_is_content($content){
     return true;
}

function _translations_is_language($language){
     return true;
}

function _translations_is_translation($translation){
     return true;
}

function _translations_by_content_language($content, $language) {
    global $db;
    $data = null;
    $req = $db->prepare(" SELECT translation FROM _translations WHERE content = :content AND language = :language LIMIT 1 ");
    $req->execute(array(
        "content" => $content,
        "language" => $language
    ));
    $data = $req->fetch();
    return (isset($data[0]))?$data[0]:false;
}

function _translations_by_content($content) {
    global $db;
    $data = null;
    $req = $db->prepare(
            "SELECT translation,  language, content
            FROM _translations
            WHERE content = :content  "                
);
    $req->execute(array(
        "content" => $content,        
    ));
    $data = $req->fetchall();
    return (isset($data))?$data:false;
}




function _translations_by_content_id_language($content, $language) {
    global $db;
    $data = null;
    $req = $db->prepare(" SELECT translation FROM _translations WHERE content = :content AND language = :language ");
    $req->execute(array(
        "content" => $content,
        "language" => $language
    ));
    $data = $req->fetch();
    return (isset($data[0]))?$data[0]:false;
}

function _translations_search_extended($content, $language ) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT * FROM _translations WHERE content like :content OR language = :language");
    $req->execute(array(
        "content" => "%$content%",
        "language" => $language
    ));
    $data = $req->fetchall();
    return $data;
}

function _translations_search_by_content($content ) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT * FROM _translations WHERE content like :content");
    $req->execute(array(
        "content" => "%$content%"        
    ));
    $data = $req->fetchall();
    return $data;
}

function _translations_search_by_translation($translation) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT * FROM _translations WHERE translation like :translation");
    $req->execute(array(
        "translation" => "%$translation%"        
    ));
    $data = $req->fetchall();
    return $data;
}



function _translations_total_by_lang($language) {
    global $db;
    $data = null;
    $req = $db->prepare(" SELECT COUNT(*) FROM _translations WHERE  language = :language ");
    $req->execute(array(
        "language" => $language
    ));
    $data = $req->fetch();
    return intval($data[0]);
}

function _translations_search_by_lang($content, $language ) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT * FROM _translations WHERE content = :content AND language = :language");
    $req->execute(array(
        "content" => "$content",
        "language" => $language
    ));
    $data = $req->fetchall();
    return $data;
}

function _translations_search_traduction_in_lang($translation, $language ) {
    global $db;
    $data = null;
    
    if(strtolower($language) == 'all'){
    $req = $db->prepare("SELECT * FROM _translations WHERE translation LIKE :translation ");
    $req->execute(array(
        "translation" => "%$translation%",
      //"language" => $language
    ));        
    }else{
    $req = $db->prepare("SELECT * FROM _translations WHERE translation LIKE :translation AND language = :language");
    $req->execute(array(
        "translation" => "%$translation%",
        "language" => $language
    ));        
    }
    $data = $req->fetchall();
    return $data;
}

function _translations_to_fix( $language ) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT * FROM `_translations` WHERE `language` = :language ");
    $req->execute(array(        
        "language" => $language
    ));
    $data = $req->fetchall();
    return $data;
}

function _translations_fix($id,  $translation   ) {

    global $db;
    $req = $db->prepare(" UPDATE _translations SET "                    
        
        ."translation=:translation  "   

            . " WHERE id=:id ");
    
    $req->execute(array( 
        "id" =>$id ,                   
        "translation" =>$translation ,  
                

));
}