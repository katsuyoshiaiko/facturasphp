<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

//include "www/directory_names/views/add.php";
include view("directory_names", "add");                 
