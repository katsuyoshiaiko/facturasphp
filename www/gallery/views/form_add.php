
<form class="form-horizontal" action="index.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="c" value="gallery">
    <input type="hidden" name="a" value="ok_FilesAdd">

    <?php # file ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="file"><?php _t("File") ; ?></label>
        <div class="col-sm-8">
            <input type="file" id="fileToSend" name="fileToSend">

            <p class="help-block"><?php //echo _t("Only these file extensions are accepted");  ?></p>

            <?php
//        $nf = new update_File_Class(); 
//        $extentions = $nf->get_exts();
//        
//        foreach ($extentions as $key => $extention) {
//            $ex = explode("/", $extention); 
//            
//            if($ex[1] == "plain"){ $ex[1] = "txt"; }
//            
//            
//            echo "<span class=\"label label-info\">.$ex[1]</span> ";
//        }
//        
            ?>
        </div>	
    </div>
    <?php # /file ?>







    <?php # owner_id ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="owner_id"><?php _t("Owner_id") ; ?></label>
        <div class="col-sm-8">
            <input type="text"  name="" class="form-control" id="" placeholder="<?php echo contacts_formated($u_id)?>" disabled="">
        </div>	
    </div>
    <?php # /owner_id ?>

    <?php # name ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="name"><?php _t("Name") ; ?></label>
        <div class="col-sm-8">
            <input type="text"  name="name" class="form-control" id="name" placeholder="<?php _t("File name"); ?>">
        </div>	
    </div>
    <?php # /name ?>

    <?php # title ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="title"><?php _t("Title") ; ?></label>
        <div class="col-sm-8">
            <input type="text"  name="title" class="form-control" id="title" placeholder="<?php _t("File title"); ?>">
        </div>	
    </div>
    <?php # /title ?>

    <?php # description ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="description"><?php _t("Description") ; ?></label>
        <div class="col-sm-8">
            <input type="text"  name="description" class="form-control" id="description" placeholder="<?php _t("File description"); ?>">
        </div>	
    </div>
    <?php # /description ?>

    <?php # alt ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="alt"><?php _t("Alt") ; ?></label>
        <div class="col-sm-8">
            <input type="text"  name="alt" class="form-control" id="alt" placeholder="<?php _t("File alt text"); ?>">
        </div>	
    </div>
    <?php # /alt ?>

    <?php # url ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="url"><?php _t("Url") ; ?></label>
        <div class="col-sm-8">
            <input type="text"  name="url" class="form-control" id="url" placeholder="<?php _t("File url"); ?>">
        </div>	
    </div>
    <?php # /url ?>

    
    <?php # order_by ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="order_by"><?php _t("Order_by") ; ?></label>
        <div class="col-sm-8">
            <input type="text"  name="order_by" class="form-control" id="order_by" placeholder="" value="1">
        </div>	
    </div>
    <?php # /order_by ?>

    <?php # status ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="status"><?php _t("Status") ; ?></label>
        <div class="col-sm-8">
            <input type="text"  name="status" class="form-control" id="status" placeholder="" value="1">
        </div>	
    </div>
    <?php # /status ?>


    <div class="form-group">
        <label class="control-label col-sm-2" for=""></label>
        <div class="col-sm-8">    
            <input class="btn btn-primary active" type ="submit" value ="<?php _t("Save") ; ?>">
        </div>      							
    </div>      							

</form>
