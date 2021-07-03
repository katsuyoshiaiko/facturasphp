<form class="form-horizontal" action="index.php" method="get" >
    <input type="hidden" name="c" value="transport">
    <input type="hidden" name="a" value="search_advancedOk">
    
    
   

    <?php # code ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Code"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="code" class="form-control"  id="code" placeholder="code" value="">
        </div>	
    </div>
<?php # code ?>

<?php # name ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Name"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="name" class="form-control"  id="name" placeholder="name" value="">
        </div>	
    </div>
<?php # name ?>

<?php # price ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Price"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="price" class="form-control"  id="price" placeholder="price" value="">
        </div>	
    </div>
<?php # price ?>

<?php # tax ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Tax"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="tax" class="form-control"  id="tax" placeholder="tax" value="">
        </div>	
    </div>
<?php # tax ?>

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
