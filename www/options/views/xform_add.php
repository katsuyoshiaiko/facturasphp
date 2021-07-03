<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="options">
    <input type="hidden" name="a" value="addOk">

<?php # option ?>
     <div class="form-group">
        <label class="control-label col-sm-2" for="option"><?php _t("Option"); ?></label>
        <div class="col-sm-8">
          <input type="text"  name="option" class="form-control" id="option" placeholder=" - defecto">
       </div>	
    </div>
<?php # /option ?>

<?php # price ?>
     <div class="form-group">
        <label class="control-label col-sm-2" for="price"><?php _t("Price"); ?></label>
        <div class="col-sm-8">
          <input type="text"  name="price" class="form-control" id="price" placeholder=" - defecto">
       </div>	
    </div>
<?php # /price ?>

<?php # tax ?>
     <div class="form-group">
        <label class="control-label col-sm-2" for="tax"><?php _t("Tax"); ?></label>
        <div class="col-sm-8">
          <input type="text"  name="tax" class="form-control" id="tax" placeholder=" - defecto">
       </div>	
    </div>
<?php # /tax ?>

<?php # order_by ?>
     <div class="form-group">
        <label class="control-label col-sm-2" for="order_by"><?php _t("Order_by"); ?></label>
        <div class="col-sm-8">
          <input type="text"  name="order_by" class="form-control" id="order_by" placeholder=" - defecto">
       </div>	
    </div>
<?php # /order_by ?>

<?php # status ?>
     <div class="form-group">
        <label class="control-label col-sm-2" for="status"><?php _t("Status"); ?></label>
        <div class="col-sm-8">
          <input type="text"  name="status" class="form-control" id="status" placeholder=" - defecto">
       </div>	
    </div>
<?php # /status ?>

  
    <div class="form-group">
        <label class="control-label col-sm-2" for=""></label>
        <div class="col-sm-8">    
            <input class="btn btn-primary active" type ="submit" value ="<?php _t("Save"); ?>">
        </div>      							
    </div>      							

</form>
