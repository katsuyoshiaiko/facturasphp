<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-lg-3">
        <?php include view("config", "izq"); ?>
    </div>

    <div class="col-lg-9">
        <?php include view("config", "nav"); ?>


        <?php      
        if ($m) {
            foreach ($m as $key => $value) {
                message("info", "$value");
            }
        }
        ?>
        
        <h1><?php _t("My web site"); ?></h1>

        <form class="form-inline" method="post" action="index.php">
            <input type="hidden" name="c" value="config">
            <input type="hidden" name="a" value="ok_web_update">            
                
            
            <div class="form-group">
                <label class="sr-only" for="web">Web</label>
                <div class="input-group">                    
                    
                    <input 
                        type="text" 
                        class="form-control" 
                        id="web" 
                        name="web" 
                        placeholder="factux.be" 
                        value="<?php echo _options_option('config_company_url'); ?>">                                        
                </div>
            </div>
            
            <button type="submit" class="btn btn-primary"><?php _t("Update");?></button>
        </form>
        
        
        
        


    </div>
</div>

<?php include view("home", "footer"); ?> 

