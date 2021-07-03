<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="_diccionario">
    <input type="hidden" name="a" value="addOk">

<?php # content ?>
     <div class="form-group">
        <label class="control-label col-sm-2" for="content"><?php _t("Content"); ?></label>
        <div class="col-sm-8">
          <input type="text"  name="content" class="form-control" id="content" placeholder=" - defecto">
       </div>	
    </div>
<?php # /content ?>

<?php # language ?>
     <div class="form-group">
        <label class="control-label col-sm-2" for="language"><?php _t("Language"); ?></label>
        <div class="col-sm-8">
          <input type="text"  name="language" class="form-control" id="language" placeholder=" - defecto">
       </div>	
    </div>
<?php # /language ?>

<?php # translation ?>
     <div class="form-group">
        <label class="control-label col-sm-2" for="translation"><?php _t("Translation"); ?></label>
        <div class="col-sm-8">
          <input type="text"  name="translation" class="form-control" id="translation" placeholder=" - defecto">
       </div>	
    </div>
<?php # /translation ?>

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
