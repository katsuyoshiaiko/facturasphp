<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

//vardump($_POST); 
//die(); 
$expense_id = (isset($_POST["expense_id"])) ? clean($_POST["expense_id"]) : false;
$comments = (($_POST["comments"]) != "") ? clean($_POST["comments"]) : '-';

$error = array();




if (!$expense_id) {
    array_push($error, '$expense_id not send');
}



if (!$error) {
    expenses_comments_update(
            $expense_id, $comments
    );

    header("Location: index.php?c=expenses&a=edit&id=$expense_id#comments");
} else {
   
    include view("home", "pageError");
}
