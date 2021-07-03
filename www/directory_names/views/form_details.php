<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="directory_names">
    <input type="hidden" name="a" value="edit">
    <input type="hidden" name="id" value="<?php echo "$id"; ?>">
    


    <?php # id ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Id"); ?></label>
        <div class="col-sm-8">                    
            <input type="id" name="id" class="form-control"  id="id" placeholder="id" value="<?php echo "$directory_names[id]"; ?>" disabled="" >
        </div>	
    </div>
<?php # id ?>

<?php # name ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Name"); ?></label>
        <div class="col-sm-8">                    
            <input type="name" name="name" class="form-control"  id="name" placeholder="name" value="<?php echo "$directory_names[name]"; ?>" disabled="" >
        </div>	
    </div>
<?php # name ?>

<?php # order ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Order"); ?></label>
        <div class="col-sm-8">                    
            <input type="order" name="order" class="form-control"  id="order" placeholder="order" value="<?php echo "$directory_names[order]"; ?>" disabled="" >
        </div>	
    </div>
<?php # order ?>





    <div class="form-group">
        <label class="control-label col-sm-2" for=""></label>
        <div class="col-sm-8">    
            <input class="btn btn-primary active" type ="submit" value ="<?php _t("Edit"); ?>">
        </div>      							
    </div>      							

</form>

