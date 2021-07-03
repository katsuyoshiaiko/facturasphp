<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$content = (isset($_POST["content"])) ? clean($_POST["content"]) : false;
$language = (isset($_POST["language"])) ? clean($_POST["language"]) : false;
$translation = (isset($_POST["translation"])) ? clean($_POST["translation"]) : false;
$order_by = (isset($_POST["order_by"])) ? clean($_POST["order_by"]) : false;
$status = (isset($_POST["status"])) ? clean($_POST["status"]) : false;
  



$error = array();




if (!$content) {
    array_push($error, '$content not send');
}
if (!$language) {
    array_push($error, '$language not send');
}
if (!$translation) {
    array_push($error, '$translation not send');
}
if (!$order_by) {
    array_push($error, '$order_by not send');
}
if (!$status) {
    array_push($error, '$status not send');
}
  
                


#************************************************************************
// Busca si uya existe el texto en la BD
  

if( _diccionario_search($status)){
    //array_push($error, "That text with that context the database already exists");
}


if (!$error) {
    $lastInsertId = _diccionario_add(
            
            
$content ,  $language ,  $translation ,  $order_by ,  $status    


    );
              
    header("Location: index.php?c=_diccionario&a=details&id=$lastInsertId");

    
} else {

    array_push($error, "Check your form");
}

//include "www/_diccionario/views/index.php";   
include view("_diccionario", "index");  
