
<table class="table table-striped">
    <thead>
        <tr>
            <th><?php _t("Contact") ; ?></th>
            <th><?php _t("Bank") ; ?></th>
            <th><?php _t("Accoun number") ; ?></th>
            <th><?php _t("Bic") ; ?></th>
            <th><?php _t("IBAN") ; ?></th>
            <th><?php _t("Status") ; ?></th>
            <th><?php _t("Invoices") ; ?></th>
            <th><?php _t("Action") ; ?></th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th><?php _t("Contact") ; ?></th>
            <th><?php _t("Bank") ; ?></th>
            <th><?php _t("Accoun number") ; ?></th>
            <th><?php _t("Bic") ; ?></th>
            <th><?php _t("IBAN") ; ?></th>
            <th><?php _t("Status") ; ?></th>
            <th><?php _t("Invoices") ; ?></th>
            <th><?php _t("Action") ; ?></th>
        </tr>
        </thead>
    <tbody>
        <?php foreach ( banks_list_by_contact_id($id) as $banks_list_by_contact_id ) { 
            
            //banks_field_id($field , $id);
            
            
            ?>
            <tr>                                            
                <td><?php echo contacts_formated($banks_list_by_contact_id['contact_id']) ; ?></td>
                <td><?php echo "$banks_list_by_contact_id[bank]" ; ?></td>
                <td><?php echo "$banks_list_by_contact_id[account_number]" ; ?></td>
                <td><?php echo "$banks_list_by_contact_id[bic]" ; ?></td>
                <td><?php echo "$banks_list_by_contact_id[iban]" ; ?></td>
                <td><?php echo "$banks_list_by_contact_id[status]" ; ?></td>   
                <td><?php
                
                if ( permissions_has_permission($u_rol , "banks" , "update") ) {
                
                
                  $invoices = ( ! banks_check_is_invoices($banks_list_by_contact_id['account_number'])) ? 
                    include "modal_banks_set_for_invoices.php" 
                    :
                    include "modal_banks_info_for_invoices.php" 
                    ; 
                  
                } 
                  
                ?></td>   
                <td>

                    <?php
                    if ( permissions_has_permission($u_rol , "banks" , "update") ) {
                        include "modal_form_contacts_bank_edit.php" ;
                    }
                    ?>

                </td>                                                             
            </tr>
        <?php } ?>
    </tbody>  
</table>