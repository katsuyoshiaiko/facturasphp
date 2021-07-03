<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">
            <a name="cancel"></a>
            <?php _t("Cancel") ; ?>
        </h3>
    </div>
    <div class="panel-body">


        <?php
        if ( invoices_field_id("status" , $id) > 0 ) {
            // array_push($error , 'Invoice already cancel') ;
            ?>
            <form action="index.php" method="get" class="form-inline">
                <input type="hidden" name="c" value="invoices">
                <input type="hidden" name="a" value="cancel">
                <input type="hidden" name="id" value="<?php echo $id ; ?>">            
                <button type="submit" class="btn btn-danger">
                    <span class="glyphicon glyphicon-remove"></span>
                    <?php _t("Cancel") ; ?>
                </button>
            </form>
        <?php } else { ?>
            <form action="index.php" method="get" class="form-inline" ac>                           
                <button type="submit" class="btn btn-danger" disabled="">
                    <span class="glyphicon glyphicon-remove"></span>
                    <?php _t("Cancel") ; ?>
                </button>
            </form>
        <?php } ?>



    </div>
</div>



