<?php
if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
// Recolection vars


$id = (isset($_POST["id"])) ? clean($_POST["id"]) : false;
$contact_id = (isset($_POST["contact_id"])) ? clean($_POST["contact_id"]) : false;
$day = (isset($_POST["day"])) ? clean($_POST["day"]) : false;
$am_start = (isset($_POST["am_start"])) ? clean($_POST["am_start"]) : false;
$am_end = (isset($_POST["am_end"])) ? clean($_POST["am_end"]) : false;
$pm_start = (isset($_POST["pm_start"])) ? clean($_POST["pm_start"]) : false;
$pm_end = (isset($_POST["pm_end"])) ? clean($_POST["pm_end"]) : false;
$order_by = (isset($_POST["order_by"])) ? clean($_POST["order_by"]) : false;
$status = (isset($_POST["status"])) ? clean($_POST["status"]) : false;
 



$error = array();
//
################################################################################
if (! $c) {
    array_push($error, "Controller Don't send");
}
//
if (! $a) {
    array_push($error, "Action Don't send");
}
//
if (! $id) {
    array_push($error, "ID Don't send");
}
//
if (! $text) {
   // array_push($error, "Text Don't send");
}
//
################################################################################

if (! schedule_is_id($id)) {
    array_push($error, "ID format error");
}
//
################################################################################
if (! $error ) {
    
    schedule_edit(
        


$id ,  $contact_id ,  $day ,  $am_start ,  $am_end ,  $pm_start ,  $pm_end ,  $order_by ,  $status    



                
        );
        header("Location: index.php?c=schedule&a=details&id=$id");
          
}

$schedule = schedule_details($id);
    
include view("schedule", "index");  
