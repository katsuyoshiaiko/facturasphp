<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}


$detail_users = null;

$w = (isset($_GET['w'])) ? clean($_GET['w']) : false;
//$by = (isset($_GET['by'])) ? clean($_GET['by']) : false;
$txt = (isset($_GET['txt'])) ? clean($_GET['txt']) : false;

$txt = "%$txt%";



switch ($w) {
    case 'blocked': //-1
        $users_info = users_list_by_status(USER_BLOCKED);
        break;
    
    case 'waiting': //0
        $users_info = users_list_by_status(USER_WAITING);
        break;
    
    case 'online': //0
        $users_info = users_list_by_status(USER_ONLINE);
        break;
    
    
    case 'by_rol':
        $rol = (isset($_GET['rol'])) ? clean($_GET['rol']) : false;
        $users_info = users_list_by_rol($rol);
        break;
    
    
    case 'all':
        $users_info = users_list_by_all($txt);
        break;
    

    default:
        $users_info = users_list();
        break;
}


include view("users", "index");
