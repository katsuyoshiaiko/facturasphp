<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$location = (isset($_POST["location"])) ? clean($_POST["location"]) : false;
$father = (isset($_POST["father"])) ? clean($_POST["father"]) : false;
$label = (isset($_POST["label"])) ? clean($_POST["label"]) : false;
$url = (isset($_POST["url"])) ? clean($_POST["url"]) : false;
$icon = (isset($_POST["icon"])) ? clean($_POST["icon"]) : false;
$order_by = (isset($_POST["order_by"])) ? clean($_POST["order_by"]) : false;
  



$error = array();




if (!$location) {
    array_push($error, '$location not send');
}
if (!$father) {
    array_push($error, '$father not send');
}
if (!$label) {
    array_push($error, '$label not send');
}
if (!$url) {
    array_push($error, '$url not send');
}
if (!$icon) {
    array_push($error, '$icon not send');
}
if (!$order_by) {
    array_push($error, '$order_by not send');
}
  
                


#************************************************************************
// Busca si uya existe el texto en la BD
  

if( _menus_search($order_by)){
    //array_push($error, "That text with that context the database already exists");
}


if (!$error) {
    $lastInsertId = _menus_add(
            
            
$location ,  $father ,  $label ,  $url ,  $icon ,  $order_by    


    );
              
    header("Location: index.php?c=_menus&a=details&id=$lastInsertId");

    
} else {

    array_push($error, "Check your form");
}

//include "www/_menus/views/index.php";   
include view("_menus", "index");  
