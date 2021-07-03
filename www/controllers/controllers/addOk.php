<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$controller = (isset($_POST["controller"])) ? clean($_POST["controller"]) : false;
$title = (isset($_POST["title"])) ? clean($_POST["title"]) : false;
$description = (isset($_POST["description"])) ? clean($_POST["description"]) : false;
  



$error = array();




if (!$controller) {
    array_push($error, '$controller not send');
}
if (!$title) {
    array_push($error, '$title not send');
}
if (!$description) {
    array_push($error, '$description not send');
}
  
                


#************************************************************************
// Busca si uya existe el texto en la BD
  

if( controllers_search($description)){
    //array_push($error, "That text with that context the database already exists");
}


if (!$error) {
    $lastInsertId = controllers_add(
            
            
$controller ,  $title ,  $description    


    );
              
    header("Location: index.php?c=controllers&a=details&id=$lastInsertId");

    
} else {

    array_push($error, "Check your form");
}

//include "www/controllers/views/index.php";   
include view("controllers", "index");  
