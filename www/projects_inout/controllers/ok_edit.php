<?php
if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
// Recolection vars


$id = (isset($_POST["id"])) ? clean($_POST["id"]) : false;
$project_id = (isset($_POST["project_id"])) ? clean($_POST["project_id"]) : false;
$budget_id = (isset($_POST["budget_id"])) ? clean($_POST["budget_id"]) : false;
$invoice_id = (isset($_POST["invoice_id"])) ? clean($_POST["invoice_id"]) : false;
$expense_id = (isset($_POST["expense_id"])) ? clean($_POST["expense_id"]) : false;
$order_by = (isset($_POST["order_by"])) ? clean($_POST["order_by"]) : false;
$status = (isset($_POST["status"])) ? clean($_POST["status"]) : false;
 

$redi = (isset($_POST["redi"])) ? clean($_POST["redi"]) : false;

$error = array();
//
################################################################################
//
if (! $id) {
    array_push($error, "ID Don't send");
}
//
if (! $text) {
   // array_push($error, "Text Don't send");
}
//
################################################################################

if (! projects_inout_is_id($id)) {
    array_push($error, "ID format error");
}
//
################################################################################
################################################################################
################################################################################
if (! $error ) {
    
    projects_inout_edit(
        


$id ,  $project_id ,  $budget_id ,  $invoice_id ,  $expense_id ,  $order_by ,  $status    



                
        );
        
 switch ($redi) {
        case 1:
            header("Location: index.php?c=projects_inout");
            break;

        default:
            header("Location: index.php?c=projects_inout&a=details&id=$id");
            break;
    }
    

        
          
} else {

    include view("home", "pageError");  
}

 
