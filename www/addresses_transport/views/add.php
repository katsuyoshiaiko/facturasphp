<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-sm-3 col-md-3 col-lg-3">
 <?php //include "izq.php"; ?></div>

    <div class="col-sm-6 col-md-6 col-lg-6">

        <h1>
            <?php _menu_icon("top" , 'addresses_transport'); ?>
            <?php _t("Add addresses_transport"); ?>
        </h1>

        <?php include "form_add.php"; ?>
    </div>

    <div class="col-sm-3 col-md-3 col-lg-3">
    
            <?php // include "der.php"; ?>
        
    </div>
</div>


 
<?php include view("home", "footer"); ?>

