<?php if (modules_field_module('status', 'shoponline')) { ?>
    <?php include view("public_html", "index"); ?>
<?php } else { ?> 
    <?php include view("home", "header"); ?>
    <div class="container-fluid">
        <div class="col-lg-4"></div>
        <div class="col-lg-4"><?php include view("home", "form_login"); ?></div>
        <div class="col-lg-4"></div>
    </div>
    <?php include view("home", "footer"); ?>
<?php } ?>





