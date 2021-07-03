<?php

if ( ! permissions_has_permission($u_rol , $c , "create") ) {
    header("Location: index.php?c=home&a=no_access") ;
    die("Error has permission ") ;
}

$credit_note_id = (isset($_POST["credit_note_id"])) ? clean($_POST["credit_note_id"]) : false ;
$comments = (($_POST["comments"]) != "") ? clean($_POST["comments"]) : '-' ;
$error = array() ;




if ( ! $credit_note_id ) {
    array_push($error , '$credit_note_id not send') ;
}



if ( ! $error ) {
    credit_notes_comments_update(
            $credit_note_id , $comments
    ) ;

    header("Location: index.php?c=credit_notes&a=edit&id=$credit_note_id") ;
} else {

    include view("home" , "pageError") ;
}
