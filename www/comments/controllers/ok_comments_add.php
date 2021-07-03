<?php

if ( ! permissions_has_permission($u_rol , "comments" , "create") ) {
    header("Location: index.php?c=home&a=no_access") ;
    die("Error has permission ") ;
}


$date = null ;
$sender_id = $u_id; 
$doc = (isset($_POST['doc'])) ? clean($_POST['doc']) : false ;
$doc_id = (isset($_POST['doc_id'])) ? clean($_POST['doc_id']) : false ;
$comment = (isset($_POST['comment'])) ? clean($_POST['comment']) : false ;
$order_by = 0 ;
$status = 1 ;

$error = array() ;

################################################################################

if ( ! $sender_id ) {
    array_push($error , '$sender_id dont send') ;
}
if ( ! $doc ) {
    array_push($error , '$doc dont send') ;
}
if ( ! $doc_id ) {
    array_push($error , '$doc_id dont send') ;
}
if ( ! $comment ) {
    array_push($error , '$comment dont send') ;
}

if ( ! $error ) {

    comments_add(
            $date , $sender_id , $doc , $doc_id , $comment , $order_by , $status
    ) ;
    
    
    
    
        ############################################################################
        ############################################################################
        ############################################################################
        $id = $doc_id ;

        $level = null ;
        $date = null ;
        //$u_id
        //$u_rol , 
        //$c , $a , 
        $w = null ;
        $description = "Add comments doc: $doc, id= $doc_id" ;
        $doc_id = $doc_id ;
        $crud = "create" ;
        $error = null ;
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
        ############################################################################
        ############################################################################ 
        
        
        
        

    header("Location: index.php?c=$doc&a=details&id=$doc_id#comments") ;
} else {    
    array_push($error , "Check your form") ;
}


include view("home", "pageError"); 


