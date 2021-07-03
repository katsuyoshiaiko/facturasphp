<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$art_info = null;

$txt = (isset($_GET['txt'])) ? clean($_GET['txt']) : false;


$error = array();

################################################################################
if (!$txt) {
    array_push($error, "What you looking for?");
}
################################################################################

$art_info = art_search($txt);



include view("contacts", "search_advanced");
