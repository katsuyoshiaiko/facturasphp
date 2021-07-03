<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}



$error = array();
$gallery = null;
$gallery = gallery_list(10, 5);
    

include view("gallery", "index");  
if ($debug) {
    include "www/gallery/views/debug.php";
}