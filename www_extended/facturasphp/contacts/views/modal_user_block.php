<p><?php echo _t("The user can currently enter the system, if he blocks it he will no longer be able to enter it, are you sure he wants to block it?"); ?></p>

<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#ok_block_user">
    <?php echo _tr("Block now"); ?>
</button>


<div class="modal fade" id="ok_block_user" tabindex="-1" role="dialog" aria-labelledby="ok_block_userLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="ok_block_userLabel">
                    <?php echo _tr("Atention"); ?>
                </h4>
            </div>
            <div class="modal-body">
                <?php
                include "form_user_block.php";
                ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>




