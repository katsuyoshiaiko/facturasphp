<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

//$id             = (isset($_POST["id"])) ? clean($_POST["id"]) : false;
//$contact_id     = (isset($_POST["contact_id"])) ? clean($_POST["contact_id"]) : false;
$bank           = (isset($_POST["bank"])) ? clean($_POST["bank"]) : false;
$account_number = (isset($_POST["account_number"])) ? clean($_POST["account_number"]) : false;
$bic            = (isset($_POST["bic"])) ? clean($_POST["bic"]) : false;
$iban           = (isset($_POST["iban"])) ? clean($_POST["iban"]) : false;
//$status         = (isset($_POST["status"])) ? clean($_POST["status"]) : false;
 



$error = array();

if(  $bank =='' || $account_number =='' ){
    array_push($error, 'Bank and Account number can not be empty'); 
}


################################################################################
################################################################################
################################################################################
if ( !$error ) {
    
    _options_update('config_bank_bank', $bank); 
    _options_update('config_bank_account_number', $account_number); 
    _options_update('config_bank_bic', $bic); 
    _options_update('config_bank_iban', $iban); 
    
    
    
    header("Location: index.php?c=config&a=bank&sms=1"); 
    
    
}else{
    
    include view('home', 'pageError');
}







