<form action="index.php" method="post" class="form-horizontal">
    <input type="hidden" name="c" value="budgets"> 
    <input type="hidden" name="a" value="commentsUpdateOk"> 
    <input type="hidden" name="budget_id" value="<?php echo "$id"; ?>"> 
    
    
    
    <div class="form-group">
        <label for="comments" class="col-sm-2 control-label"><?php _t("Comments"); ?></label>
        <div class="col-sm-10">
            <input 
                type="text" 
                name="comments" 
                id="comments" 
                class="form-control" 
                placeholder="" 
                value="<?php echo budgets_field_id("comments", $id); ?>"
                required=""
                >
        </div>
    </div>






    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default"><?php _t("Send"); ?></button>
        </div>
    </div>
</form>