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

        <h1><?php _t("Reasons for the remake"); ?></h1>
        <?php 
        
      //  echo "<h3>Type: , Date: , Office: </h3>"; 
        
        
        include "table_remake_motifs.php" ;
        ?>

    </div>
</div>

<?php include view("home" , "footer") ; ?> 




