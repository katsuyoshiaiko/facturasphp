<?php
/**
 * Agrega un submodulo a un modulo 
 * 
 */
if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$module = (isset($_REQUEST["module"])) ? clean($_REQUEST["module"]) : false;
$sm = (isset($_REQUEST["sm"])) ? clean($_REQUEST["sm"]) : false;
$id = (isset($_REQUEST["id"])) ? clean($_REQUEST["id"]) : false;

$error = array();






################################################################################
################################################################################
################################################################################
################################################################################


// lista de sub_modulos de un modulo, 
$sm_list = modules_search_sub_modules_by_module($module); 

// agrego al final el sub_modulo, 
$new_sm = $sm_list . ", " . $sm ; 

// actualizo los sub_modulos en la DB


################################################################################

if (!$error) {
    
    
   // modules_add($name, $sub_modules, $description, $author, $author_email, $url, $version, $order_by, $status); 
    
    modules_update_sub_modules_by_module($id, $module, $new_sm); 
    
    
    
    
    header("Location: index.php?c=modules&a=details&id=$id") ;
    
    
    
} else {
    array_push($error, "Check your form");
    
     include view("home", "pageError");      
}

