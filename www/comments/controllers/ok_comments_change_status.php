<?php

if ( ! permissions_has_permission($u_rol , "comments" , "create") ) {
    header("Location: index.php?c=home&a=no_access") ;
    die("Error has permission ") ;
}

$id    = (isset($_GET["id"]))         ? clean($_GET["id"]) : false;
$new_status = -1; // delete


$error = array();
################################################################################
if (! $id) {
    array_push($error, "ID Don't send");
}


if( $u_id !== comments_field_id("sender_id", $id) ){
    array_push($error, 'This comments is not yours');
}

if (! comments_is_id($id)) {
    array_push($error, 'Id format error');
}
################################################################################

if ( ! $error ) {
    // Borramos, mejor dicho cambiamos el comentario a -1
    comments_change_status($id, $new_status); 
    
    
    
        ############################################################################
        ############################################################################
        ############################################################################
        $id = $id ;

        $level = null ;
        $date = null ;
        //$u_id
        //$u_rol , 
        //$c , $a , 
        $w = null ;
        $description = "Delete comment : id= $id" ;
        $doc_id = $id ;
        $crud = "delete" ;
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


