

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="contacts_directory_add">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="contacts_directory_add"><?php _t("Add new data"); ?></h4>
            </div>
            <div class="modal-body">
                <?php include "form_contacts_directory_add.php"; ?>
            </div>


        </div>
    </div>
</div>




<div class="panel panel-primary">
    <div class="panel-heading"><?php _t("Users"); ?></div>
    <div class="panel-body">

        <?php
        if (permissions_has_permission($u_rol, "users", "update")) {


            // en la tabla employee no existe no se le puede dar un suario 
            if (employees_by_company_contact(contacts_field_id("owner_id", $id), $id)) {
                /*
                 * Solo si es empleado puede tener un login 
                 */

                // vardump(users_according_contact_id($id));

                if (users_according_contact_id($id)) {
                    include "form_login_have.php";
                } else {
                    if (directory_list_by_contact_name($id, "email")) {
                        include "modal_form_login_add.php";
                    } else {
                        echo message("info", "This contact does not have a valid email, please add it first");
                    }
                }
            } else {
                echo message("info", "Only emplyees can has access to the system");
            }
        } else {
            echo message("info", "This contact does not have a valid email, please add it first");
        }
        ?>
    </div>
</div>



<?php if (users_according_contact_id($contact['id'])) { ?>

    <div class="panel panel-primary">
        <div class="panel-heading"><?php _t("Access to system"); ?></div>
        <div class="panel-body">

            <?php
            if (contacts_field_id('status', contacts_work_at($id)) <= 0) {
                message('info', "The office is not actived");
            }

            switch (users_field_contact_id('status', $contact['id'])) {

                case -1: // bloqueado
                    include "modal_user_unblock.php";
                    break;

                case 0: // Wait                                
                    include "modal_user_approve.php";
                    // include "modal_user_unblock.php";
                    break;

                case 1: // on line
                    include "modal_user_block.php";
                    break;

                default:
                    break;
            }


            if (users_field_contact_id('status', $contact['id']) == 0) {
                //  include "modal_user_unblock.php";
            } else {
                //  include "modal_user_block.php";
            }
            ?>
        </div>
    </div>
<?php }
?>

