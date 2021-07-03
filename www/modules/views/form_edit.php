<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="modules">
    <input type="hidden" name="a" value="editOk">
    <input type="hidden" name="id" value="<?php echo "$id"; ?>">
    


    <?php # name ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="name"><?php _t("Name"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="name" class="form-control"  id="name" placeholder="name" value="<?php echo "$modules[name]"; ?>" >
        </div>	
    </div>
<?php # /name ?>

<?php # sub_modules ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="sub_modules"><?php _t("Sub_modules"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="sub_modules" class="form-control"  id="sub_modules" placeholder="sub_modules" value="<?php echo "$modules[sub_modules]"; ?>" >
        </div>	
    </div>
<?php # /sub_modules ?>

<?php # description ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="description"><?php _t("Description"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="description" class="form-control"  id="description" placeholder="description" value="<?php echo "$modules[description]"; ?>" >
        </div>	
    </div>
<?php # /description ?>

<?php # author ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="author"><?php _t("Author"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="author" class="form-control"  id="author" placeholder="author" value="<?php echo "$modules[author]"; ?>" >
        </div>	
    </div>
<?php # /author ?>

<?php # author_email ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="author_email"><?php _t("Author_email"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="author_email" class="form-control"  id="author_email" placeholder="author_email" value="<?php echo "$modules[author_email]"; ?>" >
        </div>	
    </div>
<?php # /author_email ?>

<?php # url ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="url"><?php _t("Url"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="url" class="form-control"  id="url" placeholder="url" value="<?php echo "$modules[url]"; ?>" >
        </div>	
    </div>
<?php # /url ?>

<?php # version ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="version"><?php _t("Version"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="version" class="form-control"  id="version" placeholder="version" value="<?php echo "$modules[version]"; ?>" >
        </div>	
    </div>
<?php # /version ?>

<?php # order_by ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="order_by"><?php _t("Order_by"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="order_by" class="form-control"  id="order_by" placeholder="order_by" value="<?php echo "$modules[order_by]"; ?>" >
        </div>	
    </div>
<?php # /order_by ?>

<?php # status ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="status"><?php _t("Status"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="status" class="form-control"  id="status" placeholder="status" value="<?php echo "$modules[status]"; ?>" >
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

