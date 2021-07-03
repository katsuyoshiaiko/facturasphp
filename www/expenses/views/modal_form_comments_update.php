<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_form_comments_update">
    <span class="glyphicon glyphicon-pencil"></span> <?php _t("Edit"); ?>
</button>


<div class="modal fade" id="modal_form_comments_update" tabindex="-1" role="dialog" aria-labelledby="modal_form_comments_updateLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="modal_form_comments_updateLabel"><?php _t("Edit comments");  ?></h4>
            </div>
            <div class="modal-body">
                <?php
                include "form_comments_update.php";
                ?>
            </div>
           
            
        </div>
    </div>
</div>