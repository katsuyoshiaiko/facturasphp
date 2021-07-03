<?php include view("home" , "header") ; ?>  

<div class="row">
    <div class="col-lg-3">
        <?php include "izq.php"; ; ?>
    </div>

    <div class="col-lg-9">
        <?php include view("budgets" , "nav") ; ?>


        <?php
        if ( $_REQUEST ) {
            foreach ( $error as $key => $value ) {
                message("info" , "$value") ;
            }
        }
        ?>



        <?php
// https://api.jquery.com/prop/
        ?>


        <?php //include "form_make_actions.php"; ?>



        <?php
        // con esto seleciona todo 
        
        /**
         *         <script>
            function sellectAll(source) {
                var checkboxes = document.querySelectorAll('input[type="checkbox"]');
                for (var i = 0; i < checkboxes.length; i++) {
                    if (checkboxes[i] != source)
                        checkboxes[i].checked = source.checked;
                }
            }
        </script>

        <form method="post" action="index.php" class="form-inline">

            <input type="hidden" name="c" value="budgets">
            <input type="hidden" name="a" value="invoice_create">
         */
        ?>

            <?php include "table_index.php" ; ?>

           

        <?php
        /*
         *  <?php
            if ( $status == 30 ) {
                echo "Solo aca" ;
            }
            ?>

            <div class="form-group">
                <label class="sr-only" for="all"></label>
                <input 
                    type="checkbox" 
                    id="all" 
                    onclick="sellectAll(this);" /> 
                        <?php _t("Select all") ; ?>
            </div>



            <div class="form-group">
                <label class="sr-only" for="action"></label>
                <select class="form-control" name="action">

                    <option value=""><?php _t("Create invoice") ; ?></option>

                </select>
            </div>

            <button type="submit" class="btn btn-default"><?php _t("Check") ; ?></button>

        </form>
         * 
         * 
         * 
         * 
          Export:
          <a href="index.php?c=addresses&a=export_json">JSON</a>
          <a href="index.php?c=addresses&a=export_pdf">pdf</a>
         */
        ?>
        
        



    </div>
</div>

<?php include view("home" , "footer") ; ?> 




