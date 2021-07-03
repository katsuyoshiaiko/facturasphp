<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-lg-3">
        <?php include view("doc_models", "izq"); ?>
    </div>

    <div class="col-lg-9">
       <?php include view("doc_models", "nav"); ?>


        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>



        

        <?php 
        include view("doc_models", "table_index"); 
        ?>


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

