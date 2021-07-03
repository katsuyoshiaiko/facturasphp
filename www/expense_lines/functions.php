<?php
// plugin = expense_lines
// creation date : 
// 
// 
function expense_lines_field_id($field, $id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $field FROM expense_lines WHERE WHERE status = 1 AND id= ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function expense_lines_search_by_unique($field, $FieldUnique, $valueUnique) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $field FROM expense_lines WHERE status = 1 AND  $FieldUnique = ?");
    $req->execute(array($valueUnique));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function expense_lines_list() {
    global $db;
    $limit = 999;

    $data = null;

    $req = $db->prepare("SELECT * FROM expense_lines WHERE status = 1 ORDER BY id DESC LIMIT $limit  ");

    $req->execute(array(
        "limit" => $limit
    ));
    $data = $req->fetchall();
    return $data;
}

function expense_lines_details($id) {
    global $db;
    $req = $db->prepare("SELECT * FROM expense_lines WHERE id= ? ");
    $req->execute(array($id));
    $data = $req->fetch();
    return $data;
}

function expense_lines_delete($id) {
    global $db;
    $req = $db->prepare("DELETE FROM expense_lines WHERE id=? ");
    $req->execute(array($id));
}

function expense_lines_edit($id ,  $expense_id ,  $code ,  $quantity ,  $description ,  $price ,  $discounts ,  $discounts_mode ,  $tax ,  $order_by ,  $status   ) {

    global $db;
    $req = $db->prepare(" UPDATE expense_lines SET "
            
            ."expense_id=:expense_id , "   
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
 "id" =>$id ,   "expense_id" =>$expense_id ,   "code" =>$code ,   "quantity" =>$quantity ,   "description" =>$description ,   "price" =>$price ,   "discounts" =>$discounts ,   "discounts_mode" =>$discounts_mode ,   "tax" =>$tax ,   "order_by" =>$order_by ,   "status" =>$status ,  
                

));
}

function expense_lines_add($expense_id ,  $code ,  $quantity ,  $description ,  $price ,  $discounts ,  $discounts_mode ,  $tax ,  $order_by ,  $status   ) {
    global $db;
    $req = $db->prepare(" INSERT INTO `expense_lines` ( `id` ,   `expense_id` ,   `code` ,   `quantity` ,   `description` ,   `price` ,   `discounts` ,   `discounts_mode` ,   `tax` ,   `order_by` ,   `status`   )
                                       VALUES  (:id ,  :expense_id ,  :code ,  :quantity ,  :description ,  :price ,  :discounts ,  :discounts_mode ,  :tax ,  :order_by ,  :status   ) ");

    $req->execute(array(

 "id" => null ,  
 "expense_id" => $expense_id ,  
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



function expense_lines_search($txt) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT * FROM expense_lines 
    
            WHERE id like :txt OR id like :txt
OR expense_id like :txt
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



function expense_lines_select($k, $v, $selected="", $disabled=array()) {    
    $c = "";    
    foreach (expense_lines_list() as $key => $value) {        
        $s = ($selected == $value[$k])?" selected  ":"";       
        $d = ( in_array($value[$k], $disabled )) ? " disabled ":"";                        
        $c .= "<option value=\"$value[$k]\" $s $d >". ucfirst($value[$v])."</option>" ;
    }    
    echo  $c;     
}
function expense_lines_is_id($id){
     return true;
}

function expense_lines_is_expense_id($expense_id){
     return true;
}

function expense_lines_is_code($code){
     return true;
}

function expense_lines_is_quantity($quantity){
     return true;
}

function expense_lines_is_description($description){
     return true;
}

function expense_lines_is_price($price){
     return true;
}

function expense_lines_is_discounts($discounts){
     return true;
}

function expense_lines_is_discounts_mode($discounts_mode){
     return true;
}

function expense_lines_is_tax($tax){
     return true;
}

function expense_lines_is_order_by($order_by){
     return true;
}

function expense_lines_is_status($status){
     return true;
}


// https://businessdatabase.indicator.be/tva/une_remise__pour_la_tva_aussi__/WAACIMAR_EU121904/1/related

function expense_lines_list_by_expense_id($id) {
    global $db;
    $limit = 999;

    $data = null;

    $req = $db->prepare("SELECT id, expense_id, code, quantity, description, price, discounts, discounts_mode, tax,    ( "
            
            . " if( discounts_mode = '%' ,((quantity * price) - ((quantity * price) * discounts )/100) ,       ((quantity * price) - discounts) )) as subtotal, "
            
            
            
            . " if( discounts_mode = '%' ,   ((quantity * price) * discounts )/100 ,       discounts ) as totaldiscounts, "
            
                        
            
            . " if(discounts_mode = '%', ((quantity * price) - ((quantity * price) * discounts )/100) ,        (quantity * price) - discounts ) * ( (tax/100) ) as totaltax "
            
            
            . ""
            
               
            . "FROM expense_lines WHERE expense_id = :id ORDER BY order_by DESC, id  LIMIT $limit ");
    
    

    $req->execute(array(
        "id" => $id
    ));
    $data = $req->fetchall();
    return $data;
}



function expense_lines_subtotal_by_expense($expense_id) {
    global $db;

    $data = 0;

    $req = $db->prepare('SELECT * FROM expense_lines WHERE id= ?');
    $req->execute(array($expense_id));

    $data = $req->fetch();

    return $data[0];
}



function expense_lines_totalHTVA($expense_id ) {
    global $db;
    $limit = 999;

    $data = null;

    //$req = $db->prepare("SELECT SUM(((quantity * price)-discounts) * (tax/100))  as total  FROM expense_lines WHERE expense_id=:expense_id ");
   // $req = $db->prepare("SELECT SUM(if( discounts_mode = '%' ,( (quantity * price) - ( (quantity * price) * discounts) / 100), ((quantity * price) - discounts) )) as total  FROM expense_lines WHERE expense_id=:expense_id ");
    $req = $db->prepare("SELECT SUM(if( discounts_mode = '%' ,((quantity * price) - ((quantity * price) * discounts )/100), ((quantity * price) - discounts) )) as total  FROM expense_lines WHERE expense_id=:expense_id ");
    

    $req->execute(array(        
        "expense_id" => $expense_id
    ));
    $data = $req->fetch();
    return $data[0];
}

function expense_lines_totalTVA($expense_id ) {
    global $db;
    $limit = 999;

    $data = null;

    $req = $db->prepare("SELECT SUM( if(discounts_mode = '%', ((quantity * price) - ((quantity * price) * discounts )/100) ,        (quantity * price) - discounts ) * ( (tax/100) ) ) as total  FROM expense_lines WHERE expense_id=:expense_id ");
    
    $req->execute(array(        
        "expense_id" => $expense_id
    ));
    $data = $req->fetch();
    return $data[0];
}

function expense_lines_total_by_tax($expense_id, $tax) {
    global $db;
    $limit = 999;

    $data = null;

    $req = $db->prepare("SELECT SUM( if(discounts_mode = '%', ((quantity * price) - ((quantity * price) * discounts )/100) ,        (quantity * price) - discounts ) * ( (tax/100) )  )  as total  FROM expense_lines WHERE expense_id=:expense_id AND tax=:tax");

    $req->execute(array(
        "tax" => $tax,
        "expense_id" => $expense_id
    ));
    $data = $req->fetch();
    return $data[0];
}
/**
 * 
 * @global type $db
 * @param type $expense_id
 * @return type
 */
function expense_lines_total_discount($expense_id) {
    global $db;
    $limit = 999;

    $data = null;

    $req = $db->prepare("SELECT SUM(discounts)  as total  FROM expense_lines WHERE expense_id=:expense_id ");

    $req->execute(array(        
        "expense_id" => $expense_id
    ));
    $data = $req->fetch();
    return $data[0];
}

function expense_lines_average_tax($expense_id) {
    global $db;
    $limit = 999;

    $data = null;

    $req = $db->prepare("SELECT AVG(tax)  FROM expense_lines WHERE expense_id=:expense_id ");

    $req->execute(array(        
        
        "expense_id" => $expense_id,
    ));
    $data = $req->fetch();
    return $data[0];
}

