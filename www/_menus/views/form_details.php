<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="_menus">
    <input type="hidden" name="a" value="edit">
    <input type="hidden" name="id" value="<?php echo "$id"; ?>">
    


    <?php # id ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Id"); ?></label>
        <div class="col-sm-8">                    
            <input type="id" name="id" class="form-control"  id="id" placeholder="id" value="<?php echo "$_menus[id]"; ?>" disabled="" >
        </div>	
    </div>
<?php # id ?>

<?php # location ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Location"); ?></label>
        <div class="col-sm-8">                    
            <input type="location" name="location" class="form-control"  id="location" placeholder="location" value="<?php echo "$_menus[location]"; ?>" disabled="" >
        </div>	
    </div>
<?php # location ?>

<?php # father ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Father"); ?></label>
        <div class="col-sm-8">                    
            <input type="father" name="father" class="form-control"  id="father" placeholder="father" value="<?php echo "$_menus[father]"; ?>" disabled="" >
        </div>	
    </div>
<?php # father ?>

<?php # label ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Label"); ?></label>
        <div class="col-sm-8">                    
            <input type="label" name="label" class="form-control"  id="label" placeholder="label" value="<?php echo "$_menus[label]"; ?>" disabled="" >
        </div>	
    </div>
<?php # label ?>

<?php # url ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Url"); ?></label>
        <div class="col-sm-8">                    
            <input type="url" name="url" class="form-control"  id="url" placeholder="url" value="<?php echo "$_menus[url]"; ?>" disabled="" >
        </div>	
    </div>
<?php # url ?>

<?php # icon ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Icon"); ?>
        <?php _menu_icon("top", "$_menus[label]"); ?>
        </label>
        <div class="col-sm-8">                    
            <input type="icon" name="icon" class="form-control"  id="icon" placeholder="icon" value="<?php echo "$_menus[icon]"; ?>" disabled="" >
        </div>	
    </div>
<?php # icon ?>

<?php # order_by ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Order_by"); ?></label>
        <div class="col-sm-8">                    
            <input type="order_by" name="order_by" class="form-control"  id="order_by" placeholder="order_by" value="<?php echo "$_menus[order_by]"; ?>" disabled="" >
        </div>	
    </div>
<?php # order_by ?>





    <div class="form-group">
        <label class="control-label col-sm-2" for=""></label>
        <div class="col-sm-8">    
            <input class="btn btn-primary active" type ="submit" value ="<?php _t("Edit"); ?>">
        </div>      							
    </div>      							

</form>

