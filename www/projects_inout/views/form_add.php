<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="projects_inout">
    <input type="hidden" name="a" value="ok_add">

<?php # project_id ?>
     <div class="form-group">
        <label class="control-label col-sm-2" for="project_id"><?php _t("Project_id"); ?></label>
        <div class="col-sm-8">
         <select  name="project_id" class="form-control selectpicker" id="project_id" data-live-search="true">
                <?php projects_select("id","id", $id , array()); ?>                        
                </select>
       </div>	
    </div>
<?php # /project_id ?>

<?php # budget_id ?>
     <div class="form-group">
        <label class="control-label col-sm-2" for="budget_id"><?php _t("Budget_id"); ?></label>
        <div class="col-sm-8">
          <input type="number"  name="budget_id" class="budget_id" id="budget_id" placeholder=" - int">
       </div>	
    </div>
<?php # /budget_id ?>

<?php # invoice_id ?>
     <div class="form-group">
        <label class="control-label col-sm-2" for="invoice_id"><?php _t("Invoice_id"); ?></label>
        <div class="col-sm-8">
          <input type="number"  name="invoice_id" class="invoice_id" id="invoice_id" placeholder=" - int">
       </div>	
    </div>
<?php # /invoice_id ?>

<?php # expense_id ?>
     <div class="form-group">
        <label class="control-label col-sm-2" for="expense_id"><?php _t("Expense_id"); ?></label>
        <div class="col-sm-8">
          <input type="number"  name="expense_id" class="expense_id" id="expense_id" placeholder=" - int">
       </div>	
    </div>
<?php # /expense_id ?>

<?php # order_by ?>
     <div class="form-group">
        <label class="control-label col-sm-2" for="order_by"><?php _t("Order_by"); ?></label>
        <div class="col-sm-8">
          <input type="number"  name="order_by" class="order_by" id="order_by" placeholder=" - int">
       </div>	
    </div>
<?php # /order_by ?>

<?php # status ?>
     <div class="form-group">
        <label class="control-label col-sm-2" for="status"><?php _t("Status"); ?></label>
        <div class="col-sm-8">
          <input type="number"  name="status" class="status" id="status" placeholder=" - int">
       </div>	
    </div>
<?php # /status ?>

  
    <div class="form-group">
        <label class="control-label col-sm-2" for=""></label>
        <div class="col-sm-8">    
            <input class="btn btn-primary active" type ="submit" value ="<?php _t("Save"); ?>">
        </div>      							
    </div>      							

</form>
