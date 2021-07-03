<?php include view("home", "header"); ?>

<div class="row">
    <div class="col-lg-3">
        <?php //include "izq.php"; ?>
    </div>

    <div class="col-lg-6">

        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>

        <div class="panel panel-default">
            <div class="panel-body">

                <h1>check_is_ho</h1>

                <a href="index.php?c=home&a=add_ofice">next</a>              
            </div>
        </div>

    </div>
    <div class="col-lg-3">
        <?php //include "izq.php"; ?>
    </div>
</div>

<?php include view("home", "footer"); ?>