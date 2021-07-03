<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="employees">
    <input type="hidden" name="a" value="deleteOk">
    <input type="hidden" name="id" value="<?php echo "$id"; ?>">
    


    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Id"); ?></label>
        <div class="col-sm-8">                    
            <input type="id" name="id" class="form-control"  id="id" placeholder="id" value="<?php echo "$employees[id]"; ?>" disabled="" >
        </div>	
    </div>
<div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Company_id"); ?></label>
        <div class="col-sm-8">                    
            <input type="company_id" name="company_id" class="form-control"  id="company_id" placeholder="company_id" value="<?php echo "$employees[company_id]"; ?>" disabled="" >
        </div>	
    </div>
<div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Contact_id"); ?></label>
        <div class="col-sm-8">                    
            <input type="contact_id" name="contact_id" class="form-control"  id="contact_id" placeholder="contact_id" value="<?php echo "$employees[contact_id]"; ?>" disabled="" >
        </div>	
    </div>
<div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Owner_ref"); ?></label>
        <div class="col-sm-8">                    
            <input type="owner_ref" name="owner_ref" class="form-control"  id="owner_ref" placeholder="owner_ref" value="<?php echo "$employees[owner_ref]"; ?>" disabled="" >
        </div>	
    </div>
<div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Date"); ?></label>
        <div class="col-sm-8">                    
            <input type="date" name="date" class="form-control"  id="date" placeholder="date" value="<?php echo "$employees[date]"; ?>" disabled="" >
        </div>	
    </div>
<div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Cargo"); ?></label>
        <div class="col-sm-8">                    
            <input type="cargo" name="cargo" class="form-control"  id="cargo" placeholder="cargo" value="<?php echo "$employees[cargo]"; ?>" disabled="" >
        </div>	
    </div>
<div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Order_by"); ?></label>
        <div class="col-sm-8">                    
            <input type="order_by" name="order_by" class="form-control"  id="order_by" placeholder="order_by" value="<?php echo "$employees[order_by]"; ?>" disabled="" >
        </div>	
    </div>
<div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Status"); ?></label>
        <div class="col-sm-8">                    
            <input type="status" name="status" class="form-control"  id="status" placeholder="status" value="<?php echo "$employees[status]"; ?>" disabled="" >
        </div>	
    </div>




    <div class="form-group">
        <label class="control-label col-sm-2" for=""></label>
        <div class="col-sm-8">    
            <input class="btn btn-primary active" type ="submit" value ="<?php _t("Delete"); ?>">
        </div>      							
    </div>      							

</form>

