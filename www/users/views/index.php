<?php include view("home" , "header") ; ?> 

<div class="row">
    <div class="col-lg-3">
        <?php include view("users" , "izq") ?>
    </div>
    <div class="col-lg-9">


        <?php include view("users" , "nav") ?>


        <?php
        if ( $_REQUEST ) {
            foreach ( $error as $key => $value ) {
                message("info" , "$value") ;
            }
        }
        ?>


        <p>
            <?php //message("info", "Users list has access to system"); ?>
        </p>







        <?php include "table_index.php"; ?>
        
        
    </div>
</div>

<?php include view("home" , "footer") ; ?> 