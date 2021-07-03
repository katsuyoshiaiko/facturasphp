<form action="index.php" method="post" class="form-horizontal">
    <input type="hidden" name="c" value="expenses"> 
    <input type="hidden" name="a" value="ceUpdateOk"> 
    <input type="hidden" name="expense_id" value="<?php echo "$id"; ?>"> 
    
    
    
    <div class="form-group">
        <label for="comments" class="col-sm-2 control-label"><?php _t("Communication"); ?></label>
        <div class="col-sm-10">
            <input 
                type="text" 
                name="ce" 
                id="ce" 
                class="form-control" 
                placeholder="+++0123/45678/12345+++" value="<?php echo expenses_field_id("ce", $id); ?>">
        </div>
    </div>






    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default"><?php _t("Update"); ?></button>
        </div>
    </div>
</form>