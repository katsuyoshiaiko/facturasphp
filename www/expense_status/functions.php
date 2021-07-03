<?php
// plugin = expense_status
// creation date : 
// 
// 
function expense_status_field_id($field, $id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $field FROM expense_status WHERE WHERE status = 1 AND id= ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function expense_status_search_by_unique($field, $FieldUnique, $valueUnique) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $field FROM expense_status WHERE status = 1 AND  $FieldUnique = ?");
    $req->execute(array($valueUnique));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function expense_status_list() {
    global $db;
    $limit = 999;

    $data = null;

    $req = $db->prepare("SELECT * FROM expense_status WHERE status = 1 ORDER BY id DESC LIMIT $limit  ");

    $req->execute(array(
        "limit" => $limit
    ));
    $data = $req->fetchall();
    return $data;
}

function expense_status_details($id) {
    global $db;
    $req = $db->prepare("SELECT * FROM expense_status WHERE id= ? ");
    $req->execute(array($id));
    $data = $req->fetch();
    return $data;
}

function expense_status_delete($id) {
    global $db;
    $req = $db->prepare("DELETE FROM expense_status WHERE id=? ");
    $req->execute(array($id));
}

function expense_status_edit($id ,  $code ,  $status   ) {

    global $db;
    $req = $db->prepare(" UPDATE expense_status SET "
            
            ."code=:code , "   
."status=:status  "   

            
                    
            
                    
            . " WHERE id=:id ");
    $req->execute(array(
 "id" =>$id ,   "code" =>$code ,   "status" =>$status ,  
                

));
}

function expense_status_add($code ,  $status   ) {
    global $db;
    $req = $db->prepare(" INSERT INTO `expense_status` ( `id` ,   `code` ,   `status`   )
                                       VALUES  (:id ,  :code ,  :status   ) ");

    $req->execute(array(

 "id" => null ,  
 "code" => $code ,  
 "status" => $status   
                        
            )
    );
    
     return $db->lastInsertId();
}



function expense_status_search($txt) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT * FROM expense_status 
    
            WHERE id like :txt OR id like :txt
OR code like :txt
OR status like :txt
                           
");
    $req->execute(array(
        "txt" => "%$txt%"
    ));
    $data = $req->fetchall();
    return $data;
}



function expense_status_select($k, $v, $selected="", $disabled=array()) {    
    $c = "";    
    foreach (expense_status_list() as $key => $value) {        
        $s = ($selected == $value[$k])?" selected  ":"";       
        $d = ( in_array($value[$k], $disabled )) ? " disabled ":"";                        
        $c .= "<option value=\"$value[$k]\" $s $d >". ucfirst($value[$v])."</option>" ;
    }    
    echo  $c;     
}
function expense_status_is_id($id){
     return true;
}

function expense_status_is_code($code){
     return true;
}

function expense_status_is_status($status){
     return true;
}

function expense_status_by_status($status) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT status FROM expense_status WHERE code = ?");
    $req->execute(array($status));
    $data = $req->fetch();
    return $data[0];
}

