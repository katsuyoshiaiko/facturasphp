<?php include view("home", "header"); ?>

<div class="container-fluid">
    <div class="col-lg-4"></div>
    <div class="col-lg-4">

        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }

        include view("home", 'form_forgetPassword');
        ?>
    </div>
    <div class="col-lg-4"></div>
</div>

<?php include view("home", "footer"); ?>