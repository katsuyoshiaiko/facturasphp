<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}



$error = array();
$comments = null;
$comments = comments_list(10, 5);
    
//include "www/comments/views/index.php";
include view("comments", "index");  
if ($debug) {
    include "www/comments/views/debug.php";
}