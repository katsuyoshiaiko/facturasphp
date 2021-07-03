<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="employees">
    <input type="hidden" name="a" value="addOk">

    <?php # company_id ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="company_id"><?php _t("Company_id"); ?></label>
        <div class="col-sm-8">
            <select  name="company_id" class="form-control" id="company_id">                                
                <?php contacts_select("id", "name", array(), array()); ?>                        
            </select>
        </div>	
    </div>
    <?php # /company_id ?>

    <?php # contact_id ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Contact_id"); ?></label>
        <div class="col-sm-8">
            <select  name="contact_id" class="form-control" id="contact_id">                                
                <?php contacts_select("", "", array(), array()); ?>                        
            </select>
        </div>	
    </div>
    <?php # /contact_id ?>

    <?php # owner_ref ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="owner_ref"><?php _t("Owner_ref"); ?></label>
        <div class="col-sm-8">
            <input type="text"  name="owner_ref" class="form-control" id="owner_ref" placeholder=" - defecto">
        </div>	
    </div>
    <?php # /owner_ref ?>

    <?php # date ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="date"><?php _t("Date"); ?></label>
        <div class="col-sm-8">
            <input type="date"  name="date" class="form-control" id="date" placeholder=" - date">
        </div>	
    </div>
    <?php # /date ?>

    <?php # cargo ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="cargo"><?php _t("Cargo"); ?></label>
        <div class="col-sm-8">
            <input type="text"  name="cargo" class="form-control" id="cargo" placeholder=" - defecto">
        </div>	
    </div>
    <?php # /cargo ?>

    <?php # order_by ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="order_by"><?php _t("Order_by"); ?></label>
        <div class="col-sm-8">
            <input type="text"  name="order_by" class="form-control" id="order_by" placeholder=" - defecto">
        </div>	
    </div>
    <?php # /order_by ?>

    <?php # status ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="status"><?php _t("Status"); ?></label>
        <div class="col-sm-8">
            <input type="text"  name="status" class="form-control" id="status" placeholder=" - defecto">
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
