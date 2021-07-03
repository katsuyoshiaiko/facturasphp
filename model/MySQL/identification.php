<?php

function users_according_login($login) {
    global $db ;
    $req = $db->prepare('SELECT * FROM users WHERE login= ?') ;
    $req->execute(array( $login )) ;
    $data = $req->fetch() ;
    return $data ;
}

function users_according_email($email) {
    global $db ;
    $req = $db->prepare('SELECT id FROM users WHERE email= ?') ;
    $req->execute(array( $email )) ;
    $data = $req->fetch() ;
    return $data ;
}

function users_contact_id_according_email($email) {
    global $db ;
    $req = $db->prepare('SELECT contact_id FROM users WHERE email= ?') ;
    $req->execute(array( $email )) ;
    $data = $req->fetch() ;
    return $data[0] ;
}

function users_according_contact_id($contact_id) {
    global $db ;
    $req = $db->prepare('SELECT id FROM users WHERE contact_id= ?') ;
    $req->execute(array( $contact_id )) ;
    $data = $req->fetch() ;
    return $data ;
}

function users_rol_according_contact_id($contact_id) {
    global $db ;
    $req = $db->prepare('SELECT rol FROM users WHERE contact_id= ?') ;
    $req->execute(array( $contact_id )) ;
    $data = $req->fetch() ;
    return (isset($data[0]))?$data[0]:false ;
}

function users_id_according_login($login) {
    global $db ;
    
    if($login =="" || $login == null || $login == false){
        return false;
    }
    
    
    $req = $db->prepare('SELECT id FROM users WHERE login= ?') ;
    $req->execute(array( $login )) ;
    $data = $req->fetch() ;
    return (isset($data[0])) ? $data[0] : false ;
}

function verifi_login_password($login , $password) {
    
    $user = users_according_login($login) ;

    if ( $user['login'] == $login AND password_verify($password , $user['password']) ) {

        // Registro en la session los diferentes cookies

        $_SESSION['u_id'] = $user['contact_id'] ;
        // si el user cambia de idioma una vez logueado, ya no funcionaria esto 
        // por eso se pone el u_language en index.php
       // $_SESSION['u_language'] = $user['language'] ;
        $_SESSION['u_rol'] = $user['rol'] ;
        $_SESSION['u_login'] = $user['login'] ;
        $_SESSION['u_email'] = $user['email'] ;
        $_SESSION['u_status'] = $user['status'] ;

        return true ;
    } else {
        return false ;
    }
}
