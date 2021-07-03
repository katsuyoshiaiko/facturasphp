<form action="index.php" method="post" class="form-horizontal">
    <input type="hidden" name="c" value="credit_notes"> 
    <input type="hidden" name="a" value="commentsUpdateOk"> 
    <input type="hidden" name="credit_note_id" value="<?php echo "$id"; ?>"> 
    
    
    
    <div class="form-group">
        <label for="comments" class="col-sm-2 control-label"><?php _t("Comments"); ?></label>
        <div class="col-sm-10">
            <input type="text" name="comments" id="comments" class="form-control" placeholder="" value="<?php echo credit_notes_field_id("comments", $id); ?>">
        </div>
    </div>






    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default"><?php _t("Update"); ?></button>
        </div>
    </div>
</form>