<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

//vardump($_POST); 
//die(); 
$expense_id = (isset($_POST["expense_id"])) ? clean($_POST["expense_id"]) : false;
$ce = (($_POST["ce"]) != "") ? clean($_POST["ce"]) : '-';

$error = array();




if (!$expense_id) {
    array_push($error, '$expense_id not send');
}



if (!$error) {
    expenses_update_ce(
            $expense_id, $ce
    );

    header("Location: index.php?c=expenses&a=edit&id=$expense_id#ce");
} else {
   
    include view("home", "pageError");
}
