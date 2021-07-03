<?php
if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}



// *****************************************
//$totalItems = count(invoices_list()) ;
 
//include controller("home", "pagination"); 
// ****************************************

$stat = stats_invoice_lines_stat() ;

include view("stats", 'invoices'); 
