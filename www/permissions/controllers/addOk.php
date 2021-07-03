<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$rol = (isset($_POST["rol"])) ? clean($_POST["rol"]) : false;
$controller = (isset($_POST["controller"])) ? clean($_POST["controller"]) : false;
$crud = (isset($_POST["crud"])) ? clean($_POST["crud"]) : false;
  



$error = array();




if (!$rol) {
    array_push($error, '$rol not send');
}
if (!$controller) {
    array_push($error, '$controller not send');
}
if (!$crud) {
    array_push($error, '$crud not send');
}
  
                


#************************************************************************
// Busca si uya existe el texto en la BD
  

if( permissions_search($crud)){
    //array_push($error, "That text with that context the database already exists");
}


if (!$error) {
    $lastInsertId = permissions_add(
            
            
$rol ,  $controller ,  $crud    


    );
              
    header("Location: index.php?c=permissions&a=details&id=$lastInsertId");

    
} else {

    array_push($error, "Check your form");
}

//include "www/permissions/views/index.php";   
include view("permissions", "index");  
