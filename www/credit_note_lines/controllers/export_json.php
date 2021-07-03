<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}


$error = array();

$credit_note_lines = null;

$credit_note_lines = credit_note_lines_list();

//include "www/credit_note_lines/views/export_json.php";
include view("credit_note_lines", "export_json");  
if ($debug) {
    include "www/credit_note_lines/views/debug.php";
}