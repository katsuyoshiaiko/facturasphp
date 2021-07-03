<table class="table table-striped">
    <thead>
        <tr>
            <th><?php _t("Id"); ?></th>                                                                  
            <th><?php _t("Title"); ?></th>
            <th><?php _t("Name"); ?></th>
            <th><?php _t("Lastname"); ?></th>
            <th><?php _t("Company"); ?></th>                 
            <th><?php _t("Details"); ?></th>                                          
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th><?php _t("Id"); ?></th>                                                            
            <th><?php _t("Title"); ?></th>
            <th><?php _t("Name"); ?></th>
            <th><?php _t("Lastname"); ?></th>
            <th><?php _t("Company"); ?></th>
            <th><?php _t("Details"); ?></th>                                          
        </tr>
    </tfoot>
    <tbody>
        <tr>
            <?php
            if (!$contacts_list) {
                message('info', 'No items');
            }

            $i = 1;
            foreach ($contacts_list as $contact) {
                $icon = ($contact['type'] == 1 ) ? '<span class="glyphicon glyphicon-home"></span>' : '<span class="glyphicon glyphicon-user"></span>';
                $menu = '<a class="btn btn-md  btn-primary" href="index.php?c=contacts&a=details&id=' . $contact['id'] . '">' . _tr("Details") . '</a>';
                $has_login = (users_according_contact_id($contact['id'])) ? true : false;
                $title = ( $contact['title'] ) ? _tr($contact['title']) : "";
                $rol = ( users_field_contact_id("rol", $contact['id']) != "" ) ? _tr(users_field_contact_id("rol", $contact['id'])) : "";
                $has_billing_address = (addresses_billing_by_contact_id($contact['id'])) ? "D" : "";
                $has_delivery_address = (addresses_delivery_by_contact_id($contact['id'])) ? "B" : "";
                $status = users_field_contact_id('status', $contact['id']);
                $icon_status = users_status_icon($status);

                echo "<tr>";
                echo "<td>$icon $contact[id]</td>";
                echo "<td>$title</td>";
                echo "<td>" . contacts_formated_name($contact['name']) . "</td>";
                echo "<td>" . contacts_formated_lastname($contact['lastname']) . "</td>";
                echo "<td><a href=\"index.php?c=contacts&a=details&id=$contact[owner_id]\">" . contacts_formated_name(contacts_field_id("name", $contact['owner_id'])) . "</a></td>";
                echo "<td>$menu</td>";
                echo "</tr>";
                $icon_status = "";
                $i++;
            }
            ?>	
        </tr>
    </tbody>




</table>        
