<img class="img-rounded" src="www_extended/default/gallery/img/<?php echo "$gallery[name]"; ?>" width="100%"> 

<p>-</p>


<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="gallery">
    <input type="hidden" name="a" value="edit">
    <input type="hidden" name="id" value="<?php echo "$id"; ?>">
    


    <?php # id ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Id"); ?></label>
        <div class="col-sm-8">                    
            <input type="id" name="id" class="form-control"  id="id" placeholder="id" value="<?php echo "$gallery[id]"; ?>" disabled="" >
        </div>	
    </div>
<?php # id ?>

<?php # owner_id ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Owner_id"); ?></label>
        <div class="col-sm-8">                    
            <input type="owner_id" name="owner_id" class="form-control"  id="owner_id" placeholder="owner_id" value="<?php echo "$gallery[owner_id]"; ?>" disabled="" >
        </div>	
    </div>
<?php # owner_id ?>

<?php # name ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Name"); ?></label>
        <div class="col-sm-8">                    
            <input type="name" name="name" class="form-control"  id="name" placeholder="name" value="<?php echo "$gallery[name]"; ?>" disabled="" >
        </div>	
    </div>
<?php # name ?>

<?php # title ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Title"); ?></label>
        <div class="col-sm-8">                    
            <input type="title" name="title" class="form-control"  id="title" placeholder="title" value="<?php echo "$gallery[title]"; ?>" disabled="" >
        </div>	
    </div>
<?php # title ?>

<?php # description ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Description"); ?></label>
        <div class="col-sm-8">                    
            <input type="description" name="description" class="form-control"  id="description" placeholder="description" value="<?php echo "$gallery[description]"; ?>" disabled="" >
        </div>	
    </div>
<?php # description ?>

<?php # alt ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Alt"); ?></label>
        <div class="col-sm-8">                    
            <input type="alt" name="alt" class="form-control"  id="alt" placeholder="alt" value="<?php echo "$gallery[alt]"; ?>" disabled="" >
        </div>	
    </div>
<?php # alt ?>

<?php # url ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Url"); ?></label>
        <div class="col-sm-8">                    
            <input type="url" name="url" class="form-control"  id="url" placeholder="url" value="<?php echo "$gallery[url]"; ?>" disabled="" >
        </div>	
    </div>
<?php # url ?>

<?php # date_registre ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Date_registre"); ?></label>
        <div class="col-sm-8">                    
            <input type="date_registre" name="date_registre" class="form-control"  id="date_registre" placeholder="date_registre" value="<?php echo "$gallery[date_registre]"; ?>" disabled="" >
        </div>	
    </div>
<?php # date_registre ?>

<?php # order_by ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Order_by"); ?></label>
        <div class="col-sm-8">                    
            <input type="order_by" name="order_by" class="form-control"  id="order_by" placeholder="order_by" value="<?php echo "$gallery[order_by]"; ?>" disabled="" >
        </div>	
    </div>
<?php # order_by ?>

<?php # status ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Status"); ?></label>
        <div class="col-sm-8">                    
            <input type="status" name="status" class="form-control"  id="status" placeholder="status" value="<?php echo "$gallery[status]"; ?>" disabled="" >
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

