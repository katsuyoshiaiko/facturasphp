
            <table class="table table-striped">
                <thead>
                    <tr>
                      <th><?php _t("Id"); ?></th>
                      <th><?php _t("Name"); ?></th>
                      <th><?php _t("Sub_modules"); ?></th>
                      <th><?php _t("Description"); ?></th>
                      <th><?php _t("Author"); ?></th>
                      <th><?php _t("Author_email"); ?></th>
                      <th><?php _t("Url"); ?></th>
                      <th><?php _t("Version"); ?></th>
                      <th><?php _t("Order_by"); ?></th>
                      <th><?php _t("Status"); ?></th>
                                                                       
                      <th><?php _t("Action"); ?></th>                                                                      
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php
                        
                        
                        if( ! $modules ){
                            message("info", "No items"); 
                        }
                        
                        
                        //foreach ($liste_info as $address) {
                        foreach ($modules as $modules) {

                            
                            $menu='<div class="dropdown">
                            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                              Actions
                              <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                              <li><a href="index.php?c=modules&a=details&id='.$modules["id"].'">'._tr("Details").'</a></li>
                              <li><a href="index.php?c=modules&a=edit&id='.$modules["id"].'">'._tr("Edit").'</a></li>
                              <li role="separator" class="divider"></li>
                              <li><a href="index.php?c=modules&a=delete&id='.$modules["id"].'">'._tr("Delete").'</a></li>
                            </ul>
                          </div>'; 
                         //   $photo = addresses_photos_principal($address["id"]);
                         //   $contact_name = contacts_field_id("name", $modules["contact_id"]);
                         //   $contact_lastname = contacts_field_id("lastname", $modules["contact_id"]);
                         echo "<tr id=\"$modules[id]\">"; 
                         echo "<td>$modules[id]</td>";
                         echo "<td>$modules[name]</td>";
                         echo "<td>$modules[sub_modules]</td>";
                         echo "<td>$modules[description]</td>";
                         echo "<td>$modules[author]</td>";
                         echo "<td>$modules[author_email]</td>";
                         echo "<td>$modules[url]</td>";
                         echo "<td>$modules[version]</td>";
                         echo "<td>$modules[order_by]</td>";
                         echo "<td>$modules[status]</td>";
                              
                         echo "<td>$menu</td>";
                          
                            echo "</tr>";
                        }
                        ?>	
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                                             <th><?php _t("Id"); ?></th>
                     <th><?php _t("Name"); ?></th>
                     <th><?php _t("Sub_modules"); ?></th>
                     <th><?php _t("Description"); ?></th>
                     <th><?php _t("Author"); ?></th>
                     <th><?php _t("Author_email"); ?></th>
                     <th><?php _t("Url"); ?></th>
                     <th><?php _t("Version"); ?></th>
                     <th><?php _t("Order_by"); ?></th>
                     <th><?php _t("Status"); ?></th>
                                                                     
                        <th><?php _t("Action"); ?></th>                                                                      
                    </tr>
                </tfoot>
            </table>
