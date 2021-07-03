<form class="form-horizontal" action="index.php" method="get" >
    <input type="hidden" name="c" value="directory_names">
    <input type="hidden" name="a" value="search_advancedOk">
    
    
   

    <?php # name ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Name"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="name" class="form-control"  id="name" placeholder="name" value="">
        </div>	
    </div>
<?php # name ?>

<?php # order ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Order"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="order" class="form-control"  id="order" placeholder="order" value="">
        </div>	
    </div>
<?php # order ?>






    <div class="form-group">
        <label class="control-label col-sm-2" for=""></label>
        <div class="col-sm-8">    
            <input class="btn btn-primary active" type ="submit" value ="<?php _t("Save"); ?>">
        </div>      							
    </div>      							

</form>
