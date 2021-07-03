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
        
        <h1><?php _t("Invoices expiration days"); ?></h1>
        
        <p>
            <?php _t("Maximun days to which you want to recive the payment counted from the invoice date"); ?>
        </p>    
        
        

        <form class="form-inline" method="post" action="index.php">
            <input type="hidden" name="c" value="config">
            <input type="hidden" name="a" value="ok_invoices_expiration_days">            
                
            
            <div class="form-group">
                <label class="sr-only" for="data">data</label>
                <div class="input-group">                    
                    
                    <input 
                        type="text" 
                        class="form-control" 
                        id="data" 
                        name="data" 
                        placeholder="" 
                        value="<?php echo _options_option('config_invoices_expiration_days'); ?>"> 
                    
                    <div class="input-group-addon"><?php _t("days"); ?></div>
                    
                    
                </div>
                
            </div>
            
            <button type="submit" class="btn btn-primary"><?php _t("Update");?></button>
        </form>
        
        
        
        


    </div>
</div>

<?php include view("home", "footer"); ?> 

