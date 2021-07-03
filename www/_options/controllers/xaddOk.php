<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$option = (isset($_POST["option"])) ? clean($_POST["option"]) : false;
$data = (isset($_POST["data"])) ? clean($_POST["data"]) : false;
$group = (isset($_POST["group"])) ? clean($_POST["group"]) : false;
  



$error = array();




if (!$option) {
    array_push($error, '$option not send');
}
if (!$data) {
    array_push($error, '$data not send');
}
if (!$group) {
    array_push($error, '$group not send');
}
  
                


#************************************************************************
// Busca si uya existe el texto en la BD

if( _options_search_by_unique("id","option", $option)){
    array_push($error, 'option already exists in data base');
}

  

if( _options_search($group)){
    //array_push($error, "That text with that context the database already exists");
}


if (!$error) {
    $lastInsertId = _options_add(
            
            
$option ,  $data ,  $group    


    );
              
    header("Location: index.php?c=_options&a=details&id=$lastInsertId");

    
} else {

    array_push($error, "Check your form");
}

//include "www/_options/views/index.php";   
include view("_options", "index");  
