<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="rols_status">
    <input type="hidden" name="a" value="deleteOk">
    <input type="hidden" name="id" value="<?php echo "$id"; ?>">
    


    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Id"); ?></label>
        <div class="col-sm-8">                    
            <input type="id" name="id" class="form-control"  id="id" placeholder="id" value="<?php echo "$rols_status[id]"; ?>" disabled="" >
        </div>	
    </div>
<div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Rol"); ?></label>
        <div class="col-sm-8">                    
            <input type="rol" name="rol" class="form-control"  id="rol" placeholder="rol" value="<?php echo "$rols_status[rol]"; ?>" disabled="" >
        </div>	
    </div>
<div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Status_code"); ?></label>
        <div class="col-sm-8">                    
            <input type="status_code" name="status_code" class="form-control"  id="status_code" placeholder="status_code" value="<?php echo "$rols_status[status_code]"; ?>" disabled="" >
        </div>	
    </div>




    <div class="form-group">
        <label class="control-label col-sm-2" for=""></label>
        <div class="col-sm-8">    
            <input class="btn btn-primary active" type ="submit" value ="<?php _t("Delete"); ?>">
        </div>      							
    </div>      							

</form>

