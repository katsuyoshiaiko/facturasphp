<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-lg-0">
        <?php // include view("options", "izq"); ?>
    </div>

    <div class="col-lg-12">
        <?php include view("options", "nav"); ?>


        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>



        <?php
// https://api.jquery.com/prop/
        ?>

        <?php include view("options", "table_index"); ?>


        <?php
        /*
          Export:
          <a href="index.php?c=addresses&a=export_json">JSON</a>
          <a href="index.php?c=addresses&a=export_pdf">pdf</a>
         */
        ?>


    </div>
</div>

<?php include view("home", "footer"); ?> 

