<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="directory_names">
    <input type="hidden" name="a" value="addOk">

<?php # name ?>
     <div class="form-group">
        <label class="control-label col-sm-2" for="name"><?php _t("Name"); ?></label>
        <div class="col-sm-8">
         <select  name="name" class="form-control" id="name">                                
                <?php _select("","", array(), array()); ?>                        
                </select>
       </div>	
    </div>
<?php # /name ?>

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
