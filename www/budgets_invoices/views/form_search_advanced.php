<form class="form-horizontal" action="index.php" method="get" >
    <input type="hidden" name="c" value="budgets_invoices">
    <input type="hidden" name="a" value="search_advancedOk">
    
    
   

    <?php # budget_id ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Budget_id"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="budget_id" class="form-control"  id="budget_id" placeholder="budget_id" value="">
        </div>	
    </div>
<?php # budget_id ?>

<?php # invoice_id ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Invoice_id"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="invoice_id" class="form-control"  id="invoice_id" placeholder="invoice_id" value="">
        </div>	
    </div>
<?php # invoice_id ?>

<?php # date_registre ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Date_registre"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="date_registre" class="form-control"  id="date_registre" placeholder="date_registre" value="">
        </div>	
    </div>
<?php # date_registre ?>

<?php # order_by ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Order_by"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="order_by" class="form-control"  id="order_by" placeholder="order_by" value="">
        </div>	
    </div>
<?php # order_by ?>

<?php # status ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Status"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="status" class="form-control"  id="status" placeholder="status" value="">
        </div>	
    </div>
<?php # status ?>






    <div class="form-group">
        <label class="control-label col-sm-2" for=""></label>
        <div class="col-sm-8">    
            <input class="btn btn-primary active" type ="submit" value ="<?php _t("Save"); ?>">
        </div>      							
    </div>      							

</form>
