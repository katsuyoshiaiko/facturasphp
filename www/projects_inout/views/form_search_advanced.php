<form class="form-horizontal" action="index.php" method="get" >
    <input type="hidden" name="c" value="projects_inout">
    <input type="hidden" name="a" value="search_advancedOk">
    
    
   

    <?php # project_id ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Project_id"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="project_id" class="form-control"  id="project_id" placeholder="project_id" value="">
        </div>	
    </div>
<?php # project_id ?>

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

<?php # expense_id ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Expense_id"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="expense_id" class="form-control"  id="expense_id" placeholder="expense_id" value="">
        </div>	
    </div>
<?php # expense_id ?>

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
