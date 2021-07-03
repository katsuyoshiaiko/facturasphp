<?php
// plugin = employees
// creation date : 
// 
// 
function employees_field_id($field, $id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $field FROM employees WHERE id= ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function employees_field_by_contact_id($field, $contact_id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $field FROM employees WHERE contact_id= ? ");
    $req->execute(array($contact_id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}



function employees_search_by_unique($field, $FieldUnique, $valueUnique) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $field FROM banks WHERE $FieldUnique = ?");
    $req->execute(array($valueUnique));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function employees_list() {
    global $db;
    $limit = 999;

    $data = null;

    $req = $db->prepare("SELECT * FROM employees ORDER BY id DESC LIMIT $limit ");

    $req->execute(array(
        "limit" => $limit
    ));
    $data = $req->fetchall();
    return $data;
}

function employees_details($id) {
    global $db;
    $req = $db->prepare("SELECT * FROM employees WHERE id= ? ");
    $req->execute(array($id));
    $data = $req->fetch();
    return $data;
}

function employees_delete($id) {
    global $db;
    $req = $db->prepare("DELETE FROM employees WHERE id=? ");
    $req->execute(array($id));
}

function employees_edit($id ,  $company_id ,  $contact_id ,  $owner_ref ,  $date ,  $cargo ,  $order_by ,  $status   ) {

    global $db;
    $req = $db->prepare(" UPDATE employees SET "
            
            ."company_id=:company_id , "   
."contact_id=:contact_id , "   
."owner_ref=:owner_ref , "   
."date=:date , "   
."cargo=:cargo , "   
."order_by=:order_by , "   
."status=:status  "   

            
                    
            
                    
            . " WHERE id=:id ");
    $req->execute(array(
 "id" =>$id ,   "company_id" =>$company_id ,   "contact_id" =>$contact_id ,   "owner_ref" =>$owner_ref ,   "date" =>$date ,   "cargo" =>$cargo ,   "order_by" =>$order_by ,   "status" =>$status ,  
                

));
}


function employees_edit_cargo_ref($company_id, $contact_id,  $owner_ref,  $cargo ) {

    global $db;
    $req = $db->prepare(" UPDATE employees SET "                        
            ."owner_ref=:owner_ref , "   
            ."cargo=:cargo  "           
            . " WHERE company_id=:company_id AND contact_id = :contact_id  ");
    $req->execute(array(
        "company_id" =>$company_id ,   
        "contact_id" =>$contact_id ,   
        "owner_ref" =>$owner_ref ,              
        "cargo" =>$cargo
                

));
}

function employees_add($company_id ,  $contact_id ,  $owner_ref ,  $date ,  $cargo ,  $order_by ,  $status   ) {
    global $db;
    $req = $db->prepare(" INSERT INTO `employees` ( `id` ,   `company_id` ,   `contact_id` ,   `owner_ref` ,   `date` ,   `cargo` ,   `order_by` ,   `status`   )
                                       VALUES  (:id ,  :company_id ,  :contact_id ,  :owner_ref ,  :date ,  :cargo ,  :order_by ,  :status   ) ");

    $req->execute(array(

 "id" => null ,  
 "company_id" => $company_id ,  
 "contact_id" => $contact_id ,  
 "owner_ref" => $owner_ref ,  
 "date" => $date ,  
 "cargo" => $cargo ,  
 "order_by" => $order_by ,  
 "status" => $status   
                        
            )
    );
    
     return $db->lastInsertId();
}



function employees_search($txt) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT * FROM employees 
    
            WHERE id like :txt OR id like :txt
OR company_id like :txt
OR contact_id like :txt
OR owner_ref like :txt
OR date like :txt
OR cargo like :txt
OR order_by like :txt
OR status like :txt
                           
");
    $req->execute(array(
        "txt" => "%$txt%"
    ));
    $data = $req->fetchall();
    return $data;
}



function employees_select($k, $v, $selected="", $disabled=array()) {    
    $c = "";    
    foreach (employees_list() as $key => $value) {        
        $s = ($selected == $value[$k])?" selected  ":"";       
        $d = ( in_array($value[$k], $disabled )) ? " disabled ":"";                        
        $c .= "<option value=\"$value[$k]\" $s $d >". ucfirst($value[$v])."</option>" ;
    }    
    echo  $c;     
}
function employees_is_id($id){
     return true;
}

function employees_is_company_id($company_id){
     return true;
}

function employees_is_contact_id($contact_id){
     return true;
}

function employees_is_owner_ref($owner_ref){
     return true;
}

function employees_is_date($date){
     return true;
}

function employees_is_cargo($cargo){
     return true;
}

function employees_is_order_by($order_by){
     return true;
}

function employees_is_status($status){
     return true;
}



function employees_list_by_company($company_id) {
    global $db;
    $limit = 999;

    $data = null;

    $req = $db->prepare("SELECT * FROM employees WHERE company_id =:company_id ORDER BY id DESC  ");

    $req->execute(array(
        "company_id" => $company_id
        
    ));
    $data = $req->fetchall();
    return $data;
}

function employees_by_company_contact($company_id, $contact_id) {
    global $db;
    $limit = 999;

    $data = null;

    $req = $db->prepare("SELECT * FROM `employees` WHERE `company_id` =:company_id AND `contact_id` =:contact_id ORDER BY id DESC  ");

    $req->execute(array(
        "company_id" => $company_id,
        "contact_id" => $contact_id
        
    ));
    $data = $req->fetchall();
    return $data;
}

function employees_office_by_contact($contact_id) {
    global $db;
    $limit = 99999999;
    $data = null;
    $req = $db->prepare('SELECT company_id FROM employees WHERE contact_id = :contact_id ORDER BY id DESC  ');
    $req->execute(array(        
        'contact_id' => $contact_id
    ));
    $data = $req->fetch();
    return (isset($data[0])) ? $data[0] : false;
}
