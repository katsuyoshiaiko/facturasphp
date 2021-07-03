<?php
if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
// Recolection vars


$id = (isset($_POST["id"])) ? clean($_POST["id"]) : false;
$name = (isset($_POST["name"])) ? clean($_POST["name"]) : false;
$sub_modules = (isset($_POST["sub_modules"])) ? clean($_POST["sub_modules"]) : false;
$description = (isset($_POST["description"])) ? clean($_POST["description"]) : false;
$author = (isset($_POST["author"])) ? clean($_POST["author"]) : false;
$author_email = (isset($_POST["author_email"])) ? clean($_POST["author_email"]) : false;
$url = (isset($_POST["url"])) ? clean($_POST["url"]) : false;
$version = (isset($_POST["version"])) ? clean($_POST["version"]) : false;
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

if (! modules_is_id($id)) {
    array_push($error, "ID format error");
}
//
################################################################################
if (! $error ) {
    
    modules_edit(
        


$id ,  $name ,  $sub_modules ,  $description ,  $author ,  $author_email ,  $url ,  $version ,  $order_by ,  $status    



                
        );
        header("Location: index.php?c=modules&a=details&id=$id");
          
}

$modules = modules_details($id);
    
include view("modules", "index");  
