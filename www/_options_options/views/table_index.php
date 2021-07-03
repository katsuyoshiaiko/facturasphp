
            <table class="table table-striped">
                <thead>
                    <tr>
                      <th><?php _t("Id"); ?></th>
                      <th><?php _t("_tmf_materials_options_id"); ?></th>
                      <th><?php _t("Disabled_id"); ?></th>
                      <th><?php _t("Order_by"); ?></th>
                      <th><?php _t("Status"); ?></th>
                                                                       
                      <th><?php _t("Action"); ?></th>                                                                      
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php
                        
                        
                        if( ! $_options_options ){
                            message("info", "No items"); 
                        }
                        
                        
                        //foreach ($liste_info as $address) {
                        foreach ($_options_options as $_options_options) {

                            
                            $menu='<div class="dropdown">
                            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                              Actions
                              <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                              <li><a href="index.php?c=_options_options&a=details&id='.$_options_options["id"].'">'._tr("Details").'</a></li>
                              <li><a href="index.php?c=_options_options&a=edit&id='.$_options_options["id"].'">'._tr("Edit").'</a></li>
                              <li role="separator" class="divider"></li>
                              <li><a href="index.php?c=_options_options&a=delete&id='.$_options_options["id"].'">'._tr("Delete").'</a></li>
                            </ul>
                          </div>'; 
                         //   $photo = addresses_photos_principal($address["id"]);
                         //   $contact_name = contacts_field_id("name", $_options_options["contact_id"]);
                         //   $contact_lastname = contacts_field_id("lastname", $_options_options["contact_id"]);
                         echo "<tr id=\"$_options_options[id]\">"; 
                         echo "<td>$_options_options[id]</td>";
                         echo "<td>$_options_options[_tmf_materials_options_id]</td>";
                         echo "<td>$_options_options[disabled_id]</td>";
                         echo "<td>$_options_options[order_by]</td>";
                         echo "<td>$_options_options[status]</td>";
                              
                         echo "<td>$menu</td>";
                          
                            echo "</tr>";
                        }
                        ?>	
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                                             <th><?php _t("Id"); ?></th>
                     <th><?php _t("_tmf_materials_options_id"); ?></th>
                     <th><?php _t("Disabled_id"); ?></th>
                     <th><?php _t("Order_by"); ?></th>
                     <th><?php _t("Status"); ?></th>
                                                                     
                        <th><?php _t("Action"); ?></th>                                                                      
                    </tr>
                </tfoot>
            </table>
