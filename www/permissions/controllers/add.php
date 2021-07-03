<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

//include "www/permissions/views/add.php";

$rol = (isset($_GET["rol"])) ? clean($_GET["rol"]) : false ;


include view("permissions", "add");                 
