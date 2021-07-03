<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="providers">
    <input type="hidden" name="a" value="edit">
    <input type="hidden" name="id" value="<?php echo "$id"; ?>">
    


    <?php # id ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Id"); ?></label>
        <div class="col-sm-8">                    
            <input type="id" name="id" class="form-control"  id="id" placeholder="id" value="<?php echo "$providers[id]"; ?>" disabled="" >
        </div>	
    </div>
<?php # id ?>

<?php # company_id ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Company_id"); ?></label>
        <div class="col-sm-8">                    
            <input type="company_id" name="company_id" class="form-control"  id="company_id" placeholder="company_id" value="<?php echo "$providers[company_id]"; ?>" disabled="" >
        </div>	
    </div>
<?php # company_id ?>

<?php # date ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Date"); ?></label>
        <div class="col-sm-8">                    
            <input type="date" name="date" class="form-control"  id="date" placeholder="date" value="<?php echo "$providers[date]"; ?>" disabled="" >
        </div>	
    </div>
<?php # date ?>

<?php # discount ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Discount"); ?></label>
        <div class="col-sm-8">                    
            <input type="discount" name="discount" class="form-control"  id="discount" placeholder="discount" value="<?php echo "$providers[discount]"; ?>" disabled="" >
        </div>	
    </div>
<?php # discount ?>

<?php # order_by ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Order_by"); ?></label>
        <div class="col-sm-8">                    
            <input type="order_by" name="order_by" class="form-control"  id="order_by" placeholder="order_by" value="<?php echo "$providers[order_by]"; ?>" disabled="" >
        </div>	
    </div>
<?php # order_by ?>

<?php # status ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Status"); ?></label>
        <div class="col-sm-8">                    
            <input type="status" name="status" class="form-control"  id="status" placeholder="status" value="<?php echo "$providers[status]"; ?>" disabled="" >
        </div>	
    </div>
<?php # status ?>





    <div class="form-group">
        <label class="control-label col-sm-2" for=""></label>
        <div class="col-sm-8">    
            <input class="btn btn-primary active" type ="submit" value ="<?php _t("Edit"); ?>">
        </div>      							
    </div>      							

</form>

