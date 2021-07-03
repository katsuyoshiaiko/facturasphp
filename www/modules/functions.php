<?php
// plugin = modules
// creation date : 
// 
// 
function modules_field_id($field, $id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $field FROM modules WHERE id= ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}


function modules_field_code($field, $code) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $field FROM modules WHERE code= ?");
    $req->execute(array($code));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function modules_search_by_unique($field, $FieldUnique, $valueUnique) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $field FROM modules WHERE   $FieldUnique = ?");
    $req->execute(array($valueUnique));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function modules_list() {
    global $db;
    $limit = 999;

    $data = null;

    $req = $db->prepare("SELECT * FROM modules  ORDER BY order_by LIMIT $limit  ");

    $req->execute(array(
        "limit" => $limit
    ));
    $data = $req->fetchall();
    return $data;
}

function modules_details($id) {
    global $db;
    $req = $db->prepare("SELECT * FROM modules WHERE id= ? ");
    $req->execute(array($id));
    $data = $req->fetch();
    return $data;
}

function modules_delete($id) {
    global $db;
    $req = $db->prepare("DELETE FROM modules WHERE id=? ");
    $req->execute(array($id));
}

function modules_edit($id ,  $name ,  $sub_modules ,  $description ,  $author ,  $author_email ,  $url ,  $version ,  $order_by ,  $status   ) {

    global $db;
    $req = $db->prepare(" UPDATE modules SET "
            
            ."name=:name , "   
."sub_modules=:sub_modules , "   
."description=:description , "   
."author=:author , "   
."author_email=:author_email , "   
."url=:url , "   
."version=:version , "   
."order_by=:order_by , "   
."status=:status  "   

            
                    
            
                    
            . " WHERE id=:id ");
    $req->execute(array(
 "id" =>$id ,   "name" =>$name ,   "sub_modules" =>$sub_modules ,   "description" =>$description ,   "author" =>$author ,   "author_email" =>$author_email ,   "url" =>$url ,   "version" =>$version ,   "order_by" =>$order_by ,   "status" =>$status ,  
                

));
}

function modules_add($name ,  $sub_modules ,  $description ,  $author ,  $author_email ,  $url ,  $version ,  $order_by ,  $status   ) {
    global $db;
    $req = $db->prepare(" INSERT INTO `modules` ( `id` ,   `name` ,   `sub_modules` ,   `description` ,   `author` ,   `author_email` ,   `url` ,   `version` ,   `order_by` ,   `status`   )
                                       VALUES  (:id ,  :name ,  :sub_modules ,  :description ,  :author ,  :author_email ,  :url ,  :version ,  :order_by ,  :status   ) ");

    $req->execute(array(

 "id" => null ,  
 "name" => $name ,  
 "sub_modules" => $sub_modules ,  
 "description" => $description ,  
 "author" => $author ,  
 "author_email" => $author_email ,  
 "url" => $url ,  
 "version" => $version ,  
 "order_by" => $order_by ,  
 "status" => $status   
                        
            )
    );
    
     return $db->lastInsertId();
}



function modules_search($txt) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT * FROM modules 
    
            WHERE id like :txt OR id like :txt
OR name like :txt
OR sub_modules like :txt
OR description like :txt
OR author like :txt
OR author_email like :txt
OR url like :txt
OR version like :txt
OR order_by like :txt
OR status like :txt
                           
");
    $req->execute(array(
        "txt" => "%$txt%"
    ));
    $data = $req->fetchall();
    return $data;
}



function modules_select($k, $v, $selected="", $disabled=array()) {    
    $c = "";    
    foreach (modules_list() as $key => $value) {        
        $s = ($selected == $value[$k])?" selected  ":"";       
        $d = ( in_array($value[$k], $disabled )) ? " disabled ":"";                        
        $c .= "<option value=\"$value[$k]\" $s $d >". ucfirst($value[$v])."</option>" ;
    }    
    echo  $c;     
}
function modules_is_id($id){
     return true;
}

function modules_is_name($name){
     return true;
}

function modules_is_sub_modules($sub_modules){
     return true;
}

function modules_is_description($description){
     return true;
}

function modules_is_author($author){
     return true;
}

function modules_is_author_email($author_email){
     return true;
}

function modules_is_url($url){
     return true;
}

function modules_is_version($version){
     return true;
}

function modules_is_order_by($order_by){
     return true;
}

function modules_is_status($status){
     return true;
}

function modules_change_status($id , $status   ) {

    global $db;
    $req = $db->prepare(" UPDATE modules SET "
            
        ."status=:status  "   
        
        . " WHERE id=:id ");
    
    $req->execute(array(
        "id" =>$id ,    
        "status" =>$status ,                  

));
}

function modules_field_module($field, $module) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $field FROM modules WHERE name= ?");
    $req->execute(array($module));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}




function modules_search_module_by_sub_module($sub_module) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT name FROM modules WHERE sub_modules like ?");
    $req->execute(array("%$sub_module%"));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

/**
 * Lista de los sub_modules by module
 * @global type $db
 * @param type $module
 * @return type
 */
function modules_search_sub_modules_by_module($module) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT sub_modules FROM modules WHERE name like ?");
    $req->execute(array("$module"));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}


function modules_update_sub_modules_by_module($id, $module ,  $sub_modules ) {
    global $db;
    $req = $db->prepare(" UPDATE modules SET sub_modules=:sub_modules  WHERE id=:id AND name=:name ");
    $req->execute(array(
        "id"=>$id, 
        "name" =>$module ,   
        "sub_modules" =>$sub_modules ,                   
));
}


