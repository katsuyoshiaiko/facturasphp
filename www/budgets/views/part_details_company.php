<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">
            <?php _t("Company") ; ?>: <?php echo $budgets['client_id']; ?>            
        </h3>
    </div>
    <?php if ( isset($budgets['client_id']) ) { ?>
    
        <div class="panel-body">
            <ul class="list-group">                            


                <li class="list-group-item">
                    <a href="index.php?c=contacts&a=details&id=<?php echo $budgets['client_id'] ; ?>">
                        <b>
                            <?php echo contacts_formated($budgets['client_id']) ?>
                        </b>                
                    </a>                    
                </li>
                
                
         
                <li class="list-group-item">
                    <b><?php _t("Tva"); ?>: </b>   
                    <?php echo contacts_field_id("tva", $budgets['client_id']); ?>
                </li>
                
                
         
                <li class="list-group-item">
                    <b><?php _t("Discounts"); ?>: </b>   
                    <?php 
                    if(contacts_field_id("discounts", $budgets['client_id'])){
                        echo contacts_field_id("discounts", $budgets['client_id']) . "%"; 
                    }
                    ?>
                </li>
                
                
                
         
                <li class="list-group-item">
                    <b><?php _t("Date"); ?>: </b>   
                   <?php echo $budgets['date']; ?>
                    <?php include view('budgets', 'form_date_update'); ?>                   
                </li>
                
                
                
                
                                                       
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

