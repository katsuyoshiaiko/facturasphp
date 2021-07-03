<form method="post" action="index.php" >
    <input type="hidden" name="c" value="contacts">
    <input type="hidden" name="a" value="ok_user_block">
    <input type="hidden" name="contact_id" value="<?php echo $id; ?>">

    <div class="form-group">
        <label for="new"><?php _t("Are you sure you want to block the user?"); ?></label>
        <p><?php _t("Yes i'm really sure"); ?></p>
    </div>

    <button type="submit" class="btn btn-danger"><?php echo _t("Yes, block the user now"); ?></button>

</form>