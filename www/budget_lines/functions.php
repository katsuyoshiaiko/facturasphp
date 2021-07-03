<?php
// plugin = budget_lines
// creation date : 
// 
// 
function budget_lines_field_id($field, $id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $field FROM budget_lines WHERE id= ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function budget_lines_search_by_unique($field, $FieldUnique, $valueUnique) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $field FROM banks WHERE $FieldUnique = ?");
    $req->execute(array($valueUnique));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function budget_lines_list() {
    global $db;
    $limit = 999;

    $data = null;

    $req = $db->prepare("SELECT * FROM budget_lines ORDER BY id DESC LIMIT $limit ");

    $req->execute(array(
        "limit" => $limit
    ));
    $data = $req->fetchall();
    return $data;
}

function budget_lines_details($id) {
    global $db;
    $req = $db->prepare("SELECT * FROM budget_lines WHERE id= ? ");
    $req->execute(array($id));
    $data = $req->fetch();
    return $data;
}

function budget_lines_delete($id) {
    global $db;
    $req = $db->prepare("DELETE FROM budget_lines WHERE id=? ");
    $req->execute(array($id));
}

function budget_lines_edit($id ,  $budget_id ,  $code ,  $quantity ,  $description ,  $price ,  $discounts ,  $discounts_mode ,  $tax ,  $order_by ,  $status   ) {

    global $db;
    $req = $db->prepare(" UPDATE budget_lines SET "
            
 ."budget_id=:budget_id , "   
."code=:code , "   
."quantity=:quantity , "   
."description=:description , "   
."price=:price , "   
."discounts=:discounts , "   
."discounts_mode=:discounts_mode , "   
."tax=:tax , "   
."order_by=:order_by , "   
."status=:status  "   

            
                    
            
                    
            . " WHERE id=:id ");
    $req->execute(array(
 "id" =>$id ,   "budget_id" =>$budget_id ,   "code" =>$code ,   "quantity" =>$quantity ,   "description" =>$description ,   "price" =>$price ,   "discounts" =>$discounts ,   "discounts_mode" =>$discounts_mode ,   "tax" =>$tax ,   "order_by" =>$order_by ,   "status" =>$status ,  
                

));
}

function budget_lines_add(
        $budget_id ,  $code ,  $quantity ,  $description ,  $price ,  $discounts ,  $discounts_mode ,  $tax ,  $order_by ,  $status   
        ) {
    global $db;
    $req = $db->prepare(" INSERT INTO `budget_lines` ( `id` ,   `budget_id` ,   `code` ,   `quantity` ,   `description` ,   `price` ,   `discounts` ,   `discounts_mode` ,   `tax` ,   `order_by` ,   `status`   )
                                       VALUES  (:id ,  :budget_id ,  :code ,  :quantity ,  :description ,  :price ,  :discounts ,  :discounts_mode ,  :tax ,  :order_by ,  :status   ) ");

    $req->execute(array(

 "id" => null ,  
 "budget_id" => $budget_id ,  
 "code" => $code ,  
 "quantity" => $quantity ,  
 "description" => $description ,  
 "price" => $price ,  
 "discounts" => $discounts ,  
 "discounts_mode" => $discounts_mode ,  
 "tax" => $tax ,  
 "order_by" => $order_by ,  
 "status" => $status   
                        
            )
    );
    
     return $db->lastInsertId();
}



function budget_lines_search($txt) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT * FROM budget_lines 
    
            WHERE id like :txt OR id like :txt
OR budget_id like :txt
OR code like :txt
OR quantity like :txt
OR description like :txt
OR price like :txt
OR discounts like :txt
OR discounts_mode like :txt
OR tax like :txt
OR order_by like :txt
OR status like :txt
                           
");
    $req->execute(array(
        "txt" => "%$txt%"
    ));
    $data = $req->fetchall();
    return $data;
}



function budget_lines_select($k, $v, $selected="", $disabled=array()) {    
    $c = "";    
    foreach (budget_lines_list() as $key => $value) {        
        $s = ($selected == $value[$k])?" selected  ":"";       
        $d = ( in_array($value[$k], $disabled )) ? " disabled ":"";                        
        $c .= "<option value=\"$value[$k]\" $s $d >". ucfirst($value[$v])."</option>" ;
    }    
    echo  $c;     
}
function budget_lines_is_id($id){
     return true;
}

function budget_lines_is_budget_id($budget_id){
     return true;
}

function budget_lines_is_code($code){
     return true;
}

function budget_lines_is_quantity($quantity){
     return true;
}

function budget_lines_is_description($description){
     return true;
}

function budget_lines_is_price($price){
     return true;
}

function budget_lines_is_discounts($discounts){
     return true;
}

function budget_lines_is_discounts_mode($discounts_mode){
     return true;
}

function budget_lines_is_tax($tax){
     return true;
}

function budget_lines_is_order_by($order_by){
     return true;
}

function budget_lines_is_status($status){
     return true;
}


// https://businessdatabase.indicator.be/tva/une_remise__pour_la_tva_aussi__/WAACIMAR_EU121904/1/related
function budget_lines_list_by_budget_id($id) {
    global $db;
    $limit = 999;

    $data = null;

    $req = $db->prepare("SELECT id, budget_id, code, quantity, description, price, discounts, discounts_mode, tax,    ( "
            
  . " if( discounts_mode = '%' ,((quantity * price) - ((quantity * price) * discounts )/100) ,((quantity * price) - discounts) )) as subtotal, "
            
  . " if( discounts_mode = '%' ,((quantity * price) * discounts )/100 , discounts ) as totaldiscounts, "          
                                    
  . " if( discounts_mode = '%', ((quantity * price) - ((quantity * price) * discounts )/100) , (quantity * price) - discounts ) * ( (tax/100) ) as totaltax "                        
            . ""                           
            . "FROM budget_lines WHERE budget_id = :id  ORDER BY order_by DESC, id  LIMIT $limit ");
        
    $req->execute(array(
        "id" => $id
    ));
    $data = $req->fetchall();
    return $data;
}

function budget_lines_list_by_budget_id_without_transport($id) {
    global $db;
    $limit = 999;

    $data = null;

    $req = $db->prepare("SELECT id, budget_id, code, quantity, description, price, discounts, discounts_mode, tax,    ( "
            
  . " if( discounts_mode = '%' ,((quantity * price) - ((quantity * price) * discounts )/100) ,((quantity * price) - discounts) )) as subtotal, "
            
  . " if( discounts_mode = '%' ,((quantity * price) * discounts )/100 , discounts ) as totaldiscounts, "          
                                    
  . " if( discounts_mode = '%', ((quantity * price) - ((quantity * price) * discounts )/100) , (quantity * price) - discounts ) * ( (tax/100) ) as totaltax "                        
            . ""                           
            . "FROM budget_lines WHERE budget_id = :id AND ( code is NULL OR code NOT IN (SELECT code FROM `transport` ) ) ORDER BY order_by DESC, id  LIMIT $limit ");
        
    $req->execute(array(
        "id" => $id
    ));
    $data = $req->fetchall();
    return $data;
}

function budget_lines_list_transport_by_budget_id($id) {
    global $db;
    $limit = 999;

    $data = null;

    $req = $db->prepare("SELECT id, budget_id, code, quantity, description, price, discounts, discounts_mode, tax,    ( "
            
  . " if( discounts_mode = '%' ,((quantity * price) - ((quantity * price) * discounts )/100) ,((quantity * price) - discounts) )) as subtotal, "
            
  . " if( discounts_mode = '%' ,((quantity * price) * discounts )/100 , discounts ) as totaldiscounts, "          
                                    
  . " if( discounts_mode = '%', ((quantity * price) - ((quantity * price) * discounts )/100) , (quantity * price) - discounts ) * ( (tax/100) ) as totaltax "                        
            . ""                           
            . "FROM budget_lines WHERE budget_id = :id AND code IN (SELECT code FROM `transport` ) ORDER BY order_by DESC, id  LIMIT $limit ");
        
    $req->execute(array(
        "id" => $id
    ));
    $data = $req->fetchall();
    return $data;
}

function budget_lines_list_by_order_id($id) {
    global $db;
    $limit = 999;

    $data = null;

    $req = $db->prepare("SELECT id, budget_id, code, quantity, description, price, discounts, discounts_mode, tax,    ( "
            
  . " if( discounts_mode = '%' ,((quantity * price) - ((quantity * price) * discounts )/100) ,((quantity * price) - discounts) )) as subtotal, "
            
  . " if( discounts_mode = '%' ,((quantity * price) * discounts )/100 , discounts ) as totaldiscounts, "          
                                    
  . " if( discounts_mode = '%', ((quantity * price) - ((quantity * price) * discounts )/100) , (quantity * price) - discounts ) * ( (tax/100) ) as totaltax "
            
            
            . ""
            
               
            . "FROM budget_lines WHERE order_id = :id ORDER BY order_by DESC, id  LIMIT $limit ");
    
    

    $req->execute(array(
        "id" => $id
    ));
    $data = $req->fetchall();
    return $data;
}


function budget_lines_list_orders_by_budget_id($id) {
    global $db;

    $data = null;

    $req = $db->prepare(
            "
            SELECT DISTINCT order_id
            FROM budget_lines 
            WHERE budget_id = :id
            
            ");    
    $req->execute(array(
        "id" => $id
    ));
    $data = $req->fetchall();
    return $data;
}


function budget_lines_list_description_lines_by_budget_id($id) {
    global $db;
    $limit = 999;
    $data = null;
    $req = $db->prepare("SELECT description, price FROM budget_lines WHERE budget_id = :id ");
    $req->execute(array(
        "id" => $id
    ));
    $data = $req->fetchall();
    return $data;
}

function budget_lines_list_code_by_budget_id($id) {
    global $db;
    $limit = 999;
    $data = null;
    $req = $db->prepare("SELECT code FROM budget_lines WHERE budget_id = :id ");
    $req->execute(array(
        "id" => $id
    ));
    $data = $req->fetchall(PDO::FETCH_COLUMN, 0);
    return $data;
}




function budget_lines_subtotal_by_budget($budget_id) {
    global $db;

    $data = 0;

    $req = $db->prepare('SELECT * FROM budget_lines WHERE id= ?');
    $req->execute(array($budget_id));

    $data = $req->fetch();

    return $data[0];
}



function budget_lines_totalHTVA($budget_id ) {
    global $db;
    $limit = 999;

    $data = null;

    //$req = $db->prepare("SELECT SUM(((quantity * price)-discounts) * (tax/100))  as total  FROM budget_lines WHERE budget_id=:budget_id ");
   // $req = $db->prepare("SELECT SUM(if( discounts_mode = '%' ,( (quantity * price) - ( (quantity * price) * discounts) / 100), ((quantity * price) - discounts) )) as total  FROM budget_lines WHERE budget_id=:budget_id ");
    $req = $db->prepare("SELECT SUM(if( discounts_mode = '%' ,((quantity * price) - ((quantity * price) * discounts )/100), ((quantity * price) - discounts) )) as total  FROM budget_lines WHERE budget_id=:budget_id ");
    

    $req->execute(array(        
        "budget_id" => $budget_id
    ));
    $data = $req->fetch();
    return $data[0];
}

function budget_lines_totalTVA($budget_id ) {
    global $db;
    $limit = 999;

    $data = null;

    $req = $db->prepare("SELECT SUM( if(discounts_mode = '%', ((quantity * price) - ((quantity * price) * discounts )/100) ,        (quantity * price) - discounts ) * ( (tax/100) ) ) as total  FROM budget_lines WHERE budget_id=:budget_id ");
    
    $req->execute(array(        
        "budget_id" => $budget_id
    ));
    $data = $req->fetch();
    return $data[0];
}


function budget_lines_total_by_order_id($order_id ) {
    global $db;
    $limit = 999;

    $data = null;

  //$req = $db->prepare("SELECT SUM(((quantity * price)-discounts) * (tax/100))  as total  FROM budget_lines WHERE budget_id=:budget_id ");
 // $req = $db->prepare("SELECT SUM(if( discounts_mode = '%' ,( (quantity * price) - ( (quantity * price) * discounts) / 100), ((quantity * price) - discounts) )) as total  FROM budget_lines WHERE budget_id=:budget_id ");
    $req = $db->prepare(
            "SELECT SUM(if( discounts_mode = '%' ,
            (( (quantity * price) - ( (quantity * price) * discounts) / 100)) * (1+(tax/100)), 
            ( ((quantity * price) - discounts)) * (1+(tax/100)) )) 
            as total  FROM budget_lines WHERE order_id=:order_id ");
    

    $req->execute(array(        
        "order_id" => $order_id
    ));
    $data = $req->fetch();
    return $data[0];
}

function budget_lines_total_by_tax($budget_id, $tax) {
    global $db;
    $limit = 999;

    $data = null;

    $req = $db->prepare("SELECT SUM( if(discounts_mode = '%', ((quantity * price) - ((quantity * price) * discounts )/100) ,        (quantity * price) - discounts ) * ( (tax/100) )  )  as total  FROM budget_lines WHERE budget_id=:budget_id AND tax=:tax");

    $req->execute(array(
        "tax" => $tax,
        "budget_id" => $budget_id
    ));
    $data = $req->fetch();
    return $data[0];
}
/**
 * 
 * @global type $db
 * @param type $budget_id
 * @return type
 */
function budget_lines_total_discount($budget_id) {
    global $db;
    $limit = 999;

    $data = null;

    $req = $db->prepare("SELECT SUM(discounts)  as total  FROM budget_lines WHERE budget_id=:budget_id ");

    $req->execute(array(        
        "budget_id" => $budget_id
    ));
    $data = $req->fetch();
    return $data[0];
}

function budget_lines_average_tax($budget_id) {
    global $db;
    $limit = 999;

    $data = null;

    $req = $db->prepare("SELECT AVG(tax)  FROM budget_lines WHERE budget_id=:budget_id ");

    $req->execute(array(        
        
        "budget_id" => $budget_id,
    ));
    $data = $req->fetch();
    return $data[0];
}

function budget_lines_add_with_order_id(
        $budget_id , $order_id, $code ,  $quantity ,  $description ,  $price ,  $discounts ,  $discounts_mode ,  $tax ,  $order_by ,  $status   
        ) {
    global $db;
    $req = $db->prepare(" INSERT INTO `budget_lines` ( `id` ,   `budget_id` , `order_id`,  `code` ,   `quantity` ,   `description` ,   `price` ,   `discounts` ,   `discounts_mode` ,   `tax` ,   `order_by` ,   `status`   )
                                       VALUES  (:id ,  :budget_id , :order_id,  :code ,  :quantity ,  :description ,  :price ,  :discounts ,  :discounts_mode ,  :tax ,  :order_by ,  :status   ) ");

    $req->execute(array(

 "id" => null ,  
 "budget_id" => $budget_id , 
 "order_id"=>$order_id, 
 "code" => $code ,  
 "quantity" => $quantity ,  
 "description" => $description ,  
 "price" => $price ,  
 "discounts" => $discounts ,  
 "discounts_mode" => $discounts_mode ,  
 "tax" => $tax ,  
 "order_by" => $order_by ,  
 "status" => $status   
                        
            )
    );
    
     return $db->lastInsertId();
}

function budget_lines_remove_lines_by_order_id($order_id , $budget_id) {
    global $db ;

    $req = $db->prepare(            
            "DELETE FROM `budget_lines` WHERE `budget_lines`.`order_id` = :order_id  AND budget_id = :budget_id"            
            ) ;
    $req->execute(array(
        "order_id" => $order_id ,
        "budget_id" => $budget_id 
    )) ;
    return $db->lastInsertId() ;
}