<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="rols_status">
    <input type="hidden" name="a" value="addOk">

    <?php # rol ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="rol"><?php _t("Rol"); ?></label>
        <div class="col-sm-8">
            <select  name="rol" class="form-control" id="rol">                                
                <?php rols_select("rol", "rol", array(), array()); ?>                        
            </select>
        </div>	
    </div>
    <?php # /rol ?>

    <?php # status_code ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="status_code"><?php _t("Status_code"); ?></label>
        <div class="col-sm-8">
            <select  name="status_code" class="form-control" id="status_code">                                
                <?php orders_status_select("code", "status", $rols_status["status_code"], array()); ?>                        
            </select>
        </div>	
    </div>
    <?php # /status_code ?>


    <div class="form-group">
        <label class="control-label col-sm-2" for=""></label>
        <div class="col-sm-8">    
            <input class="btn btn-primary active" type ="submit" value ="<?php _t("Save"); ?>">
        </div>      							
    </div>      							

</form>
