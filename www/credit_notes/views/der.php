

<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title"><?php _t("Credit note"); ?> <?php // _t("Extended  ") ;    ?></h3>
    </div>
    <div class="panel-body">
        <table class="table table-striped">
            <tr>
                <td><?php _t("Number"); ?></td><td><?php echo ($id); ?></td>
            </tr>


            <tr>
                <td><?php _t("Invoice"); ?></td>
                <td>
                    <a href="index.php?c=invoices&a=details&id=<?php echo $credit_notes['invoice_id']; ?>">
                        <?php echo $credit_notes['invoice_id']; ?>
                    </a>
                </td>
            </tr>



            <tr>
                <td><?php _t("Date"); ?></td>
                <td><?php echo $credit_notes['date']; ?></td>
            </tr>

            <tr>
                <td><?php _t("Registre date"); ?></td>
                <td><?php echo $credit_notes['date_registre']; ?></td>
            </tr>

            <tr>
                <td><?php _t("Status"); ?></td>
                <td>
                    <?php echo _tr(credit_notes_status_by_status($credit_notes["status"])); ?>
                </td>
            </tr>


            <tr>
                <td>
                    <?php _t("Client"); ?>
                </td>                
                <td>
                    <a href="index.php?c=contacts&a=details&id=<?php echo $credit_notes['client_id']; ?>">
                        <?php echo contacts_formated($credit_notes["client_id"]); ?>
                    </a>
                </td>                    
            </tr>






            </tr>


        </table>
    </div>
</div>


<?php
//  10
//  20
// -10

/**
 * 
 */
if (permissions_has_permission($u_rol, "credit_notes", "update")) {

    switch ($credit_notes['status']) {
        case 10: // Registred
            include "der_part_payement_list.php";
            include "der_part_registre_payement.php";

            //include "modal_form_payement_registre.php";   
            //    include "der_part_send.php"; 
            //    include "der_part_accept.php"; 
            //    include "der_part_reject.php"; 
            include "der_part_cancel.php";
            //  include "der_part_send_by_email.php"; 
            break;
        case 20: // Money returned
            include "der_part_payement_list.php";

            //    include "der_part_accept.php"; 
            //    include "der_part_reject.php";         
            //    include "der_part_change_status.php"; 
            //include "der_part_send_by_email.php"; 
            break;
        case -10: // Cancel   
            // include "der_part_send_by_email.php"; 
            break;

        default:
            break;
    }
}
?>


