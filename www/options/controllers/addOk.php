<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$option = (isset($_POST["option"])) ? clean($_POST["option"]) : false;
$price = (isset($_POST["price"])) ? clean($_POST["price"]) : false;
$tax = (isset($_POST["tax"])) ? clean($_POST["tax"]) : false;
$order_by = (isset($_POST["order_by"])) ? clean($_POST["order_by"]) : false;
$status = (isset($_POST["status"])) ? clean($_POST["status"]) : false;
  



$error = array();




if (!$option) {
    array_push($error, '$option not send');
}
if (!$price) {
    array_push($error, '$price not send');
}
if (!$tax) {
    array_push($error, '$tax not send');
}
if (!$order_by) {
    array_push($error, '$order_by not send');
}
if (!$status) {
    array_push($error, '$status not send');
}
  
                


#************************************************************************
// Busca si uya existe el texto en la BD

if( options_search_by_unique("id","option", $option)){
    array_push($error, 'option already exists in data base');
}

  

if( options_search($status)){
    //array_push($error, "That text with that context the database already exists");
}


if (!$error) {
    $lastInsertId = options_add(
            
            
$option ,  $price ,  $tax ,  $order_by ,  $status    


    );
              
    header("Location: index.php?c=options&a=details&id=$lastInsertId");

    
} else {

    array_push($error, "Check your form");
}

//include "www/options/views/index.php";   
include view("options", "index");  
