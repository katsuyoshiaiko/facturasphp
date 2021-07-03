<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$id = (isset($_REQUEST['id'])) ? clean($_REQUEST['id']) : false;
$e = (isset($_REQUEST['e'])) ? clean($_REQUEST['e']) : false;

$error = array();

if (!$id) {
    array_push($error, 'id dont send');
}

if (!is_id($id)) {
    array_push($error, 'id format error send');
}


if ($e) {
    array_push($error, "$e");
}

$contact = contacts_details($id);

if (!$contact) {
    array_push($error, "contact not exist");
}

################################################################################
if (!$error) {

    // include view("contacts" , "page_details") ;
// El controlador escoje que presentar para  solo editar aca las companias
    if ($contact['type'] == 1) {
        include view("contacts", "page_details_company");
    } else {
        include view("contacts", "page_details_contacts");
    }
} else {

    include view("home" , "pageError") ;
}
