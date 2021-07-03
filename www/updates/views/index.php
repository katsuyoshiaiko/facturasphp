<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-lg-3">
 <?php include view("updates", "izq"); ?>
    </div>

    <div class="col-lg-9">
        <?php include view("updates", "nav"); ?>


        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>



<?php 
// https://api.jquery.com/prop/
?>


            <table class="table table-striped">
                <thead>
                    <tr>
                      <th><?php _t("Id"); ?></th>
                      <th><?php _t("Date"); ?></th>
                      <th><?php _t("Version"); ?></th>
                      <th><?php _t("Name"); ?></th>
                      <th><?php _t("Description"); ?></th>
                      <th><?php _t("Code_install"); ?></th>
                      <th><?php _t("Code_uninstall"); ?></th>
                      <th><?php _t("Code_check"); ?></th>
                      <th><?php _t("Installed"); ?></th>
                                                                       
                      <th><?php _t("Action"); ?></th>                                                                      
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php
                        
                        
                        if( ! $updates ){
                            message("info", "No items"); 
                        }
                        
                        
                        //foreach ($liste_info as $address) {
                        foreach ($updates as $updates) {

                            
                            $menu='<div class="dropdown">
                            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                              Actions
                              <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                              <li><a href="index.php?c=updates&a=details&id='.$updates["id"].'">'._tr("Details").'</a></li>
                              <li><a href="index.php?c=updates&a=edit&id='.$updates["id"].'">'._tr("Edit").'</a></li>
                              <li role="separator" class="divider"></li>
                              <li><a href="index.php?c=updates&a=delete&id='.$updates["id"].'">'._tr("Delete").'</a></li>
                            </ul>
                          </div>'; 
                         //   $photo = addresses_photos_principal($address["id"]);
                         //   $contact_name = contacts_field_id("name", $updates["contact_id"]);
                         //   $contact_lastname = contacts_field_id("lastname", $updates["contact_id"]);
                         echo "<tr id=\"$updates[id]\">"; 
                         echo "<td>$updates[id]</td>";
                         echo "<td>$updates[date]</td>";
                         echo "<td>$updates[version]</td>";
                         echo "<td>$updates[name]</td>";
                         echo "<td>$updates[description]</td>";
                         echo "<td>$updates[code_install]</td>";
                         echo "<td>$updates[code_uninstall]</td>";
                         echo "<td>$updates[code_check]</td>";
                         echo "<td>$updates[installed]</td>";
                              
                         echo "<td>$menu</td>";
                          
                            echo "</tr>";
                        }
                        ?>	
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                                             <th><?php _t("Id"); ?></th>
                     <th><?php _t("Date"); ?></th>
                     <th><?php _t("Version"); ?></th>
                     <th><?php _t("Name"); ?></th>
                     <th><?php _t("Description"); ?></th>
                     <th><?php _t("Code_install"); ?></th>
                     <th><?php _t("Code_uninstall"); ?></th>
                     <th><?php _t("Code_check"); ?></th>
                     <th><?php _t("Installed"); ?></th>
                                                                     
                        <th><?php _t("Action"); ?></th>                                                                      
                    </tr>
                </tfoot>
            </table>




<?php
/*        
        Export:
        <a href="index.php?c=addresses&a=export_json">JSON</a>
        <a href="index.php?c=addresses&a=export_pdf">pdf</a>
*/
?>


    </div>
</div>

<?php include view("home", "footer"); ?> 

