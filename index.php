<?php

//header("Location: um.php"); // esto es pra ponerlo en under mantenance
// para los erroes ir a la configuracion de la base de datos 
// en ese fichero esta la opcion 
session_cache_expire(21600); //6 horas * 60 * 60 total en segundos
session_start();
//header('Content-type: text/html; charset=UTF-8');
//require __DIR__ . "/admin/conect_db.php" ;
require "admin/conect_db.php";
require "admin/functions.php";
require "admin/errores.php";
require "admin/form.php";
require "admin/translater.php";
require "admin/messages.php";
require "admin/modal.php";
require "admin/magia_dates.php";
require "admin/meses.php";
require "admin/models.php";
require "admin/field_validation.php";
require 'admin/filesUpdate.php';
require "admin/countries.php";
require "admin/views.php";
require "admin/controllers.php";
require "admin/communicacion_extructurada.php";
//****************************
require "model/MySQL/directory.php";
require "model/MySQL/identification.php";
require "model/MySQL/logs_list.php";
require "model/MySQL/my_addresses.php";
require "model/MySQL/my_purchases.php";
require "model/MySQL/permissions.php";
require "model/MySQL/_menus.php";
require "model/MySQL/rols.php";
//******************************************************************************
require "admin/mensajes.php";
//
require "includes/parsedown-master/Parsedown.php";
//require "includes/PHPMailer-master/PHPMailer.php" ;
include "includes/PHPMailer/src/PHPMailer.php";
include "includes/PHPMailer/src/SMTP.php";
include "includes/PHPMailer/src/Exception.php";
//
//QR CODE
//require "includes/phpqrcode/qrlib.php";
//***************************
$directory = 'www';
$scanned_directory = array_diff(scandir($directory), array('..', '.', '.*'));
foreach ($scanned_directory as $archivo) {
    if (is_dir("www/$archivo")) {
        require "www/$archivo/functions.php";
    }
}
###############################################################################
## Extended
###############################################################################
$directory = "www_extended/$config_theme";
$scanned_directory = array_diff(scandir($directory), array('..', '.', '.*'));
foreach ($scanned_directory as $archivo) {
    if (is_dir("www_extended/$config_theme/$archivo")) {
        require "www_extended/$config_theme/$archivo/functions.php";
    }
}
// LO QUE SIGUE
// SI SE CAMBIA EL ORDEN NO VALE
require "admin/config.php";
//
$u_rol = ( isset($_SESSION['u_rol']) ) ? $_SESSION['u_rol'] : false;
$u_id = ( isset($_SESSION['u_id']) ) ? $_SESSION['u_id'] : false;
//
$u_language = users_field_contact_id('language', $u_id);
$u_owner_id = contacts_field_id("owner_id", $u_id);
################################################################################
$smst = (isset($_REQUEST['smst'])) ? clean($_REQUEST['smst']) : false;
$smsm = (isset($_REQUEST['smsm'])) ? clean($_REQUEST['smsm']) : false;
//
$page = ( isset($_GET['page']) && !empty($_GET['page']) ) ? (int) strip_tags($_GET['page']) : 1;
//
$c = (isset($_REQUEST['c'])) ? $_REQUEST['c'] : "home";
$a = (isset($_REQUEST['a'])) ? $_REQUEST['a'] : "index";
//
$u_controller = $c;

$error = array();
$mensajes = array();

//// si es puerto 80

if (
        $_SERVER['SERVER_PORT'] == 80 && ( $_SERVER['SERVER_NAME'] != "localhost" && $_SERVER['SERVER_NAME'] != "0.0.0.0" && $_SERVER['SERVER_NAME'] != "127.0.0.1" )
) {
    echo ' <meta http-equiv="refresh" content="0; URL=https://' . $_SERVER['SERVER_NAME'] . '"> ';
}


if (file_exists("./www_extended/" . $config_theme . "/$c/controllers/$a.php")) {
    include "./www_extended/" . $config_theme . "/$c/controllers/$a.php";
} elseif (file_exists("./www/$c/controllers/$a.php")) {
    include "./www/$c/controllers/$a.php";
} else {
    include "./www/home/views/error.php";
}
