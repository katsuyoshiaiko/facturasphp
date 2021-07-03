<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$modules = (isset($_POST["module"])) ? clean($_POST["module"]) : false;

$option = "employees"; 

$error = array();
//
################################################################################
// verifica la existencia 
if (!$id) {
   // array_push($error, "ID Don't send");
}

################################################################################
// Verifico la exisencia de cada uno de los modulos 
if (!_options_is_id($id)) {
  //  array_push($error, "ID format error");
}
//
################################################################################
if (!$error) {

    _options_update($option, 1); 
    
    header("Location: index.php?c=config");
}

//$_options = _options_details($id);

//include view("_options", "index");
