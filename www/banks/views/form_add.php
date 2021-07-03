<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="banks">
    <input type="hidden" name="a" value="addOk">
    <input type="hidden" name="redi" value="1">

    <?php # contact_id ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Contact"); ?></label>
        <div class="col-sm-8">
            <select  name="contact_id" class="form-control" id="contact_id">                                
                <?php //contacts_select("id", "id", array(), array()); ?>                        
                <option value="<?php echo $u_owner_id; ?>"><?php echo contacts_formated(($u_owner_id))?></option>
            </select>
        </div>	
    </div>
    <?php # /contact_id ?>

    <?php # bank ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="bank"><?php _t("Bank"); ?></label>
        <div class="col-sm-8">
            <input type="text"  name="bank" class="form-control" id="bank" placeholder="">
        </div>	
    </div>
    <?php # /bank ?>

    <?php # account_number ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="account_number"><?php _t("Account_number"); ?></label>
        <div class="col-sm-8">
           <input type="text"  name="account_number" class="form-control" id="account_number" placeholder="123-456789-00">
        </div>	
    </div>
    <?php # /account_number ?>

    <?php # bic ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="bic"><?php _t("Bic"); ?></label>
        <div class="col-sm-8">
            <input type="text"  name="bic" class="form-control" id="bic" placeholder="BIC123456">
        </div>	
    </div>
    <?php # /bic ?>

    <?php # iban ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="iban"><?php _t("Iban"); ?></label>
        <div class="col-sm-8">
            <input type="text"  name="iban" class="form-control" id="iban" placeholder="">
        </div>	
    </div>
    <?php # /iban ?>

    <?php # status ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="status"><?php _t("Status"); ?></label>
        <div class="col-sm-8">
            <input type="text"  name="status" class="form-control" id="status" placeholder="" value="1">
        </div>	
    </div>
    <?php # /status ?>


    <div class="form-group">
        <label class="control-label col-sm-2" for=""></label>
        <div class="col-sm-8">    
            <input class="btn btn-primary active" type ="submit" value ="<?php _t("Save"); ?>">
        </div>      							
    </div>      							

</form>
