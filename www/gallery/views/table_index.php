<table class="table table-striped">
    <thead>
        <tr>
            <th><?php _t("Id") ; ?></th>
            <th><?php _t("Owner_id") ; ?></th>
            <th><?php _t("Name") ; ?></th>
            <th><?php _t("Title") ; ?></th>
            <th><?php _t("Description") ; ?></th>
            <th><?php _t("Alt") ; ?></th>
            <th><?php _t("Url") ; ?></th>
            <th><?php _t("Date_registre") ; ?></th>
            <th><?php _t("Order_by") ; ?></th>
            <th><?php _t("Status") ; ?></th>

            <th><?php _t("Action") ; ?></th>                                                                      
        </tr>
    </thead>
    <tbody>
        <tr>
            <?php
            if ( ! $gallery ) {
                message("info" , "No items") ;
            }


            //foreach ($liste_info as $address) {
            foreach ( $gallery as $gallery ) {


                $menu = '<div class="dropdown">
                            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                              Actions
                              <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                              <li><a href="index.php?c=gallery&a=details&id=' . $gallery["id"] . '">' . _tr("Details") . '</a></li>
                              <li><a href="index.php?c=gallery&a=edit&id=' . $gallery["id"] . '">' . _tr("Edit") . '</a></li>
                              <li role="separator" class="divider"></li>
                              <li><a href="index.php?c=gallery&a=delete&id=' . $gallery["id"] . '">' . _tr("Delete") . '</a></li>
                            </ul>
                          </div>' ;
                //   $photo = addresses_photos_principal($address["id"]);
                //   $contact_name = contacts_field_id("name", $gallery["contact_id"]);
                //   $contact_lastname = contacts_field_id("lastname", $gallery["contact_id"]);
                echo "<tr id=\"$gallery[id]\">" ;
                echo "<td>$gallery[id]</td>" ;
                echo "<td>". contacts_formated($gallery['owner_id'])."</td>" ;
                echo "<td><img src=\"www_extended/default/gallery/img/$gallery[name]\" width=\"100\"> <BR>$gallery[name]</td>" ;
                echo "<td>$gallery[title]</td>" ;
                echo "<td>$gallery[description]</td>" ;
                echo "<td>$gallery[alt]</td>" ;
                echo "<td>$gallery[url]</td>" ;
                echo "<td>$gallery[date_registre]</td>" ;
                echo "<td>$gallery[order_by]</td>" ;
                echo "<td>$gallery[status]</td>" ;

                echo "<td>$menu</td>" ;

                echo "</tr>" ;
            }
            ?>	
    
            
    
            
        </tr>
    </tbody>
    <tfoot>
        <tr>
            <th><?php _t("Id") ; ?></th>
            <th><?php _t("Owner_id") ; ?></th>
            <th><?php _t("Name") ; ?></th>
            <th><?php _t("Title") ; ?></th>
            <th><?php _t("Description") ; ?></th>
            <th><?php _t("Alt") ; ?></th>
            <th><?php _t("Url") ; ?></th>
            <th><?php _t("Date_registre") ; ?></th>
            <th><?php _t("Order_by") ; ?></th>
            <th><?php _t("Status") ; ?></th>

            <th><?php _t("Action") ; ?></th>                                                                      
        </tr>
    </tfoot>
</table>

