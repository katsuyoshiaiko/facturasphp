<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="banks">
    <input type="hidden" name="a" value="editOk">
    <input type="hidden" name="id" value="<?php echo "$id"; ?>">
    


    <?php # contact_id ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Contact_id"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="contact_id" class="form-control"  id="contact_id" placeholder="contact_id" value="<?php echo "$banks[contact_id]"; ?>"  readonly="">
        </div>	
    </div>
<?php # /contact_id ?>

<?php # bank ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="bank"><?php _t("Bank"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="bank" class="form-control"  id="bank" placeholder="bank" value="<?php echo "$banks[bank]"; ?>" >
        </div>	
    </div>
<?php # /bank ?>

<?php # account_number ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="account_number"><?php _t("Account_number"); ?></label>
        <div class="col-sm-8">                    
            <input 
                type="text" 
                name="account_number" 
                class="form-control"  
                id="account_number" 
                placeholder="account_number" 
                value="<?php echo "$banks[account_number]"; ?>" 
                >
        </div>	
    </div>
<?php # /account_number ?>

<?php # bic ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="bic"><?php _t("Bic"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="bic" class="form-control"  id="bic" placeholder="bic" value="<?php echo "$banks[bic]"; ?>" >
        </div>	
    </div>
<?php # /bic ?>

<?php # iban ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="iban"><?php _t("Iban"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="iban" class="form-control"  id="iban" placeholder="iban" value="<?php echo "$banks[iban]"; ?>" >
        </div>	
    </div>
<?php # /iban ?>

<?php # status ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="status"><?php _t("Status"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="status" class="form-control"  id="status" placeholder="status" value="<?php echo "$banks[status]"; ?>" >
        </div>	
    </div>
<?php # /status ?>





    <div class="form-group">
        <label class="control-label col-sm-2" for=""></label>
        <div class="col-sm-8">    
            <input class="btn btn-primary active" type ="submit" value ="<?php _t("Edit"); ?>">
        </div>      							
    </div>      							

</form>

