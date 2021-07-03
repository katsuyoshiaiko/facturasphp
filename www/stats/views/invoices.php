<?php include view("home" , "header") ; ?>  

<div class="row">
    <div class="col-lg-3">
        <?php include view("stats" , "izq") ; ?>
    </div>

    <div class="col-lg-9">

        <?php include "nav.php" ; ?>

        <?php
        if ( $_REQUEST ) {
            foreach ( $error as $key => $value ) {
                message("info" , "$value") ;
            }
        }
        ?>

        <?php 
        echo "<h3>Type: $s , Date: $date , Office: $office_id </h3>"; 
        
        include "table_invoices.php" ;
        ?>

    </div>
</div>

<?php include view("home" , "footer") ; ?> 




