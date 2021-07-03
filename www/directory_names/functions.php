<?php
// plugin = directory_names
// creation date : 
// 
// 
function directory_names_field_id($field, $id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $field FROM directory_names WHERE id= ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function directory_names_search_by_unique($field, $FieldUnique, $valueUnique) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $field FROM banks WHERE $FieldUnique = ?");
    $req->execute(array($valueUnique));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function directory_names_list() {
    global $db;
    $limit = 999;

    $data = null;

    $req = $db->prepare("SELECT * FROM directory_names ORDER BY `order`  LIMIT $limit ");

    $req->execute(array(
        "limit" => $limit
    ));
    $data = $req->fetchall();
    return $data;
}

function directory_names_details($id) {
    global $db;
    $req = $db->prepare("SELECT * FROM directory_names WHERE id= ? ");
    $req->execute(array($id));
    $data = $req->fetch();
    return $data;
}

function directory_names_delete($id) {
    global $db;
    $req = $db->prepare("DELETE FROM directory_names WHERE id=? ");
    $req->execute(array($id));
}

function directory_names_edit($id ,  $name ,  $order   ) {

    global $db;
    $req = $db->prepare(" UPDATE directory_names SET "
            
            ."name=:name , "   
."order=:order  "   

            
                    
            
                    
            . " WHERE id=:id ");
    $req->execute(array(
 "id" =>$id ,   "name" =>$name ,   "order" =>$order ,  
                

));
}

function directory_names_add($name ,  $order   ) {
    global $db;
    $req = $db->prepare(" INSERT INTO `directory_names` ( `id` ,   `name` ,   `order`   )
                                       VALUES  (:id ,  :name ,  :order   ) ");

    $req->execute(array(

 "id" => null ,  
 "name" => $name ,  
 "order" => $order   
                        
            )
    );
    
     return $db->lastInsertId();
}



function directory_names_search($txt) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT * FROM directory_names 
    
            WHERE id like :txt OR id like :txt
OR name like :txt
OR order like :txt
                           
");
    $req->execute(array(
        "txt" => "%$txt%"
    ));
    $data = $req->fetchall();
    return $data;
}



function directory_names_select($k, $v, $selected="", $disabled=array()) {    
    $c = "";    
    foreach (directory_names_list() as $key => $value) {        
        $s = ($selected == $value[$k])?" selected  ":"";       
        $d = ( in_array($value[$k], $disabled )) ? " disabled ":"";                        
        $c .= "<option value=\"$value[$k]\" $s $d >". ucfirst($value[$v])."</option>" ;
    }    
    echo  $c;     
}
function directory_names_is_id($id){
     return true;
}

function directory_names_is_name($name){
     return true;
}

function directory_names_is_order($order){
     return true;
}

