<form class="form-horizontal" action="index.php" method="get" >
    <input type="hidden" name="c" value="schedule">
    <input type="hidden" name="a" value="search_advancedOk">
    
    
   

    <?php # contact_id ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Contact_id"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="contact_id" class="form-control"  id="contact_id" placeholder="contact_id" value="">
        </div>	
    </div>
<?php # contact_id ?>

<?php # day ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Day"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="day" class="form-control"  id="day" placeholder="day" value="">
        </div>	
    </div>
<?php # day ?>

<?php # am_start ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Am_start"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="am_start" class="form-control"  id="am_start" placeholder="am_start" value="">
        </div>	
    </div>
<?php # am_start ?>

<?php # am_end ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Am_end"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="am_end" class="form-control"  id="am_end" placeholder="am_end" value="">
        </div>	
    </div>
<?php # am_end ?>

<?php # pm_start ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Pm_start"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="pm_start" class="form-control"  id="pm_start" placeholder="pm_start" value="">
        </div>	
    </div>
<?php # pm_start ?>

<?php # pm_end ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Pm_end"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="pm_end" class="form-control"  id="pm_end" placeholder="pm_end" value="">
        </div>	
    </div>
<?php # pm_end ?>

<?php # order_by ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Order_by"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="order_by" class="form-control"  id="order_by" placeholder="order_by" value="">
        </div>	
    </div>
<?php # order_by ?>

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
