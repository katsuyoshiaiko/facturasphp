 <?php
            if ( $a == "edit" ) {

                
                include "modal_update_details_delivery_address.php" ;
            }
            ?>

<?php
addresses_show_panel(expenses_field_id("addresses_delivery", $id)); 
?>