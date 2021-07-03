<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="permissions">
    <input type="hidden" name="a" value="editOk">
    <input type="hidden" name="id" value="<?php echo "$id"; ?>">
    


    <?php # rol ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="rol"><?php _t("Rol"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="rol" class="form-control"  id="rol" placeholder="rol" value="<?php echo "$permissions[rol]"; ?>" >
        </div>	
    </div>
<?php # /rol ?>

<?php # controller ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="controller"><?php _t("Controller"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="controller" class="form-control"  id="controller" placeholder="controller" value="<?php echo "$permissions[controller]"; ?>" >
        </div>	
    </div>
<?php # /controller ?>

<?php # crud ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="crud"><?php _t("Crud"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="crud" class="form-control"  id="crud" placeholder="crud" value="<?php echo "$permissions[crud]"; ?>" >
        </div>	
    </div>
<?php # /crud ?>





    <div class="form-group">
        <label class="control-label col-sm-2" for=""></label>
        <div class="col-sm-8">    
            <input class="btn btn-primary active" type ="submit" value ="<?php _t("Edit"); ?>">
        </div>      							
    </div>      							

</form>

