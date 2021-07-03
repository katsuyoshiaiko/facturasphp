<?php
if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
// Recolection vars


$id = (isset($_POST["id"])) ? clean($_POST["id"]) : false;
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
//
################################################################################
if (! $c) {
    array_push($error, "Controller Don't send");
}
//
if (! $a) {
    array_push($error, "Action Don't send");
}
//
if (! $id) {
    array_push($error, "ID Don't send");
}
//
if (! $text) {
   // array_push($error, "Text Don't send");
}
//
################################################################################

if (! magia_is_id($id)) {
    array_push($error, "ID format error");
}
//
################################################################################
if (! $error ) {
    
    magia_edit(
        


$id ,  $base_datos ,  $tabla ,  $campo ,  $accion ,  $label ,  $tipo ,  $clase ,  $tabla_externa ,  $columna_externa ,  $nombre ,  $identificador ,  $marca_agua ,  $valor ,  $solo_lectura ,  $obligatorio ,  $seleccionado ,  $desactivado ,  $orden ,  $estatus    



                
        );
        header("Location: index.php?c=magia&a=details&id=$id");
          
}

$magia = magia_details($id);
    
include view("magia", "index");  
