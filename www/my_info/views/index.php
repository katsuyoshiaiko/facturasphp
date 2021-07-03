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
            <span class="glyphicon glyphicon-user" ></span> 
            <?php _t("My info"); ?>
        </h1>
        
        <?php include "form_my_info.php"; ?>
        

        

    </div>
</div>

<?php include view("home", "footer"); ?>  



