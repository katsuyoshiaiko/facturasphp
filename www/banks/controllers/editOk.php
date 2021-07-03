<?php
if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
// Recolection vars


$id = (isset($_POST["id"])) ? clean($_POST["id"]) : false;
$contact_id = (isset($_POST["contact_id"])) ? clean($_POST["contact_id"]) : false;
$bank = (isset($_POST["bank"])) ? clean($_POST["bank"]) : false;
$account_number = (isset($_POST["account_number"])) ? clean($_POST["account_number"]) : false;
$bic = (isset($_POST["bic"])) ? clean($_POST["bic"]) : false;
$iban = (isset($_POST["iban"])) ? clean($_POST["iban"]) : false;
$status = (isset($_POST["status"])) ? clean($_POST["status"]) : false;
 



$error = array();
//
################################################################################
if (! $c) {
    array_push($error, "Controller Don't send");
}
//
if (! $a) {
    array_push($error, "Action Don't send");
}
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

if (! banks_is_id($id)) {
    array_push($error, "ID format error");
}
//
################################################################################
if (! $error ) {
    
    banks_edit(
        


$id ,  $contact_id ,  $bank ,  $account_number ,  $bic ,  $iban ,  $status    



                
        );
        header("Location: index.php?c=banks&a=details&id=$id");
          
}

$banks = banks_details($id);
    
include view("banks", "index");  
