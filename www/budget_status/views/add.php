<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-sm-3 col-md-3 col-lg-3">
        <?php //include view("budget_status", "add"); ?>
    </div>

    <div class="col-sm-6 col-md-6 col-lg-6">

        <h1>
            <i class="fas fa-map-marker"></i>
            <?php _t("Add budget_status"); ?>
        </h1>


        <?php //include "form_add.php"; ?>
        <?php include view("budget_status", "form_add"); ?>


    </div>

    <div class="col-sm-3 col-md-3 col-lg-3">

        <?php // include "der.php"; ?>
        <?php // include view("budget_status", "der"); ?>
        
    </div>
</div>


<?php // include("www/home/views/footer.php"); ?>  
<?php include view("home", "footer"); ?>

