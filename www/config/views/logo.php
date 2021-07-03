<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-lg-3">
        <?php include view("config", "izq"); ?>
    </div>

    <div class="col-lg-9">
        <?php include view("config", "nav"); ?>


        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>
        
        <h1><?php _t("Logo"); ?></h1>
            
        <?php 
//        // muestra el logo 
//        $logo = _options_option('config_company_logo');  
//        
//        if(file_exists("www/gallery/img/logos/$logo")){
//            
//            echo '<img src="www/gallery/img/logos/'.$logo.'" alt=""/>'; 
//        }else{
//            echo '<img src="www/gallery/img/logos/factux.jpg" alt=""/>'; 
//        }
        
        logo(); 
        
        
        // formulario 
        // carpeta de destino 
        // tipo de archivos aceptados
        // renombar archivo
        //


        ?>
        
        
        
        
        
<form enctype="multipart/form-data" method="post" action="index.php">

    <input type="hidden" name="c" value="gallery">
    <input type="hidden" name="a" value="ok_logo_add">    
    <input type="hidden" name="order_id" id="id"  value="<?php echo $id; ?>">
    <input type="hidden" name="side" value="<?php echo $side; ?>">
    <input type="hidden" name="redi" value="1">
    <input type="hidden" name="notes" value="null">
    <input type="hidden" name="redi" value="1">


    <div class="form-group">
        <label for="file">Logo (<?php echo _options_option('config_company_logo'); ?>)</label>
        <input type="file" id="file" name="file">

        <p class="help-block"><?php //echo _t("Only these file extensions are accepted");   ?></p>

    </div>  
    <button type="submit" class="btn btn-default"><?php _t("Submit"); ?></button>
</form>





    </div>
</div>

<?php include view("home", "footer"); ?> 

