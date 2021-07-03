<form class="form-horizontal" action="index.php" method="get" >
    <input type="hidden" name="c" value="_menus">
    <input type="hidden" name="a" value="search_advancedOk">
    
    
   

    <?php # location ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Location"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="location" class="form-control"  id="location" placeholder="location" value="">
        </div>	
    </div>
<?php # location ?>

<?php # father ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Father"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="father" class="form-control"  id="father" placeholder="father" value="">
        </div>	
    </div>
<?php # father ?>

<?php # label ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Label"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="label" class="form-control"  id="label" placeholder="label" value="">
        </div>	
    </div>
<?php # label ?>

<?php # url ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Url"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="url" class="form-control"  id="url" placeholder="url" value="">
        </div>	
    </div>
<?php # url ?>

<?php # icon ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Icon"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="icon" class="form-control"  id="icon" placeholder="icon" value="">
        </div>	
    </div>
<?php # icon ?>

<?php # order_by ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Order_by"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="order_by" class="form-control"  id="order_by" placeholder="order_by" value="">
        </div>	
    </div>
<?php # order_by ?>






    <div class="form-group">
        <label class="control-label col-sm-2" for=""></label>
        <div class="col-sm-8">    
            <input class="btn btn-primary active" type ="submit" value ="<?php _t("Save"); ?>">
        </div>      							
    </div>      							

</form>
