<?php
if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}



// *****************************************
//$totalItems = count(invoices_list()) ;
 
//include controller("home", "pagination"); 
// ****************************************

$stats = stats_remakes() ;

include view("stats", 'addresses_by_city'); 
