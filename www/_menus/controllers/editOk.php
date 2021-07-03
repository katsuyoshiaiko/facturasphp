<?php
if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
// Recolection vars


$id = (isset($_POST["id"])) ? clean($_POST["id"]) : false;
$location = (isset($_POST["location"])) ? clean($_POST["location"]) : false;
$father = (isset($_POST["father"])) ? clean($_POST["father"]) : false;
$label = (isset($_POST["label"])) ? clean($_POST["label"]) : false;
$url = (isset($_POST["url"])) ? clean($_POST["url"]) : false;
$icon = (isset($_POST["icon"])) ? clean($_POST["icon"]) : false;
$order_by = (isset($_POST["order_by"])) ? clean($_POST["order_by"]) : false;
 



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

if (! _menus_is_id($id)) {
    array_push($error, "ID format error");
}
//
################################################################################
if (! $error ) {
    
    _menus_edit(
        


$id ,  $location ,  $father ,  $label ,  $url ,  $icon ,  $order_by    



                
        );
        header("Location: index.php?c=_menus&a=details&id=$id");
          
}

$_menus = _menus_details($id);
    
include view("_menus", "index");  
