<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$_tmf_materials_options_id = (isset($_POST["_tmf_materials_options_id"])) ? clean($_POST["_tmf_materials_options_id"]) : false;
$disabled_id_items = (isset($_POST["disabled_id"])) ? ($_POST["disabled_id"]) : false;
$type_id = (isset($_POST["type_id"])) ? ($_POST["type_id"]) : false;
$order_by = (isset($_POST["order_by"])) ? clean($_POST["order_by"]) : 1;
$status = (isset($_POST["status"])) ? clean($_POST["status"]) : 1;


$error = array();


if (!$_tmf_materials_options_id) {
    array_push($error, '$_tmf_materials_options_id not send');
}
//if (!$disabled_id) {
//   // array_push($error, '$disabled_id not send');
//}
if (!$order_by) {
    array_push($error, '$order_by not send');
}
if (!$status) {
    array_push($error, '$status not send');
}


// Borro todo lo que tiene el id 
#************************************************************************
// Busca si uya existe el texto en la BD


if (_options_options_search($status)) {
    //array_push($error, "That text with that context the database already exists");
}


if (!$error) {


    _options_options_delete_by_tmf_materials_options_id(intval($_tmf_materials_options_id));



    //vardump($_tmf_materials_options_id); 


    foreach ($disabled_id_items as $disabled_id) {

        $lastInsertId = _options_options_add(
                $_tmf_materials_options_id, intval($disabled_id), $order_by, $status
        );

//        vardump($lastInsertId);
    }


    
    
        
        
        
    header("Location: index.php?c=_types_modeles_formes&a=search&w=tm&type_id=$type_id&modele_id=null");
} else {

    array_push($error, "Check your form");
}

//include "www/_options_options/views/index.php";   
include view("_options_options", "index");
