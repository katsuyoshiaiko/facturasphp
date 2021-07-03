<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$rol = (isset($_POST["rol"])) ? clean($_POST["rol"]) : false;
$rango = (isset($_POST["rango"])) ? clean($_POST["rango"]) : false;
$order = (isset($_POST["order"])) ? clean($_POST["order"]) : false;
  



$error = array();




if (!$rol) {
    array_push($error, '$rol not send');
}
if (!$rango) {
    array_push($error, '$rango not send');
}
if (!$order) {
    array_push($error, '$order not send');
}
  
                


#************************************************************************
// Busca si uya existe el texto en la BD

if( rols_search_by_unique("id","rol", $rol)){
    array_push($error, 'rol already exists in data base');
}

  

if( rols_search($order)){
    //array_push($error, "That text with that context the database already exists");
}


if (!$error) {
    $lastInsertId = rols_add(
            
            
$rol ,  $rango ,  $order    


    );
              
    header("Location: index.php?c=rols&a=details&id=$lastInsertId");

    
} else {

    array_push($error, "Check your form");
}

//include "www/rols/views/index.php";   
include view("rols", "index");  
