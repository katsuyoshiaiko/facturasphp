<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="_options_options">
    <input type="hidden" name="a" value="addOk">

<?php # _tmf_materials_options_id ?>
     <div class="form-group">
        <label class="control-label col-sm-2" for="_tmf_materials_options_id"><?php _t("_tmf_materials_options_id"); ?></label>
        <div class="col-sm-8">
         <select  name="_tmf_materials_options_id" class="form-control selectpicker" id="_tmf_materials_options_id" data-live-search="true">
                <?php _tmf_materials_options_select("id","id", array(), array()); ?>                        
                </select>
       </div>	
    </div>
<?php # /_tmf_materials_options_id ?>

<?php # disabled_id ?>
     <div class="form-group">
        <label class="control-label col-sm-2" for="disabled_id"><?php _t("Disabled_id"); ?></label>
        <div class="col-sm-8">
         <select  name="disabled_id" class="form-control selectpicker" id="disabled_id" data-live-search="true">
                <?php _tmf_materials_options_select("option_id","option_id", array(), array()); ?>                        
                </select>
       </div>	
    </div>
<?php # /disabled_id ?>

<?php # order_by ?>
     <div class="form-group">
        <label class="control-label col-sm-2" for="order_by"><?php _t("Order_by"); ?></label>
        <div class="col-sm-8">
          <input type="text"  name="order_by" class="form-control" id="order_by" placeholder=" - defecto">
       </div>	
    </div>
<?php # /order_by ?>

<?php # status ?>
     <div class="form-group">
        <label class="control-label col-sm-2" for="status"><?php _t("Status"); ?></label>
        <div class="col-sm-8">
          <input type="text"  name="status" class="form-control" id="status" placeholder=" - defecto">
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
