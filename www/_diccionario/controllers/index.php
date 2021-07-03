<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}



$error = array();
$_diccionario = null;
$_diccionario = _diccionario_list(10, 5);
    
//include "www/_diccionario/views/index.php";
include view("_diccionario", "index");  
if ($debug) {
    include "www/_diccionario/views/debug.php";
}