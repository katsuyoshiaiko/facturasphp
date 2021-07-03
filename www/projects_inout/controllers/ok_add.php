<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$project_id = (isset($_POST["project_id"])) ? clean($_POST["project_id"]) : false;
$budget_id = (isset($_POST["budget_id"])) ? clean($_POST["budget_id"]) : false;
$invoice_id = (isset($_POST["invoice_id"])) ? clean($_POST["invoice_id"]) : false;
$expense_id = (isset($_POST["expense_id"])) ? clean($_POST["expense_id"]) : false;
$order_by = (isset($_POST["order_by"])) ? clean($_POST["order_by"]) : false;
$status = (isset($_POST["status"])) ? clean($_POST["status"]) : false;
  

$redi = (isset($_POST["redi"])) ? clean($_POST["redi"]) : false;

$error = array();




if (!$project_id) {
    array_push($error, '$project_id not send');
}
if (!$budget_id) {
    array_push($error, '$budget_id not send');
}
if (!$invoice_id) {
    array_push($error, '$invoice_id not send');
}
if (!$expense_id) {
    array_push($error, '$expense_id not send');
}
if (!$order_by) {
    array_push($error, '$order_by not send');
}
if (!$status) {
    array_push($error, '$status not send');
}
  
                


#************************************************************************
// Busca si uya existe el texto en la BD
  

if( projects_inout_search($status)){
    //array_push($error, "That text with that context the database already exists");
}


if (!$error) {
    $lastInsertId = projects_inout_add(
            
            
$project_id ,  $budget_id ,  $invoice_id ,  $expense_id ,  $order_by ,  $status    


    );
              
    

    switch ($redi) {
        case 1:
            header("Location: index.php?c=projects_inout");
            break;

        default:
            header("Location: index.php?c=projects_inout&a=details&id=$lastInsertId");
            break;
    }
    
} else {

    include view("home", "pageError");  
}


