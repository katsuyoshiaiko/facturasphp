<?php include view("home", "header"); ?> 
<div class="row">
    <div class="col-sm-3 col-md-3 col-lg-3">
        <?php //include view("expenses", "der"); ?> 
    </div>
    <div class="col-sm-6 col-md-6 col-lg-6">
        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>

        <div class="panel panel-default">
            <div class="panel-body">
                <h1><?php _t("Cancel expense"); ?></h1>


                <?php include "form_cancel.php"; ?>


                </div>
            </div>
        </div>
        <div class="col-sm-4 col-md-4 col-lg-4">
    <?php //include view("expenses", "der");  ?> 
        </div>
    </div>
    <?php include view("home", "footer"); ?>