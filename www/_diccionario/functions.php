<?php
// plugin = _diccionario
// creation date : 
// 
// 
function _diccionario_field_id($field, $id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $field FROM _diccionario WHERE status = 1 AND id= ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function _diccionario_search_by_unique($field, $FieldUnique, $valueUnique) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $field FROM _diccionario WHERE status = 1 AND  $FieldUnique = ?");
    $req->execute(array($valueUnique));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function _diccionario_list() {
    global $db;
    $limit = 999;

    $data = null;

    $req = $db->prepare("SELECT * FROM _diccionario WHERE status = 1 ORDER BY id DESC LIMIT $limit  ");

    $req->execute(array(
        "limit" => $limit
    ));
    $data = $req->fetchall();
    return $data;
}

function _diccionario_details($id) {
    global $db;
    $req = $db->prepare("SELECT * FROM _diccionario WHERE id= ? ");
    $req->execute(array($id));
    $data = $req->fetch();
    return $data;
}

function _diccionario_delete($id) {
    global $db;
    $req = $db->prepare("DELETE FROM _diccionario WHERE id=? ");
    $req->execute(array($id));
}

function _diccionario_edit($id ,  $content ,  $language ,  $translation ,  $order_by ,  $status   ) {

    global $db;
    $req = $db->prepare(" UPDATE _diccionario SET "
            
            ."content=:content , "   
."language=:language , "   
."translation=:translation , "   
."order_by=:order_by , "   
."status=:status  "   

            
                    
            
                    
            . " WHERE id=:id ");
    $req->execute(array(
 "id" =>$id ,   "content" =>$content ,   "language" =>$language ,   "translation" =>$translation ,   "order_by" =>$order_by ,   "status" =>$status ,  
                

));
}

function _diccionario_add($content ,  $language ,  $translation ,  $order_by ,  $status   ) {
    global $db;
    $req = $db->prepare(" INSERT INTO `_diccionario` ( `id` ,   `content` ,   `language` ,   `translation` ,   `order_by` ,   `status`   )
                                       VALUES  (:id ,  :content ,  :language ,  :translation ,  :order_by ,  :status   ) ");

    $req->execute(array(

 "id" => null ,  
 "content" => $content ,  
 "language" => $language ,  
 "translation" => $translation ,  
 "order_by" => $order_by ,  
 "status" => $status   
                        
            )
    );
    
     return $db->lastInsertId();
}



function _diccionario_search($txt) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT * FROM _diccionario 
    
            WHERE id like :txt OR id like :txt
OR content like :txt
OR language like :txt
OR translation like :txt
OR order_by like :txt
OR status like :txt
                           
");
    $req->execute(array(
        "txt" => "%$txt%"
    ));
    $data = $req->fetchall();
    return $data;
}



function _diccionario_select($k, $v, $selected="", $disabled=array()) {    
    $c = "";    
    foreach (_diccionario_list() as $key => $value) {        
        $s = ($selected == $value[$k])?" selected  ":"";       
        $d = ( in_array($value[$k], $disabled )) ? " disabled ":"";                        
        $c .= "<option value=\"$value[$k]\" $s $d >". ucfirst($value[$v])."</option>" ;
    }    
    echo  $c;     
}
function _diccionario_is_id($id){
     return true;
}

function _diccionario_is_content($content){
     return true;
}

function _diccionario_is_language($language){
     return true;
}

function _diccionario_is_translation($translation){
     return true;
}

function _diccionario_is_order_by($order_by){
     return true;
}

function _diccionario_is_status($status){
     return true;
}

function _diccionario_search_translation_by_content_lang($content, $language) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT translation FROM _diccionario 
    
            WHERE content = :content AND language = :language LIMIT 1
                           
");
    $req->execute(array(
        "content" => $content, 
        "language" => $language
    ));
    $data = $req->fetch();
    return (isset($data[0]))? $data[0]: false;
}