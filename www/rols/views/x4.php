<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="rols">
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

<?php # rango ?>
     <div class="form-group">
        <label class="control-label col-sm-2" for="rango"><?php _t("Rango"); ?></label>
        <div class="col-sm-8">
          <input type="text"  name="rango" class="form-control" id="rango" placeholder=" - defecto">
       </div>	
    </div>
<?php # /rango ?>

<?php # order ?>
     <div class="form-group">
        <label class="control-label col-sm-2" for="order"><?php _t("Order"); ?></label>
        <div class="col-sm-8">
          <input type="text"  name="order" class="form-control" id="order" placeholder=" - defecto">
       </div>	
    </div>
<?php # /order ?>

  
    <div class="form-group">
        <label class="control-label col-sm-2" for=""></label>
        <div class="col-sm-8">    
            <input class="btn btn-primary active" type ="submit" value ="<?php _t("Save"); ?>">
        </div>      							
    </div>      							

</form>
