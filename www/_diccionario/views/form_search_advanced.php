<form class="form-horizontal" action="index.php" method="get" >
    <input type="hidden" name="c" value="_diccionario">
    <input type="hidden" name="a" value="search_advancedOk">
    
    
   

    <?php # content ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Content"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="content" class="form-control"  id="content" placeholder="content" value="">
        </div>	
    </div>
<?php # content ?>

<?php # language ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Language"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="language" class="form-control"  id="language" placeholder="language" value="">
        </div>	
    </div>
<?php # language ?>

<?php # translation ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Translation"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="translation" class="form-control"  id="translation" placeholder="translation" value="">
        </div>	
    </div>
<?php # translation ?>

<?php # order_by ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Order_by"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="order_by" class="form-control"  id="order_by" placeholder="order_by" value="">
        </div>	
    </div>
<?php # order_by ?>

<?php # status ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Status"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="status" class="form-control"  id="status" placeholder="status" value="">
        </div>	
    </div>
<?php # status ?>






    <div class="form-group">
        <label class="control-label col-sm-2" for=""></label>
        <div class="col-sm-8">    
            <input class="btn btn-primary active" type ="submit" value ="<?php _t("Save"); ?>">
        </div>      							
    </div>      							

</form>
