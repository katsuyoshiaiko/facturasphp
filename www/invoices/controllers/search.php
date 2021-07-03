<?php

//

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
$invoices = null;
$w = (isset($_GET["w"])) ? clean($_GET["w"]) : false;




$error = array();

################################################################################
################################################################################
if (!$error) {
    
    switch ($w) {
        case "id":
            $id = (($_GET["id"]) != "") ? clean($_GET["id"]) : false;
            $invoices = invoices_search_by_id($id);
            break;

        case "byCode":
            $code = (($_GET["code"]) != "") ? clean($_GET["code"]) : false;
            $invoices = invoices_search_by_code($code);
            break;

        case "byMultiStatus":
            $codes = 
        (isset($_GET['codes']) && ($_GET["codes"]) != "") 
        ? 
        clean($_GET["codes"]) 
        : 
        array(10,20);

$codes_array = explode(',', $codes);

foreach ($codes_array as $key => $code) {
    if (!is_numeric($code)) {
        array_push($error, "Code format error");
    }
}



            $invoices = invoices_search_by_multi_code($codes_array);
            break;

        case "byClient":
            $client_id = (($_GET["client_id"]) != "") ? clean($_GET["client_id"]) : false;
            $status = (($_GET["status"]) != "") ? clean($_GET["status"]) : "all";
            $year = (($_GET["year"]) != "") ? clean($_GET["year"]) : date("Y");
            $month = (($_GET["month"]) != "") ? clean($_GET["month"]) : date("n");
            // No facturadas
            $monthly = (isset($_GET["monthly"]) && $_GET["monthly"] == "on") ? true : false;
            $invoices = invoices_search_advanced($client_id, $status, $year, $month, $monthly);
            break;

        default:
            $txt = (isset($_GET["txt"])) ? clean($_GET["txt"]) : false;
            $invoices = invoices_search($txt);
            break;
    }
    
    include view("invoices", "index");
    
    
} else {
    include view("home", "pageError");
}