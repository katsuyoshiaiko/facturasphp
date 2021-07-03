<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="updates">
    <input type="hidden" name="a" value="deleteOk">
    <input type="hidden" name="id" value="<?php echo "$id"; ?>">
    


    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Id"); ?></label>
        <div class="col-sm-8">                    
            <input type="id" name="id" class="form-control"  id="id" placeholder="id" value="<?php echo "$updates[id]"; ?>" disabled="" >
        </div>	
    </div>
<div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Date"); ?></label>
        <div class="col-sm-8">                    
            <input type="date" name="date" class="form-control"  id="date" placeholder="date" value="<?php echo "$updates[date]"; ?>" disabled="" >
        </div>	
    </div>
<div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Version"); ?></label>
        <div class="col-sm-8">                    
            <input type="version" name="version" class="form-control"  id="version" placeholder="version" value="<?php echo "$updates[version]"; ?>" disabled="" >
        </div>	
    </div>
<div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Name"); ?></label>
        <div class="col-sm-8">                    
            <input type="name" name="name" class="form-control"  id="name" placeholder="name" value="<?php echo "$updates[name]"; ?>" disabled="" >
        </div>	
    </div>
<div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Description"); ?></label>
        <div class="col-sm-8">                    
            <input type="description" name="description" class="form-control"  id="description" placeholder="description" value="<?php echo "$updates[description]"; ?>" disabled="" >
        </div>	
    </div>
<div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Code_install"); ?></label>
        <div class="col-sm-8">                    
            <input type="code_install" name="code_install" class="form-control"  id="code_install" placeholder="code_install" value="<?php echo "$updates[code_install]"; ?>" disabled="" >
        </div>	
    </div>
<div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Code_uninstall"); ?></label>
        <div class="col-sm-8">                    
            <input type="code_uninstall" name="code_uninstall" class="form-control"  id="code_uninstall" placeholder="code_uninstall" value="<?php echo "$updates[code_uninstall]"; ?>" disabled="" >
        </div>	
    </div>
<div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Code_check"); ?></label>
        <div class="col-sm-8">                    
            <input type="code_check" name="code_check" class="form-control"  id="code_check" placeholder="code_check" value="<?php echo "$updates[code_check]"; ?>" disabled="" >
        </div>	
    </div>
<div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Installed"); ?></label>
        <div class="col-sm-8">                    
            <input type="installed" name="installed" class="form-control"  id="installed" placeholder="installed" value="<?php echo "$updates[installed]"; ?>" disabled="" >
        </div>	
    </div>




    <div class="form-group">
        <label class="control-label col-sm-2" for=""></label>
        <div class="col-sm-8">    
            <input class="btn btn-primary active" type ="submit" value ="<?php _t("Delete"); ?>">
        </div>      							
    </div>      							

</form>

