
            <table class="table table-striped">
                <thead>
                    <tr>
                      <th><?php _t("Id"); ?></th>
                      <th><?php _t("Option"); ?></th>
                      <th><?php _t("Price"); ?></th>
                      <th><?php _t("Tax"); ?></th>
                      <th><?php _t("Order_by"); ?></th>
                      <th><?php _t("Status"); ?></th>
                                                                       
                      <th><?php _t("Action"); ?></th>                                                                      
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php
                        
                        
                        if( ! $options ){
                            message("info", "No items"); 
                        }
                        
                        
                        //foreach ($liste_info as $address) {
                        foreach ($options as $options) {

                            
                            $menu='<div class="dropdown">
                            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                              Actions
                              <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                              <li><a href="index.php?c=options&a=details&id='.$options["id"].'">'._tr("Details").'</a></li>
                              <li><a href="index.php?c=options&a=edit&id='.$options["id"].'">'._tr("Edit").'</a></li>
                              <li role="separator" class="divider"></li>
                              <li><a href="index.php?c=options&a=delete&id='.$options["id"].'">'._tr("Delete").'</a></li>
                            </ul>
                          </div>'; 
                         //   $photo = addresses_photos_principal($address["id"]);
                         //   $contact_name = contacts_field_id("name", $options["contact_id"]);
                         //   $contact_lastname = contacts_field_id("lastname", $options["contact_id"]);
                         echo "<tr id=\"$options[id]\">"; 
                         echo "<td>$options[id]</td>";
                         echo "<td>$options[option]</td>";
                         echo "<td>$options[price]</td>";
                         echo "<td>$options[tax]</td>";
                         echo "<td>$options[order_by]</td>";
                         echo "<td>$options[status]</td>";
                              
                         echo "<td>$menu</td>";
                          
                            echo "</tr>";
                        }
                        ?>	
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                                             <th><?php _t("Id"); ?></th>
                     <th><?php _t("Option"); ?></th>
                     <th><?php _t("Price"); ?></th>
                     <th><?php _t("Tax"); ?></th>
                     <th><?php _t("Order_by"); ?></th>
                     <th><?php _t("Status"); ?></th>
                                                                     
                        <th><?php _t("Action"); ?></th>                                                                      
                    </tr>
                </tfoot>
            </table>
