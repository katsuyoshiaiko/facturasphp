<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-lg-3">
        <?php include view("export", "izq"); ?>
    </div>

    <div class="col-lg-9">
        <?php include view("export", "nav"); ?>


        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>

        <h1><?php _t("Contacts"); ?></h1>




        <form class="form-horizontal" target="_new" action="index.php" method="get">
            <input type="hidden" name="c" value="contacts">
            <input type="hidden" name="a" value="export_all_pdf">
            

            <div class="form-group">
                <label for="year" class="col-sm-2 control-label">
                    <?php _t("Contacts"); ?>
                </label>
                <div class="col-sm-10">
                    <select class="form-control" name="contact">                                                                      
                        <option value="all"><?php _t("All"); ?></option>
                    </select>
                </div>
            </div>



            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-default">
                        <?php _t("Export"); ?>
                    </button>
                </div>
            </div>
        </form>


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

