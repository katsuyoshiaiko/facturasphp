<?php include view("home" , "header") ; ?> 

<?php include "nav_details.php" ; ?>

<div class="row">
    <div class="col-sm-8 col-md-8 col-lg-8">

        <div class="well text-center">
            <h1>
                <?php _t("Invoice") ; ?>:<?php invoices_numberf($id) ; ?>    
            </h1>
        </div>

        <?php
        if ( $_REQUEST ) {
            foreach ( $error as $key => $value ) {
                message("info" , "$value") ;
            }
        }
        ?>

        <?php include "page_details.php" ; ?>

    </div>
    <div class="col-sm-4 col-md-4 col-lg-4">
        <?php include "der.php" ; ?> 
    </div>
</div>


<?php include view("home" , "footer") ; ?>