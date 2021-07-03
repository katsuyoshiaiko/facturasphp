<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}



$error = array();
$credit_notes = null;
$credit_notes = credit_notes_list(10, 5);
    
//include "www/credit_notes/views/index.php";
include view("credit_notes", "index");  
if ($debug) {
    include view("credit_notes", "debug");
}