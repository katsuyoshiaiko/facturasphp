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

        <h1><?php _t("Stats by Office"); ?></h1>
        <h2><?php _t("Orders"); ?></h2>
            <?php                 
        include "table_invoices.php" ;
        
        echo '<h2>'._tr("Remakes").'</h2>'; 
        include "table_remakes_by_office.php" ;
        
        echo '<h2>'._tr("Remakes motifs").'</h2>'; 
        include "table_remake_motifs.php" ;
        
        
        ?>

    </div>
</div>

<?php include view("home" , "footer") ; ?> 




