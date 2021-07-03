<?php

if ( ! permissions_has_permission($u_rol , $c , "update") ) {
    header("Location: index.php?c=home&a=no_access") ;
    die("Error has permission ") ;
}



$id = (isset($_POST["id"])) ? clean($_POST["id"]) : false ;
$rol = (isset($_POST["rol"])) ? clean($_POST["rol"]) : false ;
$controller = (isset($_POST["controller"])) ? clean($_POST["controller"]) : false ;
$crud = (isset($_POST["crud"])) ? clean($_POST["crud"]) : false ;


$error = array() ;
//
################################################################################
//
if ( ! $id ) {
    array_push($error , "ID Don't send") ;
}
//
//if ( ! $text ) {
//    // array_push($error, "Text Don't send");
//}
//
################################################################################

if ( $rol == 'root' && $crud != '1111' ) {
    array_push($error , "Very sad that you don't want to give 1111 to root") ;
}

if ( $rol == 'root' && $controller == 'shop' ) {
    array_push($error , "Controller shop is not for root") ;
}

if ( $rol != 'root' && $crud == '1111'  ) {
    array_push($error , "Crud (1111), delete option only root please") ;
}


if ( rols_rango_by_rol($u_rol) < rols_rango_by_rol($rol) ) {
    array_push($error , "You cannot edit a user with a higher rank") ;
}



if ( ! permissions_is_id($id) ) {
    array_push($error , "ID format error") ;
}
//
################################################################################
if ( ! $error ) {

    permissions_edit(
            $id , $rol , $controller , $crud
    ) ;
    //header("Location: index.php?c=permissions&a=details&id=$id") ;
    header("Location: index.php?c=permissions") ;
}

//$permissions = permissions_details($id) ;

include view("home" , "pageError") ;
