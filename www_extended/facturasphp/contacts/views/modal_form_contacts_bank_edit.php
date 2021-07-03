

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal_<?php echo "$banks_list_by_contact_id[id]"; ?>">
    <?php _t("Edit"); ?>
</button>
<!-- Modal -->
<div class="modal fade" id="myModal_<?php echo "$banks_list_by_contact_id[id]"; ?>" tabindex="-1" role="dialog" aria-labelledby="myModal_<?php echo "$banks_list_by_contact_id[id]"; ?>Label">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModal_<?php echo "$banks_list_by_contact_id[id]"; ?>Label">
                    <?php _t("Edit bank info"); ?>
                </h4>
            </div>
            <div class="modal-body">

                <?php
                if (permissions_has_permission($u_rol, "banks", "update")) {
                    include "form_contacts_bank_edit.php";
                }
                ?>
            </div>                                                                               
        </div>
    </div>
</div>


