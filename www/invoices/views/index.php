<?php include view("home" , "header") ; ?>  

<div class="row">
    <div class="col-md-3 col-lg-3">
        <?php include view("invoices" , "izq") ; ?>
    </div>

    <div class="col-md-9 col-lg-9">

        <?php include view("invoices" , "nav") ; ?>

        <?php // _t("Extended") ; ?>


        <?php
        if ( $_REQUEST ) {
            foreach ( $error as $key => $value ) {
                message("info" , "$value") ;
            }
        }
        ?>



        <?php
        
// https://api.jquery.com/prop/
        //  echo "Registrads por typo<br>"; 
        //  vardump(count(invoices_search_registre_by_type("M"))); 
        // si no hay una factura de este tipo el contacto deseado se abre una 
        ?>

        <?php include "table_index.php" ; ?>

        <?php
        pagination("index.php?c=$c" , $totalItems , $itemsByPage , $page) ;

        /*
          Export:
          <a href="index.php?c=addresses&a=export_json">JSON</a>
          <a href="index.php?c=addresses&a=export_pdf">pdf</a>
         */
        ?>


    </div>
</div>

<?php include view("home" , "footer") ; ?> 




