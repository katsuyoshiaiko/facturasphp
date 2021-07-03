<?php
if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}



// *****************************************
//$totalItems = count(invoices_list()) ;
 
//include controller("home", "pagination"); 
// ****************************************

$stats = stats_remakes_by_office(1) ;

include view("stats", 'remakes_by_office'); 
