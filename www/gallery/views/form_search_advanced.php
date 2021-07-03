<form class="form-horizontal" action="index.php" method="get" >
    <input type="hidden" name="c" value="gallery">
    <input type="hidden" name="a" value="search_advancedOk">
    
    
   

    <?php # owner_id ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Owner_id"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="owner_id" class="form-control"  id="owner_id" placeholder="owner_id" value="">
        </div>	
    </div>
<?php # owner_id ?>

<?php # name ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Name"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="name" class="form-control"  id="name" placeholder="name" value="">
        </div>	
    </div>
<?php # name ?>

<?php # title ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Title"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="title" class="form-control"  id="title" placeholder="title" value="">
        </div>	
    </div>
<?php # title ?>

<?php # description ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Description"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="description" class="form-control"  id="description" placeholder="description" value="">
        </div>	
    </div>
<?php # description ?>

<?php # alt ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Alt"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="alt" class="form-control"  id="alt" placeholder="alt" value="">
        </div>	
    </div>
<?php # alt ?>

<?php # url ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Url"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="url" class="form-control"  id="url" placeholder="url" value="">
        </div>	
    </div>
<?php # url ?>

<?php # date_registre ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Date_registre"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="date_registre" class="form-control"  id="date_registre" placeholder="date_registre" value="">
        </div>	
    </div>
<?php # date_registre ?>

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
