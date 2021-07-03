<?php
$lock = ( users_field_contact_id('status', $contact['id']) == 0 ) ? '<span class="glyphicon glyphicon-ban-circle"></span>' : "";
?>


<h3>
    <span class="glyphicon glyphicon-hourglass"></span>
    <?php _t("User waiting for approval"); ?>
</h3>

<p><?php _t("This user has registered in the system and is waiting to be approved"); ?></p>




<button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#ok_Approve">
    <?php echo _tr("Approve"); ?>
</button>


<div class="modal fade" id="ok_Approve" tabindex="-1" role="dialog" aria-labelledby="ok_ApproveLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="ok_ApproveLabel">
                    <?php echo _tr("Atention"); ?>
                </h4>
            </div>

            <div class="modal-body">
                <?php
                include "form_user_approve.php";
                ?>
            </div>
        </div>
    </div>
</div>




