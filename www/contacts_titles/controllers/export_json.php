<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}


$error = array();

$contacts_titles = null;

$contacts_titles = contacts_titles_list();

//include "www/contacts_titles/views/export_json.php";
include view("contacts_titles", "export_json");  
if ($debug) {
    include "www/contacts_titles/views/debug.php";
}