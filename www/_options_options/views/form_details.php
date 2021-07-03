<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="_options_options">
    <input type="hidden" name="a" value="edit">
    <input type="hidden" name="id" value="<?php echo "$id"; ?>">
    


    <?php # id ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Id"); ?></label>
        <div class="col-sm-8">                    
            <input type="id" name="id" class="form-control"  id="id" placeholder="id" value="<?php echo "$_options_options[id]"; ?>" disabled="" >
        </div>	
    </div>
<?php # id ?>

<?php # _tmf_materials_options_id ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("_tmf_materials_options_id"); ?></label>
        <div class="col-sm-8">                    
            <input type="_tmf_materials_options_id" name="_tmf_materials_options_id" class="form-control"  id="_tmf_materials_options_id" placeholder="_tmf_materials_options_id" value="<?php echo "$_options_options[_tmf_materials_options_id]"; ?>" disabled="" >
        </div>	
    </div>
<?php # _tmf_materials_options_id ?>

<?php # disabled_id ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Disabled_id"); ?></label>
        <div class="col-sm-8">                    
            <input type="disabled_id" name="disabled_id" class="form-control"  id="disabled_id" placeholder="disabled_id" value="<?php echo "$_options_options[disabled_id]"; ?>" disabled="" >
        </div>	
    </div>
<?php # disabled_id ?>

<?php # order_by ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Order_by"); ?></label>
        <div class="col-sm-8">                    
            <input type="order_by" name="order_by" class="form-control"  id="order_by" placeholder="order_by" value="<?php echo "$_options_options[order_by]"; ?>" disabled="" >
        </div>	
    </div>
<?php # order_by ?>

<?php # status ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Status"); ?></label>
        <div class="col-sm-8">                    
            <input type="status" name="status" class="form-control"  id="status" placeholder="status" value="<?php echo "$_options_options[status]"; ?>" disabled="" >
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

