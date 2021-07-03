<?php
if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
// Recolection vars


$id = (isset($_POST["id"])) ? clean($_POST["id"]) : false;
$option = (isset($_POST["option"])) ? clean($_POST["option"]) : false;
$data = (isset($_POST["data"])) ? clean($_POST["data"]) : false;
$group = (isset($_POST["group"])) ? clean($_POST["group"]) : false;
 



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

if (! _options_is_id($id)) {
    array_push($error, "ID format error");
}
//
################################################################################
if (! $error ) {
    
    _options_edit(
        


$id ,  $option ,  $data ,  $group    



                
        );
        header("Location: index.php?c=_options&a=details&id=$id");
          
}

$_options = _options_details($id);
    
include view("_options", "index");  
