<form class="form-horizontal" action="index.php" method="post">
    <input type="hidden" name="c" value="contacts">
    <input type="hidden" name="a" value="ok_banks_set_for_invoices">
    <input type="hidden" name="bank_id" value="<?php echo  $banks_list_by_contact_id['id']; ?>">
    


    <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">
            <?php _t("Old account"); ?>
        </label>
        <div class="col-sm-10">
            <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
        </div>
    </div>


    <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label"><?php _t("New account");  ?></label>
        <div class="col-sm-10">
            <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
        </div>
    </div>




    <div class="form-group">
        <label for="code" class="col-sm-2 control-label"><?php _t("Code"); ?></label>
        <div class="col-sm-10">
            <input type="text" name="code" class="form-control" id="code" placeholder="<?php echo uniqid(); ?>">
        </div>
    </div>




    <div class="form-group">
        <label for="copy" class="col-sm-2 control-label"><?php _t("Write Here"); ?></label>
        <div class="col-sm-10">
            <input type="text" name="copy" class="form-control" id="copy" placeholder="" value="<?php _t("Write here the code above"); ?>">
        </div>
    </div>





    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-danger"><?php _t('Yes, do it') ; ?></button>
        </div>
    </div>


</form>