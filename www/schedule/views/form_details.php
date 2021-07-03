<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="schedule">
    <input type="hidden" name="a" value="edit">
    <input type="hidden" name="id" value="<?php echo "$id"; ?>">
    


    <?php # id ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Id"); ?></label>
        <div class="col-sm-8">                    
            <input type="id" name="id" class="form-control"  id="id" placeholder="id" value="<?php echo "$schedule[id]"; ?>" disabled="" >
        </div>	
    </div>
<?php # id ?>

<?php # contact_id ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Contact_id"); ?></label>
        <div class="col-sm-8">                    
            <input type="contact_id" name="contact_id" class="form-control"  id="contact_id" placeholder="contact_id" value="<?php echo "$schedule[contact_id]"; ?>" disabled="" >
        </div>	
    </div>
<?php # contact_id ?>

<?php # day ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Day"); ?></label>
        <div class="col-sm-8">                    
            <input type="day" name="day" class="form-control"  id="day" placeholder="day" value="<?php echo "$schedule[day]"; ?>" disabled="" >
        </div>	
    </div>
<?php # day ?>

<?php # am_start ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Am_start"); ?></label>
        <div class="col-sm-8">                    
            <input type="am_start" name="am_start" class="form-control"  id="am_start" placeholder="am_start" value="<?php echo "$schedule[am_start]"; ?>" disabled="" >
        </div>	
    </div>
<?php # am_start ?>

<?php # am_end ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Am_end"); ?></label>
        <div class="col-sm-8">                    
            <input type="am_end" name="am_end" class="form-control"  id="am_end" placeholder="am_end" value="<?php echo "$schedule[am_end]"; ?>" disabled="" >
        </div>	
    </div>
<?php # am_end ?>

<?php # pm_start ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Pm_start"); ?></label>
        <div class="col-sm-8">                    
            <input type="pm_start" name="pm_start" class="form-control"  id="pm_start" placeholder="pm_start" value="<?php echo "$schedule[pm_start]"; ?>" disabled="" >
        </div>	
    </div>
<?php # pm_start ?>

<?php # pm_end ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Pm_end"); ?></label>
        <div class="col-sm-8">                    
            <input type="pm_end" name="pm_end" class="form-control"  id="pm_end" placeholder="pm_end" value="<?php echo "$schedule[pm_end]"; ?>" disabled="" >
        </div>	
    </div>
<?php # pm_end ?>

<?php # order_by ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Order_by"); ?></label>
        <div class="col-sm-8">                    
            <input type="order_by" name="order_by" class="form-control"  id="order_by" placeholder="order_by" value="<?php echo "$schedule[order_by]"; ?>" disabled="" >
        </div>	
    </div>
<?php # order_by ?>

<?php # status ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Status"); ?></label>
        <div class="col-sm-8">                    
            <input type="status" name="status" class="form-control"  id="status" placeholder="status" value="<?php echo "$schedule[status]"; ?>" disabled="" >
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

