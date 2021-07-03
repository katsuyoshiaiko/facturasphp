<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
$invoice_lines = null;
$w = (isset($_GET["w"])) ? clean($_GET["w"]) : false;
$error = array();

################################################################################
################################################################################
switch ($w) {
    case "id":
        $txt = (isset($_GET["txt"])) ? clean($_GET["txt"]) : false;        
        $invoice_lines = invoice_lines_search_by_id($txt);
        include view("invoice_lines", "index");   
        break;
    
    case "dd": // description distinct
        //$txt = (isset($_GET["txt"])) ? clean($_GET["txt"]) : false;        
        $invoice_lines = invoice_lines_search_by_description_distinct();
        include view("invoice_lines", "dd");   
        break;

    default:
        $txt = (isset($_GET["txt"])) ? clean($_GET["txt"]) : false;
        $invoice_lines = invoice_lines_search($txt);
        include view("invoice_lines", "index");   
        break;
}

   
