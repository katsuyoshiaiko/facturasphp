<form class="form-horizontal" action="index.php" method="get" >
    <input type="hidden" name="c" value="_options">
    <input type="hidden" name="a" value="search_advancedOk">
    
    
   

    <?php # option ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Option"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="option" class="form-control"  id="option" placeholder="option" value="">
        </div>	
    </div>
<?php # option ?>

<?php # data ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Data"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="data" class="form-control"  id="data" placeholder="data" value="">
        </div>	
    </div>
<?php # data ?>

<?php # group ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Group"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="group" class="form-control"  id="group" placeholder="group" value="">
        </div>	
    </div>
<?php # group ?>






    <div class="form-group">
        <label class="control-label col-sm-2" for=""></label>
        <div class="col-sm-8">    
            <input class="btn btn-primary active" type ="submit" value ="<?php _t("Save"); ?>">
        </div>      							
    </div>      							

</form>
