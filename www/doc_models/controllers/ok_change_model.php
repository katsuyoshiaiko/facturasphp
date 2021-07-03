<?php

if (!permissions_has_permission($u_rol, $c, "delete")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$model    = (isset($_GET["model"]))         ? clean($_GET["model"]) : false;


$error = array();
################################################################################

if (! $model ) {
    array_push($error, "ID Don't send");
}
################################################################################
################################################################################

if ( !$error) {
    
    _options_update("doc_model", $model); 

    header("Location: index.php?c=doc_models");
         
}else{
    include view("home", "pageError");  
}