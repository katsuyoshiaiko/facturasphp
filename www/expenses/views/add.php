<?php include view("home" , "header") ; ?>  

<div class="row">
    <div class="col-lg-8">
        <?php // include view("expenses", "izq"); ?>
        
        
                <embed 
            src="pdf.pdf" 
            type="application/pdf" 
            width="100%" 
            height="600px" />
                
                
                
    </div>

    <div class="col-lg-4">
        
        <hr>
        <?php //include view("expenses", "nav"); ?><?php //_t("Extended"); ?>


        <?php
        if ( $_REQUEST ) {
            foreach ( $error as $key => $value ) {
                message("info" , "$value") ;
            }
        }
        ?>

        
        <p>Pais</p>        
        <p>Tipo de documento; invocie, rappel, med</p>        
        <p>Idioma del documento</p>
        <p>Soporte: pdf, scan image, etc</p>
        

        
        
        
        <p>Company details</p>
        <p>Company Bank details</p>
        <p>Client details</p>
        <p>Client addreses delivery</p>
        <p>Client addreses billing</p>
        
        <p>Invoices details</p>
        <p>Items details</p>
        
        
        <h1><?php _t("New expense") ; ?></h1>

        <?php include "form_ocr_company_add.php" ; ?>
        <?php include "form_ocr_company_bank_add.php" ; ?>
        <?php include "form_ocr_client_details.php" ; ?>
        <?php include "form_ocr_client_addreses_delivery.php" ; ?>
        <?php include "form_ocr_client_addreses_billing.php" ; ?>
        <?php include "form_ocr_invoices_details.php" ; ?>
        <?php include "form_ocr_invoice_items_details.php" ; ?>

        <div class="col-lg-3">
            
    
            
            
            <?php //include view("expenses", "der"); ?>
        </div>

    </div>
</div>

<?php include view("home" , "footer") ; ?> 

