<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="directory_names">
    <input type="hidden" name="a" value="editOk">
    <input type="hidden" name="id" value="<?php echo "$id"; ?>">
    


    <?php # name ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="name"><?php _t("Name"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="name" class="form-control"  id="name" placeholder="name" value="<?php echo "$directory_names[name]"; ?>" >
        </div>	
    </div>
<?php # /name ?>

<?php # order ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="order"><?php _t("Order"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="order" class="form-control"  id="order" placeholder="order" value="<?php echo "$directory_names[order]"; ?>" >
        </div>	
    </div>
<?php # /order ?>





    <div class="form-group">
        <label class="control-label col-sm-2" for=""></label>
        <div class="col-sm-8">    
            <input class="btn btn-primary active" type ="submit" value ="<?php _t("Edit"); ?>">
        </div>      							
    </div>      							

</form>

