<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}


//
//$error = array();
//$expenses = null;
//$expenses = expenses_list(10, 5);
    
//include "www/expenses/views/index.php";
include view("export", "index");  

if ($debug) {
    include "www/expenses/views/debug.php";
}