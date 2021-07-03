<?php
// plugin = tax
// creation date : 
// 
// 
function tax_field_id($field, $id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $field FROM tax WHERE id= ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function tax_search_by_unique($field, $FieldUnique, $valueUnique) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $field FROM banks WHERE $FieldUnique = ?");
    $req->execute(array($valueUnique));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function tax_list() {
    global $db;
    $limit = 999;

    $data = null;

    $req = $db->prepare("SELECT * FROM tax ORDER BY value DESC LIMIT $limit ");

    $req->execute(array(
        "limit" => $limit
    ));
    $data = $req->fetchall();
    return $data;
}

function tax_details($id) {
    global $db;
    $req = $db->prepare("SELECT * FROM tax WHERE id= ? ");
    $req->execute(array($id));
    $data = $req->fetch();
    return $data;
}

function tax_delete($id) {
    global $db;
    $req = $db->prepare("DELETE FROM tax WHERE id=? ");
    $req->execute(array($id));
}

function tax_edit($id ,  $name ,  $value ,  $order_by ,  $status   ) {

    global $db;
    $req = $db->prepare(" UPDATE tax SET "
            
            ."name=:name , "   
."value=:value , "   
."order_by=:order_by , "   
."status=:status  "   

            
                    
            
                    
            . " WHERE id=:id ");
    $req->execute(array(
 "id" =>$id ,   "name" =>$name ,   "value" =>$value ,   "order_by" =>$order_by ,   "status" =>$status ,  
                

));
}

function tax_add($name ,  $value ,  $order_by ,  $status   ) {
    global $db;
    $req = $db->prepare(" INSERT INTO `tax` ( `id` ,   `name` ,   `value` ,   `order_by` ,   `status`   )
                                       VALUES  (:id ,  :name ,  :value ,  :order_by ,  :status   ) ");

    $req->execute(array(

 "id" => null ,  
 "name" => $name ,  
 "value" => $value ,  
 "order_by" => $order_by ,  
 "status" => $status   
                        
            )
    );
    
     return $db->lastInsertId();
}



function tax_search($txt) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT * FROM tax 
    
            WHERE id like :txt OR id like :txt
OR name like :txt
OR value like :txt
OR order_by like :txt
OR status like :txt
                           
");
    $req->execute(array(
        "txt" => "%$txt%"
    ));
    $data = $req->fetchall();
    return $data;
}



function tax_select($k, $v, $selected="", $disabled=array()) {    
    $c = "";    
    foreach (tax_list() as $key => $value) {        
        $s = ($selected == $value[$k])?" selected  ":"";       
        $d = ( in_array($value[$k], $disabled )) ? " disabled ":"";                        
        $c .= "<option value=\"$value[$k]\" $s $d >". ucfirst($value[$v])."</option>" ;
    }    
    echo  $c;     
}
function tax_is_id($id){
     return true;
}

function tax_is_name($name){
     return true;
}

function tax_is_value($value){
     return true;
}

function tax_is_order_by($order_by){
     return true;
}

function tax_is_status($status){
     return true;
}

function tax_list_by_status($status) {
    global $db;
    $limit = 999;

    $data = null;

    $req = $db->prepare("SELECT * FROM tax WHERE status =:status ORDER BY order_by DESC  ");

    $req->execute(array(
         
        "status" => $status
    ));
    $data = $req->fetchall();
    return $data;
}