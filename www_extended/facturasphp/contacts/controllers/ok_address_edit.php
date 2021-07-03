<?php

if ( ! permissions_has_permission($u_rol , "addresses" , "update") ) {
    header("Location: index.php?c=home&a=no_access") ;
    die("Error has permission ") ;
}




$id = (isset($_POST['id'])) ? clean($_POST['id']) : false ;
$contact_id = (isset($_POST['contact_id'])) ? clean($_POST['contact_id']) : false ;
$name = (isset($_POST['name'])) ? clean($_POST['name']) : false ;
$address = (isset($_POST['address'])) ? clean($_POST['address']) : false ;
$number = (isset($_POST['number'])) ? clean($_POST['number']) : false ;
$postcode = (isset($_POST['postcode'])) ? clean($_POST['postcode']) : false ;
$barrio = (isset($_POST['barrio'])) ? clean($_POST['barrio']) : null ;
$city = (isset($_POST['city'])) ? clean($_POST['city']) : false ;
$region = (isset($_POST['region'])) ? clean($_POST['region']) : "null" ;
$country = (isset($_POST['country'])) ? clean($_POST['country']) : false ;
$status = (isset($_POST['status'])) ? clean($_POST['status']) : 1 ;
$redirection = (isset($_POST['redirection'])) ? clean($_POST['redirection']) : false ;
$transport_code = (isset($_POST['transport_code'])) ? clean($_POST['transport_code']) : false ;

$error = array() ;




if ( ! $contact_id ) {
    array_push($error , "contact_id not send") ;
}
if ( ! $name ) {
    array_push($error , "name not send") ;
}




if ( ! $error ) {

    addresses_edit(
            $id , $contact_id , $name , $address , $number , $postcode , $barrio , $city , $region , $country , $status
    ) ;

    
                
                
    ############################################################################
    $data = json_encode(array(
        $id , $contact_id , $name , $address , $number , $postcode , $barrio , $city , $region , $country , $status
            )) ;
    $error = json_encode($error) ;
    $level = 0 ; // 1 atention, 2 medio, 3 critico, 4 fatal
    $date = null ;
    //$u_id
    //$u_rol , 
   // $c = "contacts" ;
    //$a = "Change order status" ;
    $w = null ;
    // $txt
    $description = "Update addresses id [$id] " ;
    $doc_id = $id ;
    $crud = "update" ;
    //$error = null ;
    $val_get = ( isset($_GET) ) ? json_encode($_GET) : null ;
    $val_post = ( isset($_POST) ) ? json_encode($_POST) : null ;
    $val_request = ( isset($_REQUEST) ) ? json_encode($_REQUEST) : null ;
    $ip4 = get_user_ip() ;
    $ip6 = get_user_ip6() ;
    $broswer = json_encode(get_user_browser()) ; //https://www.php.net/manual/es/function.get-browser.php
    logs_add(
            $level , $date , $u_id , $u_rol , $c , $a , $w ,
            $description , $doc_id , $crud , $error ,
            $val_get , $val_post , $val_request , $ip4 , $ip6 , $broswer
    ) ;
    ############################################################################ 
    
    

    // si hay sistema de transporte lo actualizamos sino lo agregamos 
    if ( addresses_transport_search_by_addresses_id($id) ) {
        addresses_transport_update($id , $transport_code) ;
        
                
    ############################################################################
    $data = json_encode(array(
        $id , $transport_code
            )) ;
    $error = json_encode($error) ;
    $level = 0 ; // 1 atention, 2 medio, 3 critico, 4 fatal
    $date = null ;
    //$u_id
    //$u_rol , 
   // $c = "contacts" ;
    //$a = "Change order status" ;
    $w = null ;
    // $txt
    $description = "Update to transport [$transport_code] addresse id [$id] " ;
    $doc_id = $id ;
    $crud = "update" ;
    //$error = null ;
    $val_get = ( isset($_GET) ) ? json_encode($_GET) : null ;
    $val_post = ( isset($_POST) ) ? json_encode($_POST) : null ;
    $val_request = ( isset($_REQUEST) ) ? json_encode($_REQUEST) : null ;
    $ip4 = get_user_ip() ;
    $ip6 = get_user_ip6() ;
    $broswer = json_encode(get_user_browser()) ; //https://www.php.net/manual/es/function.get-browser.php
    logs_add(
            $level , $date , $u_id , $u_rol , $c , $a , $w ,
            $description , $doc_id , $crud , $error ,
            $val_get , $val_post , $val_request , $ip4 , $ip6 , $broswer
    ) ;
    ############################################################################ 
            
        
        
    } else {
        addresses_transport_add($id , $transport_code); 

                
    ############################################################################
    $data = json_encode(array(
        $id , $transport_code
            )) ;
    $error = json_encode($error) ;
    $level = 0 ; // 1 atention, 2 medio, 3 critico, 4 fatal
    $date = null ;
    //$u_id
    //$u_rol , 
   // $c = "contacts" ;
    //$a = "Change order status" ;
    $w = null ;
    // $txt
    $description = "Add transport [$transport_code] to addresse id [$id] " ;
    $doc_id = $id ;
    $crud = "update" ;
    //$error = null ;
    $val_get = ( isset($_GET) ) ? json_encode($_GET) : null ;
    $val_post = ( isset($_POST) ) ? json_encode($_POST) : null ;
    $val_request = ( isset($_REQUEST) ) ? json_encode($_REQUEST) : null ;
    $ip4 = get_user_ip() ;
    $ip6 = get_user_ip6() ;
    $broswer = json_encode(get_user_browser()) ; //https://www.php.net/manual/es/function.get-browser.php
    logs_add(
            $level , $date , $u_id , $u_rol , $c , $a , $w ,
            $description , $doc_id , $crud , $error ,
            $val_get , $val_post , $val_request , $ip4 , $ip6 , $broswer
    ) ;
    ############################################################################         
        
    }







    header("Location: index.php?c=contacts&a=addresses&id=$contact_id") ;
} else {

    array_push($error , "Check your form") ;
}

include view("contacts" , "index") ;
