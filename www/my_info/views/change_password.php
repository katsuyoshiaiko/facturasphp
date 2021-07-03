<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
        <?php include view("my_info", "izq"); ?>
    </div>
    
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-9">
         <?php //include view("my_info", "nav"); ?>      

        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>
        
        <h1>
            <span class="glyphicon glyphicon-wrench" ></span> 
            <?php _t("Change password"); ?>
        </h1>
        <p><?php _t("If you change the password you should re-enter with the new password"); ?></p>
        
        <?php 
//        message('info', 'disabled'); 
        
 include "form_change_password.php"; ?>
        
        <p><?php message("Info", "You will need to re-enter with your new password"); ?></p>
        

    </div>
</div>

<?php include view("home", "footer"); ?>  



