<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
$expenses = null;
$w = (isset($_GET["w"])) ? clean($_GET["w"]) : false;
$error = array();

################################################################################
################################################################################
switch ($w) {
    case "id":
        $id = (($_GET["id"]) !="") ? clean($_GET["id"]) : false;
        $expenses = expenses_search_by_id($id);
        break;
    case "byCode":
        $code = (($_GET["code"]) !="") ? clean($_GET["code"]) : false;
        $expenses = expenses_search_by_code($code);
        break;
    case "byClient":
        
        $client_id = (($_GET["client_id"]) != "") ? clean($_GET["client_id"]) : false ;        
        $status = (($_GET["status"]) != "") ? clean($_GET["status"]) : "all" ;          
        $year = (($_GET["year"]) != "") ? clean($_GET["year"]) : date("Y") ;          
        $month = (($_GET["month"]) != "") ? clean($_GET["month"]) : date("n") ;                  
        // No facturadas
        $monthly = (isset($_GET["monthly"]) && $_GET["monthly"]  == "on") ? true : false ;  


        $expenses = expenses_search_advanced($client_id , $status , $year , $month , $monthly); 
        break;    

    default:
        $txt = (isset($_GET["txt"])) ? clean($_GET["txt"]) : false;
        $expenses = expenses_search($txt);
        break;
}

//die();
//include "www/expenses/views/index.php";
include view("expenses", "index");
