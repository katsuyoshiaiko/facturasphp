<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

include view("home", "disabled");
die(); 


$company_id = (isset($_POST["company_id"])) ? clean($_POST["company_id"]) : false;
$contact_id = (isset($_POST["contact_id"])) ? clean($_POST["contact_id"]) : false;
$owner_ref = (isset($_POST["owner_ref"])) ? clean($_POST["owner_ref"]) : false;
$date = (isset($_POST["date"])) ? clean($_POST["date"]) : false;
$cargo = (isset($_POST["cargo"])) ? clean($_POST["cargo"]) : false;
$order_by = (isset($_POST["order_by"])) ? clean($_POST["order_by"]) : false;
$status = (isset($_POST["status"])) ? clean($_POST["status"]) : false;
  



$error = array();




if (!$company_id) {
    array_push($error, '$company_id not send');
}
if (!$contact_id) {
    array_push($error, '$contact_id not send');
}
if (!$owner_ref) {
    array_push($error, '$owner_ref not send');
}
if (!$date) {
    array_push($error, '$date not send');
}
if (!$cargo) {
    array_push($error, '$cargo not send');
}
if (!$order_by) {
    array_push($error, '$order_by not send');
}
if (!$status) {
    array_push($error, '$status not send');
}
  
                


#************************************************************************
// Busca si uya existe el texto en la BD
  

if( employees_search($status)){
    //array_push($error, "That text with that context the database already exists");
}


if (!$error) {
    $lastInsertId = employees_add(
            
            
$company_id ,  $contact_id ,  $owner_ref ,  $date ,  $cargo ,  $order_by ,  $status    


    );
              
    header("Location: index.php?c=employees&a=details&id=$lastInsertId");

    
} else {

    array_push($error, "Check your form");
}

//include "www/employees/views/index.php";   
include view("employees", "index");  
