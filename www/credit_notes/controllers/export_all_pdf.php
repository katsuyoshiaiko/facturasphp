<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$error = array();
$invoices = null;

$year = (isset($_REQUEST["year"]) && isset($_REQUEST["year"]) !="") ? clean($_REQUEST["year"]) : date("Y");
$tri = (isset($_REQUEST["tri"]) && isset($_REQUEST["tri"]) !="") ? clean($_REQUEST["tri"]) : 1; 


$credit_notes = credit_notes_search_by_year_trimestre($year, $tri);
    
include view("credit_notes", "export_all_pdf");      
if ($debug) {
    include "www/invoices/views/debug.php";
}