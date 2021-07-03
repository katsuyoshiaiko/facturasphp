<form class="form-horizontal" action="index.php" method="get" >
    <input type="hidden" name="c" value="rols_status">
    <input type="hidden" name="a" value="search_advancedOk">
    
    
   

    <?php # rol ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Rol"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="rol" class="form-control"  id="rol" placeholder="rol" value="">
        </div>	
    </div>
<?php # rol ?>

<?php # status_code ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Status_code"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="status_code" class="form-control"  id="status_code" placeholder="status_code" value="">
        </div>	
    </div>
<?php # status_code ?>






    <div class="form-group">
        <label class="control-label col-sm-2" for=""></label>
        <div class="col-sm-8">    
            <input class="btn btn-primary active" type ="submit" value ="<?php _t("Save"); ?>">
        </div>      							
    </div>      							

</form>
