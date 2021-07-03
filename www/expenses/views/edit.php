<?php include view("home" , "header") ; ?> 

<div class="row">
    <div class="col-sm-12 col-md-12 col-lg-12">
        <div class="well text-center">
            <h1>
                <?php _t("Expense") ; ?>: 
                    <?php expenses_numberf($id); ?>                                                            
            </h1>
        </div>

        <?php
        if ( $_REQUEST ) {
            foreach ( $error as $key => $value ) {
                message("info" , "$value") ;
            }
        }
        ?>

        <?php         
        include "part_edit.php"; 
        ?>
    </div>
</div>

<?php include view("home" , "footer") ; ?>

