<?php
if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
// Recolection vars


$id = (isset($_POST["id"])) ? clean($_POST["id"]) : false;
$content = (isset($_POST["content"])) ? clean($_POST["content"]) : false;
$language = (isset($_POST["language"])) ? clean($_POST["language"]) : false;
$translation = (isset($_POST["translation"])) ? clean($_POST["translation"]) : false;
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

if (! _diccionario_is_id($id)) {
    array_push($error, "ID format error");
}
//
################################################################################
if (! $error ) {
    
    _diccionario_edit(
        


$id ,  $content ,  $language ,  $translation ,  $order_by ,  $status    



                
        );
        header("Location: index.php?c=_diccionario&a=details&id=$id");
          
}

$_diccionario = _diccionario_details($id);
    
include view("_diccionario", "index");  
