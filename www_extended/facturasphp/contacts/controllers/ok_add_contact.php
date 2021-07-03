<?php

if ( ! permissions_has_permission($u_rol , "contacts" , "create") ) {
    header("Location: index.php?c=home&a=no_access") ;
    die("Error has permission ") ;
}


$type = 0 ;
//$type = (isset($_POST['type'])) ? clean($_POST['type']) : false;
$owner_id = (isset($_POST['owner_id'])) ? clean($_POST['owner_id']) : _options_option("default_id_company") ;
//
$title = ( $_POST['title'] != '' ) ? clean($_POST['title']) : null ;
$name = (isset($_POST['name'])) ? clean($_POST['name']) : false ;
$lastname = (isset($_POST['lastname'])) ? clean($_POST['lastname']) : false ;
$is_patient = ( isset($_POST['is_patient']) && $_POST['is_patient'] != '') ? true : false ;




$year = (isset($_POST['year'])) ? clean($_POST['year']) : false ;
$month = (isset($_POST['month'])) ? clean($_POST['month']) : false ;
$day = (isset($_POST['day'])) ? clean($_POST['day']) : false ;
$birthday = "$year-$month-$day" ;
//$status = (isset($_POST['status'])) ? clean($_POST['status']) : false;
$status = 1 ;
$order_by = 0 ;
$tva = null ;
$code = uniqid() ;


$error = array() ;

################################################################################

if ( ! $name ) {
    array_push($error , "Name not send") ;
}

if ( ! $owner_id ) {
    array_push($error , "owner_id ($owner_id) not send") ;
}

if ( contacts_search_name_lastname_birthdate($owner_id , $name , $lastname , $birthday) ) {
    array_push($error , "This contact already exists") ;
}
######################################################################################

if ( ! $error ) {

    contacts_add(
            $owner_id , $type , $title , $name , $lastname , $birthdate , $tva , $code , $order_by , $status
    ) ;

    $lastInsertId = contacts_field_code(id , $code) ;



    if ( $is_patient ) {
        $lastPatientId = patients_add($owner_id , '' , $lastInsertId , null , 0 , 1) ;
    }





    header("Location: index.php?c=contacts&a=contacts&id=$owner_id") ;
} else {

    array_push($error , "Check your form") ;
}

include view("home" , "pageError") ;




