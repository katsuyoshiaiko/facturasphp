<?php

if (!permissions_has_permission($u_rol, "logs", "read")) {
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

$logs = logs_list_by_contact_id($id);



if (users_field_contact_id('rol', $id) == 'root' && users_field_contact_id('rol', $u_id) != 'root') {
    array_push($error, 'Root is hidden');
}

#################################################################################
#################################################################################
#################################################################################
#################################################################################
if (!$error) {

    include view("contacts", "page_logs");
} else {

    include view('home', 'pageError');
}





