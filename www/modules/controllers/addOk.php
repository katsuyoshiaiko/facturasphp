<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$name = (isset($_POST["name"])) ? clean($_POST["name"]) : false;
$sub_modules = (isset($_POST["sub_modules"])) ? clean($_POST["sub_modules"]) : false;
$description = (isset($_POST["description"])) ? clean($_POST["description"]) : false;
$author = (isset($_POST["author"])) ? clean($_POST["author"]) : false;
$author_email = (isset($_POST["author_email"])) ? clean($_POST["author_email"]) : false;
$url = (isset($_POST["url"])) ? clean($_POST["url"]) : false;
$version = (isset($_POST["version"])) ? clean($_POST["version"]) : false;
$order_by = (isset($_POST["order_by"])) ? clean($_POST["order_by"]) : false;
$status = (isset($_POST["status"])) ? clean($_POST["status"]) : false;
  



$error = array();




if (!$name) {
    array_push($error, '$name not send');
}
if (!$sub_modules) {
    array_push($error, '$sub_modules not send');
}
if (!$description) {
    array_push($error, '$description not send');
}
if (!$author) {
    array_push($error, '$author not send');
}
if (!$author_email) {
    array_push($error, '$author_email not send');
}
if (!$url) {
    array_push($error, '$url not send');
}
if (!$version) {
    array_push($error, '$version not send');
}
if (!$order_by) {
    array_push($error, '$order_by not send');
}
if (!$status) {
    array_push($error, '$status not send');
}
  
                


#************************************************************************
// Busca si uya existe el texto en la BD

if( modules_search_by_unique("id","name", $name)){
    array_push($error, 'name already exists in data base');
}

  

if( modules_search($status)){
    //array_push($error, "That text with that context the database already exists");
}


if (!$error) {
    $lastInsertId = modules_add(
            
            
$name ,  $sub_modules ,  $description ,  $author ,  $author_email ,  $url ,  $version ,  $order_by ,  $status    


    );
              
    header("Location: index.php?c=modules&a=details&id=$lastInsertId");

    
} else {

    array_push($error, "Check your form");
}

//include "www/modules/views/index.php";   
include view("modules", "index");  
