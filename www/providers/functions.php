<?php
// plugin = providers
// creation date : 
// 
// 
function providers_field_id($field, $id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $field FROM providers WHERE id= ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function providers_search_by_unique($field, $FieldUnique, $valueUnique) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $field FROM banks WHERE $FieldUnique = ?");
    $req->execute(array($valueUnique));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function providers_list() {
    global $db;
    $limit = 999;

    $data = null;

    $req = $db->prepare("SELECT * FROM providers ORDER BY id DESC LIMIT $limit ");

    $req->execute(array(
        "limit" => $limit
    ));
    $data = $req->fetchall();
    return $data;
}
function providers_company_list() {
    global $db;
    $limit = 99999999999999;

    $data = null;

    $req = $db->prepare("SELECT company_id FROM providers LIMIT $limit ");

    $req->execute(array(
        "limit" => $limit
    ));
    $data = $req->fetchall(PDO::FETCH_COLUMN, 0);
    return $data;
}

function providers_details($id) {
    global $db;
    $req = $db->prepare("SELECT * FROM providers WHERE id= ? ");
    $req->execute(array($id));
    $data = $req->fetch();
    return $data;
}

function providers_delete($id) {
    global $db;
    $req = $db->prepare("DELETE FROM providers WHERE id=? ");
    $req->execute(array($id));
}

function providers_edit($id ,  $company_id ,  $date ,  $discount ,  $order_by ,  $status   ) {

    global $db;
    $req = $db->prepare(" UPDATE providers SET "
            
            ."company_id=:company_id , "   
."date=:date , "   
."discount=:discount , "   
."order_by=:order_by , "   
."status=:status  "   

            
                    
            
                    
            . " WHERE id=:id ");
    $req->execute(array(
 "id" =>$id ,   "company_id" =>$company_id ,   "date" =>$date ,   "discount" =>$discount ,   "order_by" =>$order_by ,   "status" =>$status ,  
                

));
}

function providers_add($company_id ,  $date ,  $discount ,  $order_by ,  $status   ) {
    global $db;
    $req = $db->prepare(" INSERT INTO `providers` ( `id` ,   `company_id` ,   `date` ,   `discount` ,   `order_by` ,   `status`   )
                                       VALUES  (:id ,  :company_id ,  :date ,  :discount ,  :order_by ,  :status   ) ");

    $req->execute(array(

 "id" => null ,  
 "company_id" => $company_id ,  
 "date" => $date ,  
 "discount" => $discount ,  
 "order_by" => $order_by ,  
 "status" => $status   
                        
            )
    );
    
     return $db->lastInsertId();
}



function providers_search($txt) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT * FROM providers 
    
            WHERE id like :txt OR id like :txt
OR company_id like :txt
OR date like :txt
OR discount like :txt
OR order_by like :txt
OR status like :txt
                           
");
    $req->execute(array(
        "txt" => "%$txt%"
    ));
    $data = $req->fetchall();
    return $data;
}



function providers_select($k, $v, $selected="", $disabled=array()) {    
    $c = "";    
    foreach (providers_list() as $key => $value) {        
        $s = ($selected == $value[$k])?" selected  ":"";       
        $d = ( in_array($value[$k], $disabled )) ? " disabled ":"";                        
        $c .= "<option value=\"$value[$k]\" $s $d >". ucfirst($value[$v])."</option>" ;
    }    
    echo  $c;     
}
function providers_is_id($id){
     return true;
}

function providers_is_company_id($company_id){
     return true;
}

function providers_is_date($date){
     return true;
}

function providers_is_discount($discount){
     return true;
}

function providers_is_order_by($order_by){
     return true;
}

function providers_is_status($status){
     return true;
}

