<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="_options">
    <input type="hidden" name="a" value="addOk">

<?php # option ?>
     <div class="form-group">
        <label class="control-label col-sm-2" for="option"><?php _t("Option"); ?></label>
        <div class="col-sm-8">
         <select  name="option" class="form-control" id="option">                                
                <?php _select("","", array(), array()); ?>                        
                </select>
       </div>	
    </div>
<?php # /option ?>

<?php # data ?>
     <div class="form-group">
        <label class="control-label col-sm-2" for="data"><?php _t("Data"); ?></label>
        <div class="col-sm-8">
          <input type="text"  name="data" class="form-control" id="data" placeholder=" - defecto">
       </div>	
    </div>
<?php # /data ?>

<?php # group ?>
     <div class="form-group">
        <label class="control-label col-sm-2" for="group"><?php _t("Group"); ?></label>
        <div class="col-sm-8">
          <input type="text"  name="group" class="form-control" id="group" placeholder=" - defecto">
       </div>	
    </div>
<?php # /group ?>

  
    <div class="form-group">
        <label class="control-label col-sm-2" for=""></label>
        <div class="col-sm-8">    
            <input class="btn btn-primary active" type ="submit" value ="<?php _t("Save"); ?>">
        </div>      							
    </div>      							

</form>
