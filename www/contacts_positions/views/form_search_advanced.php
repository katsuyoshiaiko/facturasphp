<form class="form-horizontal" action="index.php" method="get" >
    <input type="hidden" name="c" value="contacts_positions">
    <input type="hidden" name="a" value="search_advancedOk">
    
    
   

    <?php # contact_id ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Contact_id"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="contact_id" class="form-control"  id="contact_id" placeholder="contact_id" value="">
        </div>	
    </div>
<?php # contact_id ?>

<?php # company_id ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Company_id"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="company_id" class="form-control"  id="company_id" placeholder="company_id" value="">
        </div>	
    </div>
<?php # company_id ?>

<?php # position ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Position"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="position" class="form-control"  id="position" placeholder="position" value="">
        </div>	
    </div>
<?php # position ?>






    <div class="form-group">
        <label class="control-label col-sm-2" for=""></label>
        <div class="col-sm-8">    
            <input class="btn btn-primary active" type ="submit" value ="<?php _t("Save"); ?>">
        </div>      							
    </div>      							

</form>
