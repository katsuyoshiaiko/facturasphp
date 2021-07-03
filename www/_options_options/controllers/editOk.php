<?php
if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
// Recolection vars


$id = (isset($_POST["id"])) ? clean($_POST["id"]) : false;
$_tmf_materials_options_id = (isset($_POST["_tmf_materials_options_id"])) ? clean($_POST["_tmf_materials_options_id"]) : false;
$disabled_id = (isset($_POST["disabled_id"])) ? clean($_POST["disabled_id"]) : false;
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

if (! _options_options_is_id($id)) {
    array_push($error, "ID format error");
}
//
################################################################################
if (! $error ) {
    
    _options_options_edit(
        


$id ,  $_tmf_materials_options_id ,  $disabled_id ,  $order_by ,  $status    



                
        );
        header("Location: index.php?c=_options_options&a=details&id=$id");
          
}

$_options_options = _options_options_details($id);
    
include view("_options_options", "index");  
