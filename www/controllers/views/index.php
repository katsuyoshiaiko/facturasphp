<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-lg-3">
        <?php include view("controllers", "izq"); ?>
    </div>

    <div class="col-lg-9">
       <?php include view("controllers", "nav"); ?>


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
                      <th><?php _t("Controller"); ?></th>
                      <th><?php _t("Title"); ?></th>
                      <th><?php _t("Description"); ?></th>
                                                                       
                      <th><?php _t("Action"); ?></th>                                                                      
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php
                        
                        
                        if( ! $controllers ){
                            message("info", "No items"); 
                        }
                        
                        
                        //foreach ($liste_info as $address) {
                        foreach ($controllers as $controllers) {

                            
                            $menu='<div class="dropdown">
                            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                              Actions
                              <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                              <li><a href="index.php?c=controllers&a=details&id='.$controllers["id"].'">'._tr("Details").'</a></li>
                              <li><a href="index.php?c=controllers&a=edit&id='.$controllers["id"].'">'._tr("Edit").'</a></li>
                              <li role="separator" class="divider"></li>
                              <li><a href="index.php?c=controllers&a=delete&id='.$controllers["id"].'">'._tr("Delete").'</a></li>
                            </ul>
                          </div>'; 
                         //   $photo = addresses_photos_principal($address["id"]);
                         //   $contact_name = contacts_field_id("name", $controllers["contact_id"]);
                         //   $contact_lastname = contacts_field_id("lastname", $controllers["contact_id"]);
                         echo "<tr id=\"$controllers[id]\">"; 
                         echo "<td>$controllers[id]</td>";
                         echo "<td>$controllers[controller]</td>";
                         echo "<td>$controllers[title]</td>";
                         echo "<td>$controllers[description]</td>";
                              
                         echo "<td>$menu</td>";
                          
                            echo "</tr>";
                        }
                        ?>	
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                                             <th><?php _t("Id"); ?></th>
                     <th><?php _t("Controller"); ?></th>
                     <th><?php _t("Title"); ?></th>
                     <th><?php _t("Description"); ?></th>
                                                                     
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

