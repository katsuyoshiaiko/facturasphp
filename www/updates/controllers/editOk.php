<?php
if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
// Recolection vars


$id = (isset($_POST["id"])) ? clean($_POST["id"]) : false;
$date = (isset($_POST["date"])) ? clean($_POST["date"]) : false;
$version = (isset($_POST["version"])) ? clean($_POST["version"]) : false;
$name = (isset($_POST["name"])) ? clean($_POST["name"]) : false;
$description = (isset($_POST["description"])) ? clean($_POST["description"]) : false;
$code_install = (isset($_POST["code_install"])) ? clean($_POST["code_install"]) : false;
$code_uninstall = (isset($_POST["code_uninstall"])) ? clean($_POST["code_uninstall"]) : false;
$code_check = (isset($_POST["code_check"])) ? clean($_POST["code_check"]) : false;
$installed = (isset($_POST["installed"])) ? clean($_POST["installed"]) : false;
 



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

if (! updates_is_id($id)) {
    array_push($error, "ID format error");
}
//
################################################################################
if (! $error ) {
    
    updates_edit(
        


$id ,  $date ,  $version ,  $name ,  $description ,  $code_install ,  $code_uninstall ,  $code_check ,  $installed    



                
        );
        header("Location: index.php?c=updates&a=details&id=$id");
          
}

$updates = updates_details($id);
    
include view("updates", "index");  
