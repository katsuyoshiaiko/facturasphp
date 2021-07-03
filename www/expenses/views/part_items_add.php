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
            <?php include "tabla_items_edit.php" ; ?>
            <?php include "table_form_items_add.php" ; ?>
        </div>
        
        
        
        
        <div role="tabpanel" class="tab-pane" id="profile">
            <?php // MENSUAL ?>  
            <?php // MENSUAL ?>  
            <?php // MENSUAL ?>  
            <?php // MENSUAL ?>  
            <?php // MENSUAL ?>             
            <?php include "tabla_items_monthly_edit.php" ; ?>
            <?php include "table_form_items_monthly.php" ; ?>


            <?php if ( $expenses['type'] == null ) { ?>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <?php _t("Monthly expense") ; ?>
                    </div>
                    <div class="panel-body">
                        <?php echo "" ; ?>
                        <a class="btn btn-primary" 
                           href="index.php?c=expenses&a=ok_change_type&expense_id=<?php echo $id ; ?>">
                               <?php _t("Make this expense a monthly expense") ; ?>
                        </a>
                    </div>
                </div>
            <?php }
            ?>



        </div>


    </div>

</div>







