<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="gallery">
    <input type="hidden" name="a" value="editOk">
    <input type="hidden" name="id" value="<?php echo "$id"; ?>">
    


    <?php # owner_id ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="owner_id"><?php _t("Owner_id"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="owner_id" class="form-control"  id="owner_id" placeholder="owner_id" value="<?php echo "$gallery[owner_id]"; ?>" >
        </div>	
    </div>
<?php # /owner_id ?>

<?php # name ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="name"><?php _t("Name"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="name" class="form-control"  id="name" placeholder="name" value="<?php echo "$gallery[name]"; ?>" >
        </div>	
    </div>
<?php # /name ?>

<?php # title ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="title"><?php _t("Title"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="title" class="form-control"  id="title" placeholder="title" value="<?php echo "$gallery[title]"; ?>" >
        </div>	
    </div>
<?php # /title ?>

<?php # description ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="description"><?php _t("Description"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="description" class="form-control"  id="description" placeholder="description" value="<?php echo "$gallery[description]"; ?>" >
        </div>	
    </div>
<?php # /description ?>

<?php # alt ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="alt"><?php _t("Alt"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="alt" class="form-control"  id="alt" placeholder="alt" value="<?php echo "$gallery[alt]"; ?>" >
        </div>	
    </div>
<?php # /alt ?>

<?php # url ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="url"><?php _t("Url"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="url" class="form-control"  id="url" placeholder="url" value="<?php echo "$gallery[url]"; ?>" >
        </div>	
    </div>
<?php # /url ?>

<?php # date_registre ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="date_registre"><?php _t("Date_registre"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="date_registre" class="form-control"  id="date_registre" placeholder="date_registre" value="<?php echo "$gallery[date_registre]"; ?>" >
        </div>	
    </div>
<?php # /date_registre ?>

<?php # order_by ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="order_by"><?php _t("Order_by"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="order_by" class="form-control"  id="order_by" placeholder="order_by" value="<?php echo "$gallery[order_by]"; ?>" >
        </div>	
    </div>
<?php # /order_by ?>

<?php # status ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="status"><?php _t("Status"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="status" class="form-control"  id="status" placeholder="status" value="<?php echo "$gallery[status]"; ?>" >
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

