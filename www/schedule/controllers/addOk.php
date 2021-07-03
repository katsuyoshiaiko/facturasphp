<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$contact_id = (isset($_POST["contact_id"])) ? clean($_POST["contact_id"]) : false;
$day = (isset($_POST["day"])) ? clean($_POST["day"]) : false;
$am_start = (isset($_POST["am_start"])) ? clean($_POST["am_start"]) : false;
$am_end = (isset($_POST["am_end"])) ? clean($_POST["am_end"]) : false;
$pm_start = (isset($_POST["pm_start"])) ? clean($_POST["pm_start"]) : false;
$pm_end = (isset($_POST["pm_end"])) ? clean($_POST["pm_end"]) : false;
$order_by = (isset($_POST["order_by"])) ? clean($_POST["order_by"]) : false;
$status = (isset($_POST["status"])) ? clean($_POST["status"]) : false;
  



$error = array();




if (!$contact_id) {
    array_push($error, '$contact_id not send');
}
if (!$day) {
    array_push($error, '$day not send');
}
if (!$am_start) {
    array_push($error, '$am_start not send');
}
if (!$am_end) {
    array_push($error, '$am_end not send');
}
if (!$pm_start) {
    array_push($error, '$pm_start not send');
}
if (!$pm_end) {
    array_push($error, '$pm_end not send');
}
if (!$order_by) {
    array_push($error, '$order_by not send');
}
if (!$status) {
    array_push($error, '$status not send');
}
  
                


#************************************************************************
// Busca si uya existe el texto en la BD
  

if( schedule_search($status)){
    //array_push($error, "That text with that context the database already exists");
}


if (!$error) {
    $lastInsertId = schedule_add(
            
            
$contact_id ,  $day ,  $am_start ,  $am_end ,  $pm_start ,  $pm_end ,  $order_by ,  $status    


    );
              
    header("Location: index.php?c=schedule&a=details&id=$lastInsertId");

    
} else {

    array_push($error, "Check your form");
}

//include "www/schedule/views/index.php";   
include view("schedule", "index");  
