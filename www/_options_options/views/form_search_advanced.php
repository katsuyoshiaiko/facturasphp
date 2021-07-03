<form class="form-horizontal" action="index.php" method="get" >
    <input type="hidden" name="c" value="_options_options">
    <input type="hidden" name="a" value="search_advancedOk">
    
    
   

    <?php # _tmf_materials_options_id ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("_tmf_materials_options_id"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="_tmf_materials_options_id" class="form-control"  id="_tmf_materials_options_id" placeholder="_tmf_materials_options_id" value="">
        </div>	
    </div>
<?php # _tmf_materials_options_id ?>

<?php # disabled_id ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Disabled_id"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="disabled_id" class="form-control"  id="disabled_id" placeholder="disabled_id" value="">
        </div>	
    </div>
<?php # disabled_id ?>

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
