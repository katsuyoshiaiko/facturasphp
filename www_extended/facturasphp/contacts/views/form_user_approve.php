<form method="post" action="index.php" >
    <input type="hidden" name="c" value="contacts">
    <input type="hidden" name="a" value="ok_user_approve">
    <input type="hidden" name="contact_id" value="<?php echo $id; ?>">
    

    <div class="form-group">
        <label for="new"><?php _t("Approve user"); ?></label>
        <p><?php _t("If you approve the user will have access to the system, do you want to?");  ?></p>
    </div>

    <button type="submit" class="btn btn-default"><?php echo _t("Yes, approve it now"); ?></button>

</form>

