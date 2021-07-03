<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}



$error = array();
$_content = null;
$_content = _content_list(10, 5);
    
//include "www/_content/views/index.php";
include view("_content", "index");  
if ($debug) {
    include "www/_content/views/debug.php";
}