<?php 
$lock = ( users_field_contact_id('status', $contact['id']) == 0 ) ? '<span class="glyphicon glyphicon-ban-circle"></span>' :""; 
?>
<h3>
    <?php echo $lock; ?> User blocked
</h3>

<p><?php _t("This user is locked, he cannot enter the system, if you want to allow him access again, unlock him"); ?></p>




<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#ok_unblock_user">
    <?php echo _tr("Unlock now"); ?>
</button>


<div class="modal fade" id="ok_unblock_user" tabindex="-1" role="dialog" aria-labelledby="ok_unblock_userLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="ok_unblock_userLabel">
                    <?php echo _tr("Atention"); ?>
                </h4>
            </div>
            <div class="modal-body">
                <?php
                include "form_user_unblock.php";
                ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>




