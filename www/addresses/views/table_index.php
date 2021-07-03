

<table class="table table-striped">
    <thead>
        <tr>
            <th><?php _t("Id") ; ?></th>
            <th><?php _t("Contact_id") ; ?></th>
            <th><?php _t("Type") ; ?></th>
            <th><?php _t("Address") ; ?></th>
            <th><?php _t("Number") ; ?></th>
            <th><?php _t("Postcode") ; ?></th>
            <th><?php _t("Barrio") ; ?></th>
            <th><?php _t("City") ; ?></th>
            <th><?php _t("Region") ; ?></th>
            <th><?php _t("Country") ; ?></th>
            <th><?php _t("Transport") ; ?></th>
            <th><?php _t("Status") ; ?></th>


        </tr>
    </thead>

    <tfoot>
        <tr>
            <th><?php _t("Id") ; ?></th>
            <th><?php _t("Contact_id") ; ?></th>
            <th><?php _t("Type") ; ?></th>
            <th><?php _t("Address") ; ?></th>
            <th><?php _t("Number") ; ?></th>
            <th><?php _t("Postcode") ; ?></th>
            <th><?php _t("Barrio") ; ?></th>
            <th><?php _t("City") ; ?></th>
            <th><?php _t("Region") ; ?></th>
            <th><?php _t("Country") ; ?></th>
            <th><?php _t("Transport") ; ?></th>
            <th><?php _t("Status") ; ?></th>


        </tr>
    </tfoot>


    <tbody>
        <tr>
            <?php
            if ( ! $addresses ) {
                message("info" , "No items") ;
            }


            //foreach ($liste_info as $address) {
            foreach ( $addresses as $addresses ) {


                $menu = '<div class="dropdown">
                            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                              Actions
                              <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                              <li><a href="index.php?c=addresses&a=details&id=' . $addresses["id"] . '">' . _tr("Details") . '</a></li>
                              <li><a href="index.php?c=addresses&a=edit&id=' . $addresses["id"] . '">' . _tr("Edit") . '</a></li>
                              <li role="separator" class="divider"></li>
                              <li><a href="index.php?c=addresses&a=delete&id=' . $addresses["id"] . '">' . _tr("Delete") . '</a></li>
                            </ul>
                          </div>' ;
                //   $photo = addresses_photos_principal($address["id"]);
                //   $contact_name = contacts_field_id("name", $addresses["contact_id"]);
                //   $contact_lastname = contacts_field_id("lastname", $addresses["contact_id"]);
                echo "<tr id=\"$addresses[id]\">" ;
                echo "<td>$addresses[id]</td>" ;
                echo "<td><a href=\"index.php?c=contacts&a=addresses&id=$addresses[contact_id]\">" . contacts_formated($addresses['contact_id']) . "</a></td>" ;
                echo "<td>" . _tr($addresses['name']) . "</td>" ;
                echo "<td>$addresses[address]</td>" ;
                echo "<td>$addresses[number]</td>" ;
                echo "<td>$addresses[postcode]</td>" ;
                echo "<td>$addresses[barrio]</td>" ;
                echo "<td>$addresses[city]</td>" ;
                echo "<td>$addresses[region]</td>" ;
                echo "<td>$addresses[country]</td>" ;
                echo "<td> " . (addresses_transport_search_by_addresses_id($addresses['id'])) . "</td> " ;
                echo "<td>$addresses[status]</td>" ;

                //   echo "<td>$menu</td>" ;

                echo "</tr>" ;
            }
            ?>	
        </tr>
    </tbody>

</table>



