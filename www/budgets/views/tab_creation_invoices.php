<div>
    <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" >
            <a href="#notInvoice" aria-controls="notInvoice" role="tab" data-toggle="tab">
                <?php _t("Not Invoice"); ?>
            </a>
        </li> 

        <li role="presentation" class="active">
            <a href="#one" aria-controls="one" role="tab" data-toggle="tab">
                <?php _t("Individual Invoice"); ?>
            </a>
        </li>

    </ul>


    <div class="tab-content">

        <div role="tabpanel" class="tab-pane" id="notInvoice">
            <h3><?php _t("Not invoice"); ?></h3>
            <p><?php _t('Register as accepted, but do not create invoice, the invoice will be created later'); ?></p>            
            <?php
            if ($budgets['status'] == 30) {
                message("info", "Budget alrerady acepted");
            } else {

                include "form_invoice_create_later.php";
            }
            ?>
        </div>                



        <div role="tabpanel" class="tab-pane active" id="one">
            <h3><?php _t("Individual invoice"); ?></h3>
            <p><?php _t("Register as accepted and create an individual invoice"); ?></p>
            <p><?php _t("You will not be able to cancel this later"); ?></p>            
            <?php include "form_invoice_create_individual.php"; ?>
        </div>










    </div>
</div>