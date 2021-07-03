<?php 
//$mensaje = "Estimado Sr. \n"
//        . "Despues de ver la contabilidad, su cuenta sebe ser pagada«n"
//        . "\n"
//        . "La contabilidad\n"
//        . "Empresa ABC"; 
?>
<form action="index.php" method="post" >
    <input type="hidden" name="c" value="expenses"> 
    <input type="hidden" name="a" value="ok_send_by_email"> 
    <input type="hidden" name="id" value="<?php echo "$id"; ?>"> 


    <div class="form-group">
        <label for="to"><?php _t("Send to"); ?></label>
        <input type="text" class="form-control" name="to" id="to" placeholder="" value="" disabled="">
    </div>
    
    
    <div class="form-group">
        <label for="message"><?php _t("Message"); ?></label>
        <textarea name="message" class="form-control" rows="10"><?php echo $mensaje; ?></textarea>
    </div>
    
    
    <div class="form-group">
        <label for="files"><?php _t("Files"); ?></label>
        <p><span class="glyphicon glyphicon-paperclip"></span> <a href="index.php" target="new"><?php _t("Expense"); ?></a></p>
    </div>
    
    
    
    
    
    
    
    <button type="submit" class="btn btn-default"><?php _t("Send"); ?></button>
</form>