<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$id    = (isset($_REQUEST["id"]))      ? clean($_REQUEST["id"]) : false;

$error = array();

################################################################################
if (! $c) {
    array_push($error, "Controller Don't send");
}

if (! $a) {
    array_push($error, "Action Don't send");
}
if (! $id) {
    array_push($error, "ID Don't send");
}


################################################################################

if (! invoices_is_id($id)) {
    array_push($error, 'ID format error');
}
################################################################################

if (! invoices_field_id("*", $id)) {
    array_push($error, "id not exist");
}



if (!$error) {
    
    $invoice = invoices_details($id);   
    array_push($invoice, invoice_lines_list_by_invoice_id($id)); 
     
    
    
    
    
    
    include view("invoices", "export");  
    
} else {
   
    include view("home", "pageError");
}
