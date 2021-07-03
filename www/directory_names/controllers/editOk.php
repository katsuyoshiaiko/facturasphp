<?php
if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
// Recolection vars


$id = (isset($_POST["id"])) ? clean($_POST["id"]) : false;
$name = (isset($_POST["name"])) ? clean($_POST["name"]) : false;
$order = (isset($_POST["order"])) ? clean($_POST["order"]) : false;
 



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

if (! directory_names_is_id($id)) {
    array_push($error, "ID format error");
}
//
################################################################################
if (! $error ) {
    
    directory_names_edit(
        


$id ,  $name ,  $order    



                
        );
        header("Location: index.php?c=directory_names&a=details&id=$id");
          
}

$directory_names = directory_names_details($id);
    
include view("directory_names", "index");  
