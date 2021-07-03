<?php include view("home" , "header") ; ?>  

<div class="row">
    <div class="col-lg-12">
        <?php // include view("expenses", "izq"); ?>


        <embed 
            src="pdf.pdf" 
            type="application/pdf" 
            width="100%" 
            height="600px" />



    </div>

    <div class="col-lg-12">

        <hr>
        <?php //include view("expenses", "nav"); ?><?php //_t("Extended"); ?>


        <?php
        if ( $_REQUEST ) {
            foreach ( $error as $key => $value ) {
                message("info" , "$value") ;
            }
        }
        ?>

        <div>

            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#document" aria-controls="document" role="tab" data-toggle="tab">document</a></li>
                <li role="presentation"><a href="#company" aria-controls="company" role="tab" data-toggle="tab">company</a></li>
                <li role="presentation"><a href="#bank" aria-controls="bank" role="tab" data-toggle="tab">bank</a></li>
                <li role="presentation"><a href="#client" aria-controls="client" role="tab" data-toggle="tab">client</a></li>
                <li role="presentation"><a href="#client_delivery" aria-controls="client_delivery" role="tab" data-toggle="tab">client_delivery</a></li>
                <li role="presentation"><a href="#client_billing" aria-controls="client_billing" role="tab" data-toggle="tab">client_billing</a></li>
                <li role="presentation"><a href="#document_details" aria-controls="document_details" role="tab" data-toggle="tab">document_details</a></li>
                <li role="presentation"><a href="#document_items_details" aria-controls="document_items_details" role="tab" data-toggle="tab">document_items_details</a></li>
                
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="document"><?php include "form_ocr_document.php"; ?></div>
                <div role="tabpanel" class="tab-pane" id="company"><?php include "form_ocr_company_add.php" ; ?></div>
                <div role="tabpanel" class="tab-pane" id="bank"><?php include "form_ocr_company_bank_add.php" ; ?></div>
                <div role="tabpanel" class="tab-pane" id="client"><?php include "form_ocr_client_details.php" ; ?></div>
                <div role="tabpanel" class="tab-pane" id="client_delivery"><?php include "form_ocr_client_addreses_delivery.php" ; ?></div>
                <div role="tabpanel" class="tab-pane" id="client_billing"><?php include "form_ocr_client_addreses_billing.php" ; ?></div>
                <div role="tabpanel" class="tab-pane" id="document_details"><?php include "form_ocr_invoices_details.php" ; ?></div>
                <div role="tabpanel" class="tab-pane" id="document_items_details"><?php include "form_ocr_invoice_items_details.php" ; ?></div>
                
                
            </div>

        </div>

        <br><br><br><br><br><br><br>


        <div class="col-lg-3">




            <?php //include view("expenses", "der"); ?>
        </div>

    </div>
</div>

<?php include view("home" , "footer") ; ?> 

