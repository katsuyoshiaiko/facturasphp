<?php include view("home" , "header") ; ?>  

<div class="row">
    <div class="col-lg-3">
        <?php  include "izq.php"; ; ?>
    </div>

    <div class="col-lg-9">
        <?php include "nav.php"; ?>


        <?php
        if ( $_REQUEST ) {
            foreach ( $error as $key => $value ) {
                message("info" , "$value") ;
            }
        }
        ?>







            <?php include "table_index.php" ; ?>

           

       
        
        



    </div>
</div>

<?php include view("home" , "footer") ; ?> 




