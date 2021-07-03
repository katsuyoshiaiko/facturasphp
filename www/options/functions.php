<?php
// plugin = options
// creation date : 
// 
// 
function options_field_id($field, $id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `options` WHERE `id`= ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}


function options_field_code($field, $code) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `options` WHERE `code`= ?");
    $req->execute(array($code));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function options_search_by_unique($field, $FieldUnique, $valueUnique) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `options` WHERE   $FieldUnique = ?");
    $req->execute(array($valueUnique));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function options_list() {
    global $db;
    $limit = 999;

    $data = null;

    $req = $db->prepare("SELECT * FROM `options`  ORDER BY `option` LIMIT $limit  ");

    $req->execute(array(
        "limit" => $limit
    ));
    $data = $req->fetchall();
    return $data;
}

function options_details($id) {
    global $db;
    $req = $db->prepare("SELECT * FROM `options` WHERE id= ? ");
    $req->execute(array($id));
    $data = $req->fetch();
    return $data;
}

function options_delete($id) {
    global $db;
    $req = $db->prepare("DELETE FROM `options` WHERE id=? ");
    $req->execute(array($id));
}

function options_edit($id ,  $option ,  $price ,  $tax ,  $order_by ,  $status   ) {

    global $db;
    $req = $db->prepare(" UPDATE `options` SET "
            
            ."`option`=:option , "   
            ."`price`=:price , "   
            ."`tax`=:tax , "   
            ."`order_by`=:order_by , "   
            ."`status`=:status  "   
                    
            . " WHERE `id`=:id ");
    $req->execute(array(
        "id" =>$id ,   
        "option" =>$option ,   
        "price" =>$price ,   
        "tax" =>$tax ,   
        "order_by" =>$order_by ,   
        "status" =>$status ,  
                

));
}

function options_add($option ,  $price ,  $tax ,  $order_by ,  $status   ) {
    global $db;
    $req = $db->prepare(" INSERT INTO `options` ( `id` ,   `option` ,   `price` ,   `tax` ,   `order_by` ,   `status`   )
                                       VALUES  (:id ,  :option ,  :price ,  :tax ,  :order_by ,  :status   ) ");

    $req->execute(array(

 "id" => null ,  
 "option" => $option ,  
 "price" => $price ,  
 "tax" => $tax ,  
 "order_by" => $order_by ,  
 "status" => $status   
                        
            )
    );
    
     return $db->lastInsertId();
}



function options_search($txt) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT * FROM `options` 
    
            WHERE id like :txt OR id like :txt
OR option like :txt
OR price like :txt
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



function options_select($k, $v, $selected="", $disabled=array()) {    
    $c = "";    
    foreach (options_list() as $key => $value) {        
        $s = ($selected == $value[$k])?" selected  ":"";       
        $d = ( in_array($value[$k], $disabled )) ? " disabled ":"";                        
        $c .= "<option value=\"$value[$k]\" $s $d >". ucfirst($value[$v])."</option>" ;
    }    
    echo  $c;     
}
function options_is_id($id){
     return true;
}

function options_is_option($option){
     return true;
}

function options_is_price($price){
     return true;
}

function options_is_tax($tax){
     return true;
}

function options_is_order_by($order_by){
     return true;
}

function options_is_status($status){
     return true;
}


function options_price_update($id , $price) {

    global $db ;
    $req = $db->prepare(" UPDATE options SET price=:price  WHERE id=:id ") ;

    $req->execute(array(
        "price" => $price ,
        "id" => $id ,
    )) ;
}

/**
 * En vista que no hallo el error de options_field_id() 
 * Hago esta otra funcion
 * @global type $db
 * @param type $field
 * @param type $id
 * @return type
 */
function options_option_by_id($id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT * FROM options WHERE id = :id ");
    $req->execute(array(
        "id" => $id
    ));
    $data = $req->fetch();
    
    return (isset($data['option']))? $data['option'] :  false;    
}

