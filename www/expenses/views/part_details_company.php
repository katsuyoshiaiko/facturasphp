<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">
            <?php _t("Company") ; ?>: <?php echo $expenses['client_id']; ?>
            


        </h3>
    </div>
    <?php if ( isset($expenses['client_id']) ) { ?>
    
        <div class="panel-body">
            <ul class="list-group">                            


                <li class="list-group-item">
                    <a href="index.php?c=contacts&a=details&id=<?php echo $expenses['client_id'] ; ?>">
                        <b>
                            <?php echo contacts_formated($expenses['client_id']) ?>
                        </b>                
                    </a>                    
                </li>
                
                
         
                <li class="list-group-item">
                    <b><?php _t("Tva"); ?>: </b>   
                    <?php echo contacts_field_id("tva", $expenses['client_id']); ?>
                </li>
                
                <li class="list-group-item">
                    <b><?php _t("Pay beford"); ?>: </b>   
                    <?php echo $expenses['date']; ?>
                </li>
                
                
                
                
                <li class="list-group-item"><?php //echo "$addresses_billing[number], $addresses_billing[address] " ?></li>
                                                       
            </ul>
        </div>
    <?php } else { ?>
        <div class="panel-body">
            <?php message("info" , "This budget has no recipient, add one") ?>

            <?php
            if ( $a == "edit" ) {
               // include "modal_update_details_billing_address.php" ;
            }
            ?>

        </div>

    <?php } ?>


</div>

