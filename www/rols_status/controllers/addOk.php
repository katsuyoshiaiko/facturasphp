<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$rol = (isset($_POST["rol"])) ? clean($_POST["rol"]) : false;
$status_code = (isset($_POST["status_code"])) ? clean($_POST["status_code"]) : false;
  

vardump($_POST); 

$error = array();




if (!$rol) {
    array_push($error, '$rol not send');
}
if( ! orders_status_field_code('id', $status_code)) {
    array_push($error, '$status_code not send');
}
  
                


#************************************************************************
// Busca si uya existe el texto en la BD
  

if( rols_status_search($status_code)){
    //array_push($error, "That text with that context the database already exists");
}


if (!$error) {
    $lastInsertId = rols_status_add(
            
            
$rol ,  $status_code    


    );
              
    header("Location: index.php?c=rols_status&a=details&id=$lastInsertId");

    
} else {

    array_push($error, "Check your form");
}

//include "www/rols_status/views/index.php";   
include view("rols_status", "index");  
