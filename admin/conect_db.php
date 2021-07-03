<?php

$pc = $_SERVER['SERVER_NAME'];

switch ($pc) {
    case 'localhost':
        include "config_localhost.php";
        break;

    default:
        break;
}
try {

    $options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');

    $db = new PDO("mysql:host=$config_server;dbname=$config_db", "$config_login", "$config_pass", $options);
} catch (Exception $e) {
    die($pc . ' please go to: <h1>admin/connection_db.php</h1><p>And config the data base info</p> error: ');
}
