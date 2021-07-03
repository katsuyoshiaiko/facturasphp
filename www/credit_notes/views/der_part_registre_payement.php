<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">
            <a name="registrePayments"></a>
                <?php _t("Registre payments") ; ?>
        </h3>
    </div>
    <div class="panel-body">


        <?php
        if ( ! banks_list_by_contact_id(contacts_field_id("owner_id" , $u_id)) ) {
            Message("info" , "Please add a bank account") ;
        } else {
            include "modal_form_payement_registre.php" ;
        }
        
        ?>
    </div>
</div>