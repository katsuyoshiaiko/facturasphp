       
<form enctype="multipart/form-data" method="post" action="index.php">

    <input type="hidden" name="c" value="gallery">
    <input type="hidden" name="a" value="ok_expense_file_add">    
    <input type="hidden" name="expense_id" id="expense_id"  value="<?php echo $id; ?>">        
    <input type="hidden" name="notes" value="null">
    <input type="hidden" name="redi" value="1">


    <div class="form-group">
        <label for="file">Logo (<?php echo _options_option('config_company_logo'); ?>)</label>
        <input type="file" id="file" name="file">

        <p class="help-block"><?php //echo _t("Only these file extensions are accepted");   ?></p>

    </div>  
    
    
    
    <button type="submit" class="btn btn-default"><?php _t("Submit"); ?></button>
</form>
