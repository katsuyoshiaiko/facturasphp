<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-lg-3">
 <?php include view("_options_options", "izq"); ?>
    </div>

    <div class="col-lg-9">
        <?php include view("_options_options", "nav"); ?>


        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>



<?php 
// https://api.jquery.com/prop/
?><?php include view("_options_options", "table_index"); ?>


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

