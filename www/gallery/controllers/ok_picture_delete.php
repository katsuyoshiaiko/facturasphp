<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$file = (!empty($_POST['filename']) ) ? $_POST['filename'] : false;
$redi = (!empty($_POST['redi'])) ? clean($_POST['redi']) : false;
$item = (!empty($_POST['item'])) ? clean($_POST['item']) : false;
$item_id = (!empty($_POST['item_id'])) ? clean($_POST['item_id']) : false;

$error = array();

################################################################################
################################################################################



if (!$error) {


    gallery_image_delete($file);




//    ############################################################################
//    $data = json_encode(array(
//        $fileNameToDB
//            ));
//    $error = json_encode($error);
//    $level = 0; // 1 atention, 2 medio, 3 critico, 4 fatal
//    $date = null;
//    //$u_id
//    //$u_rol , 
//    //$c = "orders" ;
//    //$a = "Change order status" ;
//    $w = null;
//    // $txt
//    $description = "Update logo [$data]";
//    $doc_id = $u_id;
//    $crud = "update";
//    //$error = null ;
//    $val_get = ( isset($_GET) ) ? json_encode($_GET) : null;
//    $val_post = ( isset($_REQUEST) ) ? json_encode($_REQUEST) : null;
//    $val_request = ( isset($_REQUEST) ) ? json_encode($_REQUEST) : null;
//    $ip4 = get_user_ip();
//    $ip6 = get_user_ip6();
//    $broswer = json_encode(get_user_browser()); //https://www.php.net/manual/es/function.get-browser.php
//    logs_add(
//            $level, $date, $u_id, $u_rol, $c, $a, $w,
//            $description, $doc_id, $crud, $error,
//            $val_get, $val_post, $val_request, $ip4, $ip6, $broswer
//    );
//    ############################################################################     
    
    
    switch ($redi) {
        case 1:
            header("Location: index.php?c=$item&a=edit&id=$item_id");

            break;

        default:
            header("Location: index.php");
            break;
    }
    
    
    
} else {
    include view("home", "pageError");
    ############################################################################
    # DEbe ir al final qye que sino la vaiable $error se redefine###############
    ############################################################################
    $data = json_encode(
            $_REQUEST
    );
    $error = json_encode($error);
    $level = 0; // 1 atention, 2 medio, 3 critico, 4 fatal
    $date = null;
    //$u_id
    //$u_rol , 
    //$c = "orders" ;
    //$a = "Change order status" ;
    $w = null;
    // $txt
    $description = "Error: Update logo [$data]";
    $doc_id = $u_id;
    $crud = "update";
    //$error = null ;
    $val_get = ( isset($_GET) ) ? json_encode($_GET) : null;
    $val_post = ( isset($_POST) ) ? json_encode($_POST) : null;
    $val_request = ( isset($_REQUEST) ) ? json_encode($_REQUEST) : null;
    $ip4 = get_user_ip();
    $ip6 = get_user_ip6();
    $broswer = json_encode(get_user_browser()); //https://www.php.net/manual/es/function.get-browser.php
    logs_add(
            $level, $date, $u_id, $u_rol, $c, $a, $w,
            $description, $doc_id, $crud, $error,
            $val_get, $val_post, $val_request, $ip4, $ip6, $broswer
    );
    ############################################################################ 
}
