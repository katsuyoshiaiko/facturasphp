<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="employees">
    <input type="hidden" name="a" value="editOk">
    <input type="hidden" name="id" value="<?php echo "$id"; ?>">
    


    <?php # company_id ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="company_id"><?php _t("Company_id"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="company_id" class="form-control"  id="company_id" placeholder="company_id" value="<?php echo "$employees[company_id]"; ?>" >
        </div>	
    </div>
<?php # /company_id ?>

<?php # contact_id ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Contact_id"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="contact_id" class="form-control"  id="contact_id" placeholder="contact_id" value="<?php echo "$employees[contact_id]"; ?>" >
        </div>	
    </div>
<?php # /contact_id ?>

<?php # owner_ref ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="owner_ref"><?php _t("Owner_ref"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="owner_ref" class="form-control"  id="owner_ref" placeholder="owner_ref" value="<?php echo "$employees[owner_ref]"; ?>" >
        </div>	
    </div>
<?php # /owner_ref ?>

<?php # date ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="date"><?php _t("Date"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="date" class="form-control"  id="date" placeholder="date" value="<?php echo "$employees[date]"; ?>" >
        </div>	
    </div>
<?php # /date ?>

<?php # cargo ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="cargo"><?php _t("Cargo"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="cargo" class="form-control"  id="cargo" placeholder="cargo" value="<?php echo "$employees[cargo]"; ?>" >
        </div>	
    </div>
<?php # /cargo ?>

<?php # order_by ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="order_by"><?php _t("Order_by"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="order_by" class="form-control"  id="order_by" placeholder="order_by" value="<?php echo "$employees[order_by]"; ?>" >
        </div>	
    </div>
<?php # /order_by ?>

<?php # status ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="status"><?php _t("Status"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="status" class="form-control"  id="status" placeholder="status" value="<?php echo "$employees[status]"; ?>" >
        </div>	
    </div>
<?php # /status ?>





    <div class="form-group">
        <label class="control-label col-sm-2" for=""></label>
        <div class="col-sm-8">    
            <input class="btn btn-primary active" type ="submit" value ="<?php _t("Edit"); ?>">
        </div>      							
    </div>      							

</form>

