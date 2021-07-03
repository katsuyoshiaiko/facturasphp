<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}



$users_info = users_list();
//include "www/users/views/index.php";
include view("users", "index");