<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title"><?php _t("Budget"); ?></h3>
    </div>
    <div class="panel-body">
        <table class="table table-striped">
            <tr>
                <td><?php _t("Number"); ?></td><td><?php echo ($id); ?></td>
            </tr>

            <tr>
                <td><?php _t("Date"); ?></td>
                <td><?php echo budgets_field_id("date", $id); ?></td>
            </tr>
            <tr>
                <td><?php _t("Registre date"); ?></td>
                <td><?php echo budgets_field_id("date_registre", $id); ?></td>
            </tr>

            <tr>
                <td><?php _t("Status"); ?></td>
                <td>
                    <?php echo _tr(budget_status_by_status(budgets_field_id("status", $id))); ?>
                </td>
            </tr>




            <?php if (permissions_has_permission($u_rol, "invoices", "read")) { ?>
                <tr>
                    <td><?php _t("Invoice"); ?></td>
                    <td>
                        <a href="index.php?c=invoices&a=details&id=<?php echo (budgets_invoices_search_invoice_by_budget_id($id)); ?>">
                            <?php invoices_numberf(budgets_invoices_search_invoice_by_budget_id($id)); ?>
                        </a>                       
                    </td>


                </tr>
            <?php } ?>




            <?php if (permissions_has_permission($u_rol, "contacts", "read")) { ?>
                <tr>
                    <td>
                        <?php _t("Client"); ?>
                    </td>                
                    <td>
                        <?php echo $budgets['client_id']; ?> - 
                        <a href="index.php?c=contacts&a=details&id=<?php echo $budgets['client_id']; ?>">
                            <?php echo contacts_formated(budgets_field_id("client_id", $id)); ?>
                        </a>
                    </td>                    
                </tr>
            <?php } ?>



        </table>
    </div>
</div>


<?php
if (
        modules_field_module('status', 'transport') &&
        permissions_has_permission($u_rol, "transport", "read")
) {
    ?>


    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">
                <?php _menu_icon('top', 'transport'); ?>
                <?php _t("Transport"); ?></h3>
        </div>
        <div class="panel-body">


            <table class="table table-striped">

                <tr>
                    <td><?php _t('Transport'); ?></td>
                    <td><?php
                        foreach ($code_transport_in_budgets as $key => $value) {
                            echo "$value ";
                        };
                        ?>
                    </td>
                </tr>

            </table>


        </div>
    </div>

<?php } ?>




<?php
if (permissions_has_permission($u_rol, "budgets", "update")) {
    switch ($budgets['status']) {
        case 10: // Registred
            //    include "der_part_send.php"; 
            include "der_part_accept.php";
            include "der_part_reject.php";
            include "der_part_cancel.php";
            break;

        case 20: //Send to customer
            include "der_part_accept.php";
            include "der_part_reject.php";
            //    include "der_part_change_status.php";         
            break;

        case 30: // Acepted by customer 
            include "der_part_has_or_not_invoice.php";
            // include "der_part_cancel.php";                  
            break;

        case 40: //Rejected by customer
            //include "der_part_reject.php";            
            break;

        case -10: // Cancel   

            break;

        default:
            break;
    }
}

// PONER PERMISOS PARA ENVIAR EMAILS
// $send_mail = ok
// debe haber una opcion en la base de datos
// INSERT INTO `_options` (`id`, `option`, `data`, `group`) VALUES (NULL, 'config_mail', '1', '20')
if ($config_mail && permissions_has_permission($u_rol, "email", "create")) {
    include "der_part_send_by_email.php";
} else {
    message('info', "config_mail not actived");
}
?>


