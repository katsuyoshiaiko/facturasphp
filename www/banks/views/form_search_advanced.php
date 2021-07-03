<form class="form-horizontal" action="index.php" method="get" >
    <input type="hidden" name="c" value="banks">
    <input type="hidden" name="a" value="search_advancedOk">
    
    
   

    <?php # contact_id ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Contact_id"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="contact_id" class="form-control"  id="contact_id" placeholder="contact_id" value="">
        </div>	
    </div>
<?php # contact_id ?>

<?php # bank ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Bank"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="bank" class="form-control"  id="bank" placeholder="bank" value="">
        </div>	
    </div>
<?php # bank ?>

<?php # account_number ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Account_number"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="account_number" class="form-control"  id="account_number" placeholder="account_number" value="">
        </div>	
    </div>
<?php # account_number ?>

<?php # bic ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Bic"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="bic" class="form-control"  id="bic" placeholder="bic" value="">
        </div>	
    </div>
<?php # bic ?>

<?php # iban ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Iban"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="iban" class="form-control"  id="iban" placeholder="iban" value="">
        </div>	
    </div>
<?php # iban ?>

<?php # status ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Status"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="status" class="form-control"  id="status" placeholder="status" value="">
        </div>	
    </div>
<?php # status ?>






    <div class="form-group">
        <label class="control-label col-sm-2" for=""></label>
        <div class="col-sm-8">    
            <input class="btn btn-primary active" type ="submit" value ="<?php _t("Save"); ?>">
        </div>      							
    </div>      							

</form>
