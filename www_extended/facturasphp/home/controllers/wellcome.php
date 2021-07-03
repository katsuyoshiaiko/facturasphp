<?php

if (!$_SESSION) {
    header("Location: index.php?c=home");
}

$smst = (isset($_REQUEST['smst'])) ? clean($_REQUEST['smst']) : false;
$smsm = (isset($_REQUEST['smsm'])) ? clean($_REQUEST['smsm']) : false;

if (permissions_has_permission($u_rol, "shop", "read")) {
    header("Location: index.php?c=shop");
} else {

    // opcion de la base de datos
    $home_page = (
            _options_option("home_page")
            ) ?
            _options_option("home_page") :
            "index";

    if (permissions_has_permission($u_rol, $home_page, "read")) {
        header("Location: index.php?c=$home_page");
    }

    // por defecto, todo usuario deberia tener acceso a contactos
    header("Location: index.php?c=$home_page");
}

