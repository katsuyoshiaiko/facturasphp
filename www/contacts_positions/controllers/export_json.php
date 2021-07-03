<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}


$error = array();

$contacts_positions = null;

$contacts_positions = contacts_positions_list();

//include "www/contacts_positions/views/export_json.php";
include view("contacts_positions", "export_json");  
if ($debug) {
    include "www/contacts_positions/views/debug.php";
}