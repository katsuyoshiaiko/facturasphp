<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$frase = (isset($_POST["frase"])) ? clean($_POST["frase"]) : false;
$contexto = (isset($_POST["contexto"])) ? clean($_POST["contexto"]) : false;
  



$error = array();




if (!$frase) {
    array_push($error, '$frase not send');
}
if (!$contexto) {
    array_push($error, '$contexto not send');
}
  
                


#************************************************************************
// Busca si uya existe el texto en la BD
  

if( _content_search($contexto)){
    //array_push($error, "That text with that context the database already exists");
}


if (!$error) {
    $lastInsertId = _content_add(
            
            
$frase ,  $contexto    


    );
              
    header("Location: index.php?c=_content&a=details&id=$lastInsertId");

    
} else {

    array_push($error, "Check your form");
}

//include "www/_content/views/index.php";   
include view("_content", "index");  
