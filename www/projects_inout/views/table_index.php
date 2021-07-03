
            <table class="table table-striped">
                <thead>
                    <tr>
                      <th><?php _t("Id"); ?></th>
                      <th><?php _t("Project_id"); ?></th>
                      <th><?php _t("Budget_id"); ?></th>
                      <th><?php _t("Invoice_id"); ?></th>
                      <th><?php _t("Expense_id"); ?></th>
                      <th><?php _t("Order_by"); ?></th>
                      <th><?php _t("Status"); ?></th>
                                                                       
                      <th><?php _t("Action"); ?></th>                                                                      
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php
                        
                        
                        if( ! $projects_inout ){
                            message("info", "No items"); 
                        }
                        
                        
                        //foreach ($liste_info as $address) {
                        foreach ($projects_inout as $projects_inout) {

                            
                            $menu='<div class="dropdown">
                            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                              Actions
                              <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                              <li><a href="index.php?c=projects_inout&a=details&id='.$projects_inout["id"].'">'._tr("Details").'</a></li>
                              <li><a href="index.php?c=projects_inout&a=edit&id='.$projects_inout["id"].'">'._tr("Edit").'</a></li>
                              <li role="separator" class="divider"></li>
                              <li><a href="index.php?c=projects_inout&a=delete&id='.$projects_inout["id"].'">'._tr("Delete").'</a></li>
                            </ul>
                          </div>'; 
                         //   $photo = addresses_photos_principal($address["id"]);
                         //   $contact_name = contacts_field_id("name", $projects_inout["contact_id"]);
                         //   $contact_lastname = contacts_field_id("lastname", $projects_inout["contact_id"]);
                         echo "<tr id=\"$projects_inout[id]\">"; 
                         echo "<td>$projects_inout[id]</td>";
                         echo "<td><a href='index.php?c=projects&a=details&id=$projects_inout[project_id]'> Project: $projects_inout[project_id]</a></td>";
                         echo "<td>$projects_inout[project_id]</td>";
                         echo "<td>$projects_inout[budget_id]</td>";
                         echo "<td>$projects_inout[invoice_id]</td>";
                         echo "<td>$projects_inout[expense_id]</td>";
                         echo "<td>$projects_inout[order_by]</td>";
                         echo "<td>$projects_inout[status]</td>";
                              
                         echo "<td>$menu</td>";
                          
                            echo "</tr>";
                        }
                        ?>	
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                                             <th><?php _t("Id"); ?></th>
                     <th><?php _t("Project_id"); ?></th>
                     <th><?php _t("Budget_id"); ?></th>
                     <th><?php _t("Invoice_id"); ?></th>
                     <th><?php _t("Expense_id"); ?></th>
                     <th><?php _t("Order_by"); ?></th>
                     <th><?php _t("Status"); ?></th>
                                                                     
                        <th><?php _t("Action"); ?></th>                                                                      
                    </tr>
                </tfoot>
            </table>
