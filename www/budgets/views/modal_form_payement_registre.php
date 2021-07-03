<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_form_payement_registre">
    <?php _t("Registre payement"); ?>
</button>

<!-- Modal -->
<div class="modal fade" id="modal_form_payement_registre" tabindex="-1" role="dialog" aria-labelledby="modal_form_payement_registreLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="modal_form_payement_registreLabel"><?php _t("Registre payement"); ?></h4>
            </div>
            <div class="modal-body">
                <?php
                include "form_payement_registre.php";
                ?>
            </div>
            <div class="modal-footer">
               
                
            </div>
        </div>
    </div>
</div>