<?php

if (!permissions_has_permission($u_rol, $c, "delete")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$id    = (isset($_GET["id"]))         ? clean($_GET["id"]) : false;


$error = array();
################################################################################
if (! $c) {
    array_push($error, "Controller don't send");
}
if (! $a) {
    array_push($error, "Action don't send");
}
if (! $id) {
    array_push($error, "ID Don't send");
}
################################################################################

if ($a !="delete") {
    array_push($error, "Action error");
}

if (! _tmf_materials_options_is_id($id)) {
    array_push($error, 'Id format error ');
}

if(_tmf_materials_options_by_tmf_option_id($id)){
    array_push($error, 'Option used, you can not delete it');
}


################################################################################
$_tmf_materials_options = _tmf_materials_options_details($id);


//include "www/_tmf_materials_options/views/delete.php"; 
include view("_tmf_materials_options", "delete");  
