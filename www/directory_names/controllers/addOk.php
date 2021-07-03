<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$name = (isset($_POST["name"])) ? clean($_POST["name"]) : false;
$order = (isset($_POST["order"])) ? clean($_POST["order"]) : false;
  



$error = array();




if (!$name) {
    array_push($error, '$name not send');
}
if (!$order) {
    array_push($error, '$order not send');
}
  
                


#************************************************************************
// Busca si uya existe el texto en la BD

if( directory_names_search_by_unique("id","name", $name)){
    array_push($error, 'name already exists in data base');
}

  

if( directory_names_search($order)){
    //array_push($error, "That text with that context the database already exists");
}


if (!$error) {
    $lastInsertId = directory_names_add(
            
            
$name ,  $order    


    );
              
    header("Location: index.php?c=directory_names&a=details&id=$lastInsertId");

    
} else {

    array_push($error, "Check your form");
}

//include "www/directory_names/views/index.php";   
include view("directory_names", "index");  
