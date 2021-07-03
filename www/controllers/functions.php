<?php
// plugin = controllers
// creation date : 
// 
// 
function controllers_field_id($field, $id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $field FROM controllers WHERE id= ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function controllers_search_by_unique($field, $FieldUnique, $valueUnique) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $field FROM banks WHERE $FieldUnique = ?");
    $req->execute(array($valueUnique));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function controllers_list() {
    global $db;
    $limit = 999;

    $data = null;

    $req = $db->prepare("SELECT * FROM controllers ORDER BY controller LIMIT $limit ");

    $req->execute(array(
        "limit" => $limit
    ));
    $data = $req->fetchall();
    return $data;
}

function controllers_details($id) {
    global $db;
    $req = $db->prepare("SELECT * FROM controllers WHERE id= ? ");
    $req->execute(array($id));
    $data = $req->fetch();
    return $data;
}

function controllers_delete($id) {
    global $db;
    $req = $db->prepare("DELETE FROM controllers WHERE id=? ");
    $req->execute(array($id));
}

function controllers_edit($id ,  $controller ,  $title ,  $description   ) {

    global $db;
    $req = $db->prepare(" UPDATE controllers SET "
            
            ."controller=:controller , "   
."title=:title , "   
."description=:description  "   

            
                    
            
                    
            . " WHERE id=:id ");
    $req->execute(array(
 "id" =>$id ,   "controller" =>$controller ,   "title" =>$title ,   "description" =>$description ,  
                

));
}

function controllers_add($controller ,  $title ,  $description   ) {
    global $db;
    $req = $db->prepare(" INSERT INTO `controllers` ( `id` ,   `controller` ,   `title` ,   `description`   )
                                       VALUES  (:id ,  :controller ,  :title ,  :description   ) ");

    $req->execute(array(

 "id" => null ,  
 "controller" => $controller ,  
 "title" => $title ,  
 "description" => $description   
                        
            )
    );
    
     return $db->lastInsertId();
}



function controllers_search($txt) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT * FROM controllers 
    
            WHERE id like :txt OR id like :txt
OR controller like :txt
OR title like :txt
OR description like :txt
                           
");
    $req->execute(array(
        "txt" => "%$txt%"
    ));
    $data = $req->fetchall();
    return $data;
}



function controllers_select($k, $v, $selected="", $disabled=array()) {    
    $c = "";    
    foreach (controllers_list() as $key => $value) {        
        $s = ($selected == $value[$k])?" selected  ":"";       
        $d = ( in_array($value[$k], $disabled )) ? " disabled ":"";                        
        $c .= "<option value=\"$value[$k]\" $s $d >". ucfirst($value[$v])."</option>" ;
    }    
    echo  $c;     
}
function controllers_is_id($id){
     return true;
}

function controllers_is_controller($controller){
     return true;
}

function controllers_is_title($title){
     return true;
}

function controllers_is_description($description){
     return true;
}

