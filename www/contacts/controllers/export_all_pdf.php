<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
$error = array();
$contacts = null;
// pongo tipo 1 ya que asi sea u particular se crea un empresa a su nombre
// osea tipo 1
//$contacts = contacts_list_by_type(1);
$contacts = contacts_list();
    

include view("contacts", "export_all_pdf");      
if ($debug) {
    include "www/contacts/views/debug.php";
}