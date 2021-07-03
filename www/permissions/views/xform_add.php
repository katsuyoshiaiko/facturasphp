<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="permissions">
    <input type="hidden" name="a" value="addOk">

<?php # rol ?>
     <div class="form-group">
        <label class="control-label col-sm-2" for="rol"><?php _t("Rol"); ?></label>
        <div class="col-sm-8">
         <select  name="rol" class="form-control" id="rol">                                
                <?php _select("","", array(), array()); ?>                        
                </select>
       </div>	
    </div>
<?php # /rol ?>

<?php # controller ?>
     <div class="form-group">
        <label class="control-label col-sm-2" for="controller"><?php _t("Controller"); ?></label>
        <div class="col-sm-8">
         <select  name="controller" class="form-control" id="controller">                                
                <?php _select("","", array(), array()); ?>                        
                </select>
       </div>	
    </div>
<?php # /controller ?>

<?php # crud ?>
     <div class="form-group">
        <label class="control-label col-sm-2" for="crud"><?php _t("Crud"); ?></label>
        <div class="col-sm-8">
          <input type="text"  name="crud" class="form-control" id="crud" placeholder=" - defecto">
       </div>	
    </div>
<?php # /crud ?>

  
    <div class="form-group">
        <label class="control-label col-sm-2" for=""></label>
        <div class="col-sm-8">    
            <input class="btn btn-primary active" type ="submit" value ="<?php _t("Save"); ?>">
        </div>      							
    </div>      							

</form>
