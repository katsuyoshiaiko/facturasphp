<?php
if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}



// *****************************************
$totalItems = count(invoices_list()) ;

//vardump($totalItems); 

include controller("home", "pagination"); 
// ****************************************

$invoices = invoices_list($limit , $start) ;

include view("invoices", 'index'); 
