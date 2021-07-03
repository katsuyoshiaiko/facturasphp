<?php include view("home", "header"); ?> 

<div class="row">
    <div class="col-sm-3 col-md-3 col-lg-3">
        <?php // include view("magia", "izq"); ?>
    </div>

    <div class="col-sm-6 col-md-6 col-lg-6">

        <h1>
            <i class="fas fa-language"></i>
            <?php _t("magia details"); ?>
        </h1>
        <hr>
        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>


        <?php // include "form_details.php"; ?>
        <?php include view("magia", "form_details"); ?>


        <hr>
        <h2>GET</h2>

        $<?php echo "$magia[campo]"; ?> = (isset($_GET["<?php echo "$magia[campo]"; ?>"])) ? clean($_GET["<?php echo "$magia[campo]"; ?>"]) : false;

        <h2>POST</h2>        
        $<?php echo "$magia[campo]"; ?> = (isset($_POST["<?php echo "$magia[campo]"; ?>"])) ? clean($_POST["<?php echo "$magia[campo]"; ?>"]) : false;


        <h2>REQUEST</h2>        
        $<?php echo "$magia[campo]"; ?> = (isset($_REQUEST["<?php echo "$magia[campo]"; ?>"])) ? clean($_REQUEST["<?php echo "$magia[campo]"; ?>"]) : false;


        <hr>

        <h2>CREATE</h2>
       <textarea cols="100" rows="20">
        <&#63;php # <?php echo "$magia[campo]"; ?> ?>
        <div class="form-group">
            <label class="control-label col-sm-2" for="<?php echo "$magia[id]"; ?>"><&#63;php _t("<?php echo "$magia[label]"; ?>"); ?></label>
            <div class="col-sm-8">                    
                <input 
                    type="<?php echo "$magia[tipo]"; ?>" 
                    name="<?php echo "$magia[nombre]"; ?>" 
                    class="<?php echo "$magia[clase]"; ?>"  
                    id="<?php echo "$magia[identificador]"; ?>" 
                    placeholder="<&#63;php _t('<?php echo "$magia[marca_agua]"; ?>'); ?>"                     
                    value"<?php echo ($magia['valor'])?' <&#63;php echo "'.$magia['valor'].'"; ?> ':'';?>"                     
                    <?php echo ($magia['desactivado'])?' disabled="" ':'';?> 
                    <?php echo ($magia['solo_lectura'])?' readonly="" ':'';?>                                        
                    <?php echo ($magia['obligatorio'])?' required="" ':'';?>                                        
                    >                                
            </div>	
        </div>
        <&#63;php # /<?php echo "$magia[campo]"; ?> ?>
        </textarea>
        
        
        
        
        
        <h2>Update</h2>
        <textarea cols="100" rows="20">
        <&#63;php # <?php echo "$magia[campo]"; ?> ?>
        <div class="form-group">
            <label class="control-label col-sm-2" for="<?php echo "$magia[id]"; ?>"><&#63;php _t("<?php echo "$magia[label]"; ?>"); ?></label>
            <div class="col-sm-8">                    
                <input 
                    type="<?php echo "$magia[tipo]"; ?>" 
                    name="<?php echo "$magia[nombre]"; ?>" 
                    class="<?php echo "$magia[clase]"; ?>"  
                    id="<?php echo "$magia[identificador]"; ?>" 
                    placeholder="<&#63;php _t('<?php echo "$magia[marca_agua]"; ?>'); ?>"                     
                    value"<?php echo ($magia['valor'])?' <&#63;php echo "'.$magia['valor'].'"; ?> ':'';?>"                     
                    <?php echo ($magia['desactivado'])?' disabled="" ':'';?> 
                    <?php echo ($magia['solo_lectura'])?' readonly="" ':'';?>                                        
                    <?php echo ($magia['obligatorio'])?' required="" ':'';?>                                        
                    >                                
            </div>	
        </div>
        <&#63;php # /<?php echo "$magia[campo]"; ?> ?>
        </textarea>

        <hr>

        <h2>EDIT</h2>
        <textarea cols="100" rows="20">

        <&#63;php # <?php echo "$magia[campo]"; ?> ?>
        <div class="form-group">
            <label class="control-label col-sm-2" for="<?php echo "$magia[id]"; ?>"><&#63;php _t("<?php echo "$magia[label]"; ?>"); ?></label>
            <div class="col-sm-8">                    
                <input 
                    type="<?php echo "$magia[tipo]"; ?>" 
                    name="<?php echo "$magia[nombre]"; ?>" 
                    class="<?php echo "$magia[clase]"; ?>"  
                    id="<?php echo "$magia[identificador]"; ?>" 
                    placeholder="<&#63;php _t('<?php echo "$magia[marca_agua]"; ?>'); ?>" 
                    value="<&#63;php echo <?php echo "$magia[valor]"; ?>; ?>" 
                    <?php echo ($magia['desactivado'])?' disabled="" ':'';?> 
                    <?php echo ($magia['solo_lectura'])?' readonly="" ':'';?>                                        
                    >                                
            </div>	
        </div>
        <&#63;php # /<?php echo "$magia[campo]"; ?> ?>

        </textarea>


    </div>

    <div class="col-sm-3 col-md-3 col-lg-3">

        <?php // include "der.php";  ?>
    </div>
</div>


<?php // include("www/home/views/footer.php"); ?>  
<?php include view("home", "footer"); ?>

