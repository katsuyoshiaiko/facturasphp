<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="_options">
    <input type="hidden" name="a" value="editOk">
    <input type="hidden" name="id" value="<?php echo "$id"; ?>">
    


    <?php # option ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="option"><?php _t("Option"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="option" class="form-control"  id="option" placeholder="option" value="<?php echo "$_options[option]"; ?>" >
        </div>	
    </div>
<?php # /option ?>

<?php # data ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="data"><?php _t("Data"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="data" class="form-control"  id="data" placeholder="data" value="<?php echo "$_options[data]"; ?>" >
        </div>	
    </div>
<?php # /data ?>

<?php # group ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="group"><?php _t("Group"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="group" class="form-control"  id="group" placeholder="group" value="<?php echo "$_options[group]"; ?>" >
        </div>	
    </div>
<?php # /group ?>





    <div class="form-group">
        <label class="control-label col-sm-2" for=""></label>
        <div class="col-sm-8">    
            <input class="btn btn-primary active" type ="submit" value ="<?php _t("Edit"); ?>">
        </div>      							
    </div>      							

</form>

