<table class="table table-striped">
    <thead>
        <tr>                    
            <th><?php _t("Type") ; ?></th>
            <th><?php _t("Address") ; ?></th>                    
            <th><?php _t("Postcode") ; ?></th>
            <th><?php _t("Barrio") ; ?></th>
            <th><?php _t("City") ; ?></th>                    
            <th><?php _t("Country") ; ?></th>
            <?php if(modules_field_module('status', 'transport')){ ?> <th><?php _t("Transport") ; ?></th><?php }?>
            <th><?php _t("Action") ; ?></th>
        </tr>
    </thead>

    <tfoot>
        <tr>                    
            <th><?php _t("Type") ; ?></th>
            <th><?php _t("Address") ; ?></th>                    
            <th><?php _t("Postcode") ; ?></th>
            <th><?php _t("Barrio") ; ?></th>
            <th><?php _t("City") ; ?></th>                    
            <th><?php _t("Country") ; ?></th>
            <?php if(modules_field_module('status', 'transport')){ ?> <th><?php _t("Transport") ; ?></th><?php }?>
            <th><?php _t("Action") ; ?></th>
        </tr>
    </tfoot>

    <tbody>
        <?php foreach ( addresses_list_by_contact_id($id) as $key => $addresses_list_by_contact_id ) { ?>                                       
            <tr>                    

                <td><?php echo "$addresses_list_by_contact_id[name]" ; ?></td>
                <td><?php echo "$addresses_list_by_contact_id[number], $addresses_list_by_contact_id[address]" ; ?></td>       
                <td><?php echo "$addresses_list_by_contact_id[postcode]" ; ?></td>                   
                <td><?php echo "$addresses_list_by_contact_id[barrio]" ; ?></td>                   
                <td><?php echo "$addresses_list_by_contact_id[city]" ; ?></td>                                                                               
                <td><?php echo countries_country_by_country_code($addresses_list_by_contact_id['country']) ; ?></td> 
                <?php if(modules_field_module('status', 'transport')){ ?> 
                    <td><?php echo (addresses_transport_search_by_addresses_id($addresses_list_by_contact_id['id'])) ; ?></td> 
                    <?php }?>
                
                <td>


                    <?php
                    if ( permissions_has_permission($u_rol , "addresses" , "update") ) {
                        include "modal_adresses_edit.php" ;
                    }
                    ?>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>

