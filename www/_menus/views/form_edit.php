<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="_menus">
    <input type="hidden" name="a" value="editOk">
    <input type="hidden" name="id" value="<?php echo "$id"; ?>">
    


    <?php # location ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="location"><?php _t("Location"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="location" class="form-control"  id="location" placeholder="location" value="<?php echo "$_menus[location]"; ?>" >
        </div>	
    </div>
<?php # /location ?>

<?php # father ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="father"><?php _t("Father"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="father" class="form-control"  id="father" placeholder="father" value="<?php echo "$_menus[father]"; ?>" >
        </div>	
    </div>
<?php # /father ?>

<?php # label ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="label"><?php _t("Label"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="label" class="form-control"  id="label" placeholder="label" value="<?php echo "$_menus[label]"; ?>" >
        </div>	
    </div>
<?php # /label ?>

<?php # url ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="url"><?php _t("Url"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="url" class="form-control"  id="url" placeholder="url" value="<?php echo "$_menus[url]"; ?>" >
        </div>	
    </div>
<?php # /url ?>

<?php # icon ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="icon"><?php _t("Icon"); ?>
        <?php _menu_icon("top", "$_menus[label]"); ?>
        </label>
        <div class="col-sm-8">                    
            <input type="text" name="icon" class="form-control"  id="icon" placeholder="icon" value="<?php echo "$_menus[icon]"; ?>" >
            
            
            
            
            
            
            <span id="icon" class="help-block">
                <a href="https://getbootstrap.com/docs/3.4/components/" target="new">bootstrap</a> | 
                <a href="https://fontawesome.com/" target="new">fontawesom</a> |
                <a href="https://mdbootstrap.com/docs/jquery/content/icons-usage/">mdbootstrap</a> |
                
                <?php /*<a href="https://materializecss.com/icons.html" target="new">materializecss</a>*/?>
                
                
                
            </span>
            

            
            
        </div>	
    </div>
<?php # /icon ?>

<?php # order_by ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="order_by"><?php _t("Order_by"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="order_by" class="form-control"  id="order_by" placeholder="order_by" value="<?php echo "$_menus[order_by]"; ?>" >
        </div>	
    </div>
<?php # /order_by ?>





    <div class="form-group">
        <label class="control-label col-sm-2" for=""></label>
        <div class="col-sm-8">    
            <input class="btn btn-primary active" type ="submit" value ="<?php _t("Edit"); ?>">
        </div>      							
    </div>      							

</form>

