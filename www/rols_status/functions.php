<?php
// plugin = rols_status
// creation date : 
// 
// 
function rols_status_field_id($field, $id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $field FROM rols_status WHERE id= ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function rols_status_search_by_unique($field, $FieldUnique, $valueUnique) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $field FROM banks WHERE $FieldUnique = ?");
    $req->execute(array($valueUnique));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function rols_status_list() {
    global $db;
    $limit = 999;

    $data = null;

    $req = $db->prepare("SELECT * FROM rols_status ORDER BY id DESC LIMIT $limit ");

    $req->execute(array(
        "limit" => $limit
    ));
    $data = $req->fetchall();
    return $data;
}

function rols_status_details($id) {
    global $db;
    $req = $db->prepare("SELECT * FROM rols_status WHERE id= ? ");
    $req->execute(array($id));
    $data = $req->fetch();
    return $data;
}

function rols_status_delete($id) {
    global $db;
    $req = $db->prepare("DELETE FROM rols_status WHERE id=? ");
    $req->execute(array($id));
}

function rols_status_edit($id ,  $rol ,  $status_code   ) {

    global $db;
    $req = $db->prepare(" UPDATE rols_status SET "
            
            ."rol=:rol , "   
."status_code=:status_code  "   

            
                    
            
                    
            . " WHERE id=:id ");
    $req->execute(array(
 "id" =>$id ,   "rol" =>$rol ,   "status_code" =>$status_code ,  
                

));
}

function rols_status_add($rol ,  $status_code   ) {
    global $db;
    $req = $db->prepare(" INSERT INTO `rols_status` ( `id` ,   `rol` ,   `status_code`   )
                                       VALUES  (:id ,  :rol ,  :status_code   ) ");

    $req->execute(array(

 "id" => null ,  
 "rol" => $rol ,  
 "status_code" => $status_code   
                        
            )
    );
    
     return $db->lastInsertId();
}



function rols_status_search($txt) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT * FROM rols_status 
    
            WHERE id like :txt OR id like :txt
OR rol like :txt
OR status_code like :txt
                           
");
    $req->execute(array(
        "txt" => "%$txt%"
    ));
    $data = $req->fetchall();
    return $data;
}



function rols_status_select($k, $v, $selected="", $disabled=array()) {    
    $c = "";    
    foreach (rols_status_list() as $key => $value) {        
        $s = ($selected == $value[$k])?" selected  ":"";       
        $d = ( in_array($value[$k], $disabled )) ? " disabled ":"";                        
        $c .= "<option value=\"$value[$k]\" $s $d >". ucfirst($value[$v])."</option>" ;
    }    
    echo  $c;     
}
function rols_status_is_id($id){
     return true;
}

function rols_status_is_rol($rol){
     return true;
}

function rols_status_is_status_code($status_code){
     return true;
}


function rols_status_search_by_status_code($rol, $code) {
    global $db;

    $data = null;

    $req = $db->prepare("SELECT * FROM  rols_status WHERE rol=:rol AND status_code=:status_code");

    $req->execute(array(
        "rol" => $rol,
        "status_code" => $code
    ));
    $data = $req->fetchall();
    
    return $data;
}

