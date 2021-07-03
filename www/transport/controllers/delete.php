<?php

if (!permissions_has_permission($u_rol, $c, "delete")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$id    = (isset($_GET["id"]))         ? clean($_GET["id"]) : false;

$transport_code = transport_field_id('code', $id);


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

if (! transport_is_id($id)) {
    array_push($error, 'Id format error ');
}

// ya usa alguna direccion este medio de transport?
if(addresses_transport_search_by_transport_code($transport_code)){
    array_push($error, 'Transport in use, you cannot delete it');
}

################################################################################
$transport = transport_details($id);


if(!$error){
    include view("transport", "delete");  
}else{
    include view("home", "pageError");  
}



