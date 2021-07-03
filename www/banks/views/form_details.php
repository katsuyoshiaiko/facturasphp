<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="banks">
    <input type="hidden" name="a" value="edit">
    <input type="hidden" name="id" value="<?php echo "$id"; ?>">
    


    <?php # id ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Id"); ?></label>
        <div class="col-sm-8">                    
            <input type="id" name="id" class="form-control"  id="id" placeholder="id" value="<?php echo "$banks[id]"; ?>" disabled="" >
        </div>	
    </div>
<?php # id ?>

<?php # contact_id ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Contact_id"); ?></label>
        <div class="col-sm-8">                    
            <input type="contact_id" name="contact_id" class="form-control"  id="contact_id" placeholder="contact_id" value="<?php echo "$banks[contact_id]"; ?>" disabled="" >
        </div>	
    </div>
<?php # contact_id ?>

<?php # bank ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Bank"); ?></label>
        <div class="col-sm-8">                    
            <input type="bank" name="bank" class="form-control"  id="bank" placeholder="bank" value="<?php echo "$banks[bank]"; ?>" disabled="" >
        </div>	
    </div>
<?php # bank ?>

<?php # account_number ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Account_number"); ?></label>
        <div class="col-sm-8">                    
            <input type="account_number" name="account_number" class="form-control"  id="account_number" placeholder="account_number" value="<?php echo "$banks[account_number]"; ?>" disabled="" >
        </div>	
    </div>
<?php # account_number ?>

<?php # bic ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Bic"); ?></label>
        <div class="col-sm-8">                    
            <input type="bic" name="bic" class="form-control"  id="bic" placeholder="bic" value="<?php echo "$banks[bic]"; ?>" disabled="" >
        </div>	
    </div>
<?php # bic ?>

<?php # iban ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Iban"); ?></label>
        <div class="col-sm-8">                    
            <input type="iban" name="iban" class="form-control"  id="iban" placeholder="iban" value="<?php echo "$banks[iban]"; ?>" disabled="" >
        </div>	
    </div>
<?php # iban ?>

<?php # status ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Status"); ?></label>
        <div class="col-sm-8">                    
            <input type="status" name="status" class="form-control"  id="status" placeholder="status" value="<?php echo "$banks[status]"; ?>" disabled="" >
        </div>	
    </div>
<?php # status ?>





    <div class="form-group">
        <label class="control-label col-sm-2" for=""></label>
        <div class="col-sm-8">    
            <input class="btn btn-primary active" type ="submit" value ="<?php _t("Edit"); ?>">
        </div>      							
    </div>      							

</form>

