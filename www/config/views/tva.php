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
        
        $disabled = (invoices_list() )? " disabled ": "" ; 
        
        ?>
        
        <h1><?php _t("My VAT number"); ?></h1>

        <form class="form-inline" method="post" action="index.php">
            <input type="hidden" name="c" value="config">
            <input type="hidden" name="a" value="ok_tva_update">            
                
            
            <div class="form-group">
                <label class="sr-only" for="tva">tva</label>
                <div class="input-group">                    
                    
                    <input 
                        type="text" 
                        class="form-control" 
                        id="tva" 
                        name="tva" 
                        placeholder="BE123456789" 
                        value="<?php echo _options_option('config_company_tva')?>"
                        <?php echo $disabled; ?>
                        >                                        
                </div>
            </div>
            
            <button type="submit" class="btn btn-sm btn-primary" <?php echo $disabled; ?>><?php _t("Update");?></button>
        </form>
        
        <p><?php _t("Please use only numbers and capital letters");?></p>
        
        <?php 
        if( $disabled ){
            message('info', "If there are invoices you can no longer change your VAT"); 
        }
        ?>



    </div>
</div>

<?php include view("home", "footer"); ?> 

