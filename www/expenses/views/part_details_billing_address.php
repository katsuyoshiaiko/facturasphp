<?php

if ( $a == "edit" ) {


    include "modal_update_details_billing_address.php" ;
}
?>
<?php
addresses_show_panel(expenses_field_id("addresses_billing" , $id)) ;
?>


