<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$base_datos = (isset($_POST["base_datos"])) ? clean($_POST["base_datos"]) : false;
$tabla = (isset($_POST["tabla"])) ? clean($_POST["tabla"]) : false;
$campo = (isset($_POST["campo"])) ? clean($_POST["campo"]) : false;
$accion = (isset($_POST["accion"])) ? clean($_POST["accion"]) : false;
$label = (isset($_POST["label"])) ? clean($_POST["label"]) : false;
$tipo = (isset($_POST["tipo"])) ? clean($_POST["tipo"]) : false;
$clase = (isset($_POST["clase"])) ? clean($_POST["clase"]) : false;
$tabla_externa = (isset($_POST["tabla_externa"])) ? clean($_POST["tabla_externa"]) : false;
$columna_externa = (isset($_POST["columna_externa"])) ? clean($_POST["columna_externa"]) : false;
$nombre = (isset($_POST["nombre"])) ? clean($_POST["nombre"]) : false;
$identificador = (isset($_POST["identificador"])) ? clean($_POST["identificador"]) : false;
$marca_agua = (isset($_POST["marca_agua"])) ? clean($_POST["marca_agua"]) : false;
$valor = (isset($_POST["valor"])) ? clean($_POST["valor"]) : false;
$solo_lectura = (isset($_POST["solo_lectura"])) ? clean($_POST["solo_lectura"]) : false;
$obligatorio = (isset($_POST["obligatorio"])) ? clean($_POST["obligatorio"]) : false;
$seleccionado = (isset($_POST["seleccionado"])) ? clean($_POST["seleccionado"]) : false;
$desactivado = (isset($_POST["desactivado"])) ? clean($_POST["desactivado"]) : false;
$orden = (isset($_POST["orden"])) ? clean($_POST["orden"]) : false;
$estatus = (isset($_POST["estatus"])) ? clean($_POST["estatus"]) : false;
  



$error = array();




if (!$base_datos) {
    array_push($error, '$base_datos not send');
}
if (!$tabla) {
    array_push($error, '$tabla not send');
}
if (!$campo) {
    array_push($error, '$campo not send');
}
if (!$accion) {
    array_push($error, '$accion not send');
}
if (!$label) {
    array_push($error, '$label not send');
}
if (!$tipo) {
    array_push($error, '$tipo not send');
}
if (!$clase) {
    array_push($error, '$clase not send');
}
if (!$tabla_externa) {
    array_push($error, '$tabla_externa not send');
}
if (!$columna_externa) {
    array_push($error, '$columna_externa not send');
}
if (!$nombre) {
    array_push($error, '$nombre not send');
}
if (!$identificador) {
    array_push($error, '$identificador not send');
}
if (!$marca_agua) {
    array_push($error, '$marca_agua not send');
}
if (!$valor) {
    array_push($error, '$valor not send');
}
if (!$solo_lectura) {
    array_push($error, '$solo_lectura not send');
}
if (!$obligatorio) {
    array_push($error, '$obligatorio not send');
}
if (!$seleccionado) {
    array_push($error, '$seleccionado not send');
}
if (!$desactivado) {
    array_push($error, '$desactivado not send');
}
if (!$orden) {
    array_push($error, '$orden not send');
}
if (!$estatus) {
    array_push($error, '$estatus not send');
}
  
                


#************************************************************************
// Busca si uya existe el texto en la BD
  

if( magia_search($estatus)){
    //array_push($error, "That text with that context the database already exists");
}


if (!$error) {
    $lastInsertId = magia_add(
            
            
$base_datos ,  $tabla ,  $campo ,  $accion ,  $label ,  $tipo ,  $clase ,  $tabla_externa ,  $columna_externa ,  $nombre ,  $identificador ,  $marca_agua ,  $valor ,  $solo_lectura ,  $obligatorio ,  $seleccionado ,  $desactivado ,  $orden ,  $estatus    


    );
              
    header("Location: index.php?c=magia&a=details&id=$lastInsertId");

    
} else {

    array_push($error, "Check your form");
}

//include "www/magia/views/index.php";   
include view("magia", "index");  
