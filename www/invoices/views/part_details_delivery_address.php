 <?php
            if ( $a == "edit" ) {
              //  include view("addresses", "modal_update"); 
                
                include "modal_update_details_delivery_address.php" ;
            }
            ?>

<?php
addresses_show_panel(invoices_field_id("addresses_delivery", $id)); 
?>