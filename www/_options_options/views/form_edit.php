<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="_options_options">
    <input type="hidden" name="a" value="editOk">
    <input type="hidden" name="id" value="<?php echo "$id"; ?>">
    


    <?php # _tmf_materials_options_id ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="_tmf_materials_options_id"><?php _t("_tmf_materials_options_id"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="_tmf_materials_options_id" class="form-control"  id="_tmf_materials_options_id" placeholder="_tmf_materials_options_id" value="<?php echo "$_options_options[_tmf_materials_options_id]"; ?>" >
        </div>	
    </div>
<?php # /_tmf_materials_options_id ?>

<?php # disabled_id ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="disabled_id"><?php _t("Disabled_id"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="disabled_id" class="form-control"  id="disabled_id" placeholder="disabled_id" value="<?php echo "$_options_options[disabled_id]"; ?>" >
        </div>	
    </div>
<?php # /disabled_id ?>

<?php # order_by ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="order_by"><?php _t("Order_by"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="order_by" class="form-control"  id="order_by" placeholder="order_by" value="<?php echo "$_options_options[order_by]"; ?>" >
        </div>	
    </div>
<?php # /order_by ?>

<?php # status ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="status"><?php _t("Status"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="status" class="form-control"  id="status" placeholder="status" value="<?php echo "$_options_options[status]"; ?>" >
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

