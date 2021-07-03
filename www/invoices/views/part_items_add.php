<div>  
    <ul class="nav nav-tabs" role="tablist">    
        <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab"><?php _t("Individual") ; ?></a></li>    
        <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab"><?php _t("Monthly") ; ?></a></li>        
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
        <?php // Individual ?>
        <?php // Individual ?>
        <?php // Individual ?>
        <?php // Individual ?>
        <?php // Individual ?>        
        <div role="tabpanel" class="tab-pane active" id="home">
            <h2><?php _t("Individual"); ?></h2>
            <table class="table table-striped" >
            <?php   
            include "tabla_items_edit.php";             
            //include "table_form_items_add.php"; 
            include "table_form_items_add_individual.php";
            ?>
        </table>
            
        </div>
        
        
        
        
        <div role="tabpanel" class="tab-pane" id="profile">
            <?php // MENSUAL ?>  
            
            <?php //include "tabla_items_monthly_edit.php" ; ?>
            <?php //include "table_form_items_monthly.php" ; ?>


            <?php if ( $invoices['type'] == null ) { ?>
            
            <h2><?php _t("Monthly invoice"); ?></h2>
                <a class="btn btn-primary" 
                           href="index.php?c=invoices&a=ok_change_type&invoice_id=<?php echo $id ; ?>">
                               <?php _t("Make this invoice a monthly invoice") ; ?>
                        </a>
            <?php }
            ?>



        </div>


    </div>

</div>







