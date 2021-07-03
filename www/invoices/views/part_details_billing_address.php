<?php

if ($a == "edit") {
    include "modal_update_details_billing_address.php";
}

addresses_show_panel(invoices_field_id("addresses_billing", $id));
?>

