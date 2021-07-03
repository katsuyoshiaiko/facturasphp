<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}


$error = array();

$comments = null;

$comments = comments_list();

//include "www/comments/views/export_json.php";
include view("comments", "export_json");  
if ($debug) {
    include "www/comments/views/debug.php";
}