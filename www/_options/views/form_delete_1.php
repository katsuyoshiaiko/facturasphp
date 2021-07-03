<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="_options">
    <input type="hidden" name="a" value="deleteOk">
    <input type="hidden" name="id" value="<?php echo "$id"; ?>">
    


    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Id"); ?></label>
        <div class="col-sm-8">                    
            <input type="id" name="id" class="form-control"  id="id" placeholder="id" value="<?php echo "$_options[id]"; ?>" disabled="" >
        </div>	
    </div>
<div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Option"); ?></label>
        <div class="col-sm-8">                    
            <input type="option" name="option" class="form-control"  id="option" placeholder="option" value="<?php echo "$_options[option]"; ?>" disabled="" >
        </div>	
    </div>
<div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Data"); ?></label>
        <div class="col-sm-8">                    
            <input type="data" name="data" class="form-control"  id="data" placeholder="data" value="<?php echo "$_options[data]"; ?>" disabled="" >
        </div>	
    </div>
<div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Group"); ?></label>
        <div class="col-sm-8">                    
            <input type="group" name="group" class="form-control"  id="group" placeholder="group" value="<?php echo "$_options[group]"; ?>" disabled="" >
        </div>	
    </div>




    <div class="form-group">
        <label class="control-label col-sm-2" for=""></label>
        <div class="col-sm-8">    
            <input class="btn btn-primary active" type ="submit" value ="<?php _t("Delete"); ?>">
        </div>      							
    </div>      							

</form>

