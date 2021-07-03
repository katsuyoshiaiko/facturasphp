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
        
        echo "<h3>Type: , Date: , Office: </h3>"; 
        
        
        include "table_contacts.php" ;
        ?>

    </div>
</div>

<?php include view("home" , "footer") ; ?> 




