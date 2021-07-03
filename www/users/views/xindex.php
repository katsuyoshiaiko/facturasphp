<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-lg-3">
        <?php include view("users", "izq"); ?>
    </div>

    <div class="col-lg-9">
       <?php include view("users", "nav"); ?>


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
                      <th><?php _t("Contact_id"); ?></th>
                      <th><?php _t("Language"); ?></th>
                      <th><?php _t("Rol"); ?></th>
                      <th><?php _t("Login"); ?></th>
                      <th><?php _t("Password"); ?></th>
                      <th><?php _t("Email"); ?></th>
                      <th><?php _t("Status"); ?></th>
                                                                       
                      <th><?php _t("Action"); ?></th>                                                                      
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php
                        
                        
                        if( ! $users ){
                            message("info", "No items"); 
                        }
                        
                        
                        //foreach ($liste_info as $address) {
                        foreach ($users as $users) {

                            
                            $menu='<div class="dropdown">
                            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                              Actions
                              <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                              <li><a href="index.php?c=users&a=details&id='.$users["id"].'">'._tr("Details").'</a></li>
                              <li><a href="index.php?c=users&a=edit&id='.$users["id"].'">'._tr("Edit").'</a></li>
                              <li role="separator" class="divider"></li>
                              <li><a href="index.php?c=users&a=delete&id='.$users["id"].'">'._tr("Delete").'</a></li>
                            </ul>
                          </div>'; 
                         //   $photo = addresses_photos_principal($address["id"]);
                         //   $contact_name = contacts_field_id("name", $users["contact_id"]);
                         //   $contact_lastname = contacts_field_id("lastname", $users["contact_id"]);
                         echo "<tr id=\"$users[id]\">"; 
                         echo "<td>$users[id]</td>";
                         echo "<td>$users[contact_id]</td>";
                         echo "<td>$users[language]</td>";
                         echo "<td>$users[rol]</td>";
                         echo "<td>$users[login]</td>";
                         echo "<td>$users[password]</td>";
                         echo "<td>$users[email]</td>";
                         echo "<td>$users[status]</td>";
                              
                         echo "<td>$menu</td>";
                          
                            echo "</tr>";
                        }
                        ?>	
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                                             <th><?php _t("Id"); ?></th>
                     <th><?php _t("Contact_id"); ?></th>
                     <th><?php _t("Language"); ?></th>
                     <th><?php _t("Rol"); ?></th>
                     <th><?php _t("Login"); ?></th>
                     <th><?php _t("Password"); ?></th>
                     <th><?php _t("Email"); ?></th>
                     <th><?php _t("Status"); ?></th>
                                                                     
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

