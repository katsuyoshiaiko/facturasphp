<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title"><?php _t("Actions") ; ?></h3>
    </div>
    <div class="panel-body">
        
        <p><?php _t("If you want to cancel this credit_note, you can do it here"); ?></p>

        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#cancel">
            <span class="glyphicon glyphicon-remove"></span>
            <?php _t("Cancel") ; ?>
        </button>

    </div>
</div>



<div class="modal fade" id="cancel" tabindex="-1" role="dialog" aria-labelledby="cancelLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="cancelLabel"><?php _t("Cancel") ; ?></h4>
            </div>
            <div class="modal-body">

                <h1><?php _t("Credit note number"); ?> : <?php echo $id; ?></h1>
                <p><?php _t("Really want to cancel"); ?></p>
                
                <?php include "form_cancel.php"; ?>
                
                

            </div>
        </div>
    </div>
</div>
