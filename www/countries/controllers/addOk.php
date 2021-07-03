<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$countryCode = (isset($_POST["countryCode"])) ? clean($_POST["countryCode"]) : false;
$countryName = (isset($_POST["countryName"])) ? clean($_POST["countryName"]) : false;
$currencyCode = (isset($_POST["currencyCode"])) ? clean($_POST["currencyCode"]) : false;
$fipsCode = (isset($_POST["fipsCode"])) ? clean($_POST["fipsCode"]) : false;
$isoNumeric = (isset($_POST["isoNumeric"])) ? clean($_POST["isoNumeric"]) : false;
$north = (isset($_POST["north"])) ? clean($_POST["north"]) : false;
$south = (isset($_POST["south"])) ? clean($_POST["south"]) : false;
$east = (isset($_POST["east"])) ? clean($_POST["east"]) : false;
$west = (isset($_POST["west"])) ? clean($_POST["west"]) : false;
$capital = (isset($_POST["capital"])) ? clean($_POST["capital"]) : false;
$continentName = (isset($_POST["continentName"])) ? clean($_POST["continentName"]) : false;
$continent = (isset($_POST["continent"])) ? clean($_POST["continent"]) : false;
$languages = (isset($_POST["languages"])) ? clean($_POST["languages"]) : false;
$isoAlpha3 = (isset($_POST["isoAlpha3"])) ? clean($_POST["isoAlpha3"]) : false;
$geonameId = (isset($_POST["geonameId"])) ? clean($_POST["geonameId"]) : false;
  



$error = array();




if (!$countryCode) {
    array_push($error, '$countryCode not send');
}
if (!$countryName) {
    array_push($error, '$countryName not send');
}
if (!$currencyCode) {
    array_push($error, '$currencyCode not send');
}
if (!$fipsCode) {
    array_push($error, '$fipsCode not send');
}
if (!$isoNumeric) {
    array_push($error, '$isoNumeric not send');
}
if (!$north) {
    array_push($error, '$north not send');
}
if (!$south) {
    array_push($error, '$south not send');
}
if (!$east) {
    array_push($error, '$east not send');
}
if (!$west) {
    array_push($error, '$west not send');
}
if (!$capital) {
    array_push($error, '$capital not send');
}
if (!$continentName) {
    array_push($error, '$continentName not send');
}
if (!$continent) {
    array_push($error, '$continent not send');
}
if (!$languages) {
    array_push($error, '$languages not send');
}
if (!$isoAlpha3) {
    array_push($error, '$isoAlpha3 not send');
}
if (!$geonameId) {
    array_push($error, '$geonameId not send');
}
  
                


#************************************************************************
// Busca si uya existe el texto en la BD
  

if( countries_search($geonameId)){
    //array_push($error, "That text with that context the database already exists");
}


if (!$error) {
    $lastInsertId = countries_add(
            
            
$countryCode ,  $countryName ,  $currencyCode ,  $fipsCode ,  $isoNumeric ,  $north ,  $south ,  $east ,  $west ,  $capital ,  $continentName ,  $continent ,  $languages ,  $isoAlpha3 ,  $geonameId    


    );
              
    header("Location: index.php?c=countries&a=details&id=$lastInsertId");

    
} else {

    array_push($error, "Check your form");
}

//include "www/countries/views/index.php";   
include view("countries", "index");  
