<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}


$error = array();

$credit_notes = null;

$credit_notes = credit_notes_list();

//include "www/credit_notes/views/export_json.php";
include view("credit_notes", "export_json");  
if ($debug) {
    include "www/credit_notes/views/debug.php";
}