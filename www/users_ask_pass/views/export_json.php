<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-lg-0">
        
        <?php include view("users_ask_pass", "izq"); ?>
    </div>

    <div class="col-lg-12">

        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>

        <pre>
            <?php
            echo json_encode($users_ask_pass);
            ?>
        </pre>

    </div>
</div>

<?php include view("home", "footer"); ?>

