<form method="post" action="index.php">
    <div class="form-group">
        <label for="rol"><?php echo _t("Login"); ?></label>
        <input type="text" name="login" class="form-control" id="login"  value="<?php echo users_field_contact_id("login", $id); ?>" disabled="" >
    </div>
    <div class="form-group">
        <label for="rol"><?php echo _t("Rol"); ?></label>
        <input type="text" name="rol" class="form-control" id="rol"  value="<?php echo users_field_contact_id("rol", $id); ?>" disabled="" >
    </div>
</form>






<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#add_user_to_system_ok">
    <?php echo _tr("Change password"); ?>
</button>


<div class="modal fade" id="add_user_to_system_ok" tabindex="-1" role="dialog" aria-labelledby="add_user_to_system_okLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="add_user_to_system_okLabel">
                    <?php echo _tr("Change password"); ?>
                </h4>
            </div>
            <div class="modal-body">
                <?php
                include "form_update_password.php";
                ?>
            </div>

        </div>
    </div>
</div>





<button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#change_rol">
    <?php echo _tr("Change rol"); ?>
</button>


<div class="modal fade" id="change_rol" tabindex="-1" role="dialog" aria-labelledby="change_rolLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="change_rolLabel">
                    <?php echo _tr("Change rol"); ?>
                </h4>
            </div>
            <div class="modal-body">
                <?php
                include "form_update_rol.php";
                ?>
            </div>
           
            
        </div>
    </div>
</div>




