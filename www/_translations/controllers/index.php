<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}



$error = array();
$_translations = null;
$_translations = _translations_list(10, 5);
    
//include "www/_translations/views/index.php";
include view("_translations", "index");  
if ($debug) {
    include "www/_translations/views/debug.php";
}