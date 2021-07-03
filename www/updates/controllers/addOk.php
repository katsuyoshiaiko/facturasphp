<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$date = (isset($_POST["date"])) ? clean($_POST["date"]) : false;
$version = (isset($_POST["version"])) ? clean($_POST["version"]) : false;
$name = (isset($_POST["name"])) ? clean($_POST["name"]) : false;
$description = (isset($_POST["description"])) ? clean($_POST["description"]) : false;
$code_install = (isset($_POST["code_install"])) ? clean($_POST["code_install"]) : false;
$code_uninstall = (isset($_POST["code_uninstall"])) ? clean($_POST["code_uninstall"]) : false;
$code_check = (isset($_POST["code_check"])) ? clean($_POST["code_check"]) : false;
$installed = (isset($_POST["installed"])) ? clean($_POST["installed"]) : false;
  



$error = array();




if (!$date) {
    array_push($error, '$date not send');
}
if (!$version) {
    array_push($error, '$version not send');
}
if (!$name) {
    array_push($error, '$name not send');
}
if (!$description) {
    array_push($error, '$description not send');
}
if (!$code_install) {
    array_push($error, '$code_install not send');
}
if (!$code_uninstall) {
    array_push($error, '$code_uninstall not send');
}
if (!$code_check) {
    array_push($error, '$code_check not send');
}
if (!$installed) {
    array_push($error, '$installed not send');
}
  
                


#************************************************************************
// Busca si uya existe el texto en la BD
  

if( updates_search($installed)){
    //array_push($error, "That text with that context the database already exists");
}


if (!$error) {
    $lastInsertId = updates_add(
            
            
$date ,  $version ,  $name ,  $description ,  $code_install ,  $code_uninstall ,  $code_check ,  $installed    


    );
              
    header("Location: index.php?c=updates&a=details&id=$lastInsertId");

    
} else {

    array_push($error, "Check your form");
}

//include "www/updates/views/index.php";   
include view("updates", "index");  
