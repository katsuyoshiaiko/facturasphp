<?php
if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$id = (isset($_POST["id"])) ? clean($_POST["id"]) : false;
$rol = (isset($_POST["rol"])) ? clean($_POST["rol"]) : false;
$controller = (isset($_POST["controller"])) ? clean($_POST["controller"]) : false;
$crud = (isset($_POST["crud"])) ? clean($_POST["crud"]) : false;
 



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

if (! permissions_is_id($id)) {
    array_push($error, "ID format error");
}
//
################################################################################
if (! $error ) {
    
    permissions_edit(
        


$id ,  $rol ,  $controller ,  $crud    



                
        );
        header("Location: index.php?c=permissions&a=details&id=$id");
          
}

$permissions = permissions_details($id);
    
include view("permissions", "index");  
