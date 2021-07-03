<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$home_page = (isset($_REQUEST["home_page"])) ? clean($_REQUEST["home_page"]) : false;

$error = array();


if (!$home_page) {
    array_push($error, "page not send");
}


################################################################################
if (!$error) {


//    config_home_page_update($home_page);
    // si no existe esa opcion la agregamos 
    if (!_options_option("home_page")) {

        _options_add("home_page", $home_page, 1000);
        
    } else {
        
        //config_option_data_update("home_page", $home_page);
        _options_update('home_page', $home_page); 
        
    }





    header("Location: index.php?c=config&a=home_page&sms=1");
} else {
    include view('home', 'pageError');
}

    