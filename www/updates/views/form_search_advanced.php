<form class="form-horizontal" action="index.php" method="get" >
    <input type="hidden" name="c" value="updates">
    <input type="hidden" name="a" value="search_advancedOk">
    
    
   

    <?php # date ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Date"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="date" class="form-control"  id="date" placeholder="date" value="">
        </div>	
    </div>
<?php # date ?>

<?php # version ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Version"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="version" class="form-control"  id="version" placeholder="version" value="">
        </div>	
    </div>
<?php # version ?>

<?php # name ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Name"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="name" class="form-control"  id="name" placeholder="name" value="">
        </div>	
    </div>
<?php # name ?>

<?php # description ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Description"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="description" class="form-control"  id="description" placeholder="description" value="">
        </div>	
    </div>
<?php # description ?>

<?php # code_install ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Code_install"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="code_install" class="form-control"  id="code_install" placeholder="code_install" value="">
        </div>	
    </div>
<?php # code_install ?>

<?php # code_uninstall ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Code_uninstall"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="code_uninstall" class="form-control"  id="code_uninstall" placeholder="code_uninstall" value="">
        </div>	
    </div>
<?php # code_uninstall ?>

<?php # code_check ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Code_check"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="code_check" class="form-control"  id="code_check" placeholder="code_check" value="">
        </div>	
    </div>
<?php # code_check ?>

<?php # installed ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Installed"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="installed" class="form-control"  id="installed" placeholder="installed" value="">
        </div>	
    </div>
<?php # installed ?>






    <div class="form-group">
        <label class="control-label col-sm-2" for=""></label>
        <div class="col-sm-8">    
            <input class="btn btn-primary active" type ="submit" value ="<?php _t("Save"); ?>">
        </div>      							
    </div>      							

</form>
