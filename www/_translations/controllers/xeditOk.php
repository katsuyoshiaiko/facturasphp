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

if (! _translations_is_id($id)) {
    array_push($error, "ID format error");
}
//
################################################################################
if (! $error ) {
    
    _translations_edit(
        


$id ,  $content ,  $language ,  $translation    



                
        );
        header("Location: index.php?c=_translations&a=details&id=$id");
          
}

$_translations = _translations_details($id);
    
include view("_translations", "index");  
