<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-lg-3">
        <?php include view("directory_names", "izq"); ?>
    </div>

    <div class="col-lg-9">
       <?php include view("directory_names", "nav"); ?>


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
                      <th><?php _t("Name"); ?></th>
                      <th><?php _t("Order"); ?></th>
                                                                       
                      <th><?php _t("Action"); ?></th>                                                                      
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php
                        
                        
                        if( ! $directory_names ){
                            message("info", "No items"); 
                        }
                        
                        
                        //foreach ($liste_info as $address) {
                        foreach ($directory_names as $directory_names) {

                            
                            $menu='<div class="dropdown">
                            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                              '._tr("Actions").'
                              <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                              <li><a href="index.php?c=directory_names&a=details&id='.$directory_names["id"].'">'._tr("Details").'</a></li>
                              <li><a href="index.php?c=directory_names&a=edit&id='.$directory_names["id"].'">'._tr("Edit").'</a></li>
                              <li role="separator" class="divider"></li>
                              <li><a href="index.php?c=directory_names&a=delete&id='.$directory_names["id"].'">'._tr("Delete").'</a></li>
                            </ul>
                          </div>'; 
                         //   $photo = addresses_photos_principal($address["id"]);
                         //   $contact_name = contacts_field_id("name", $directory_names["contact_id"]);
                         //   $contact_lastname = contacts_field_id("lastname", $directory_names["contact_id"]);
                         echo "<tr id=\"$directory_names[id]\">"; 
                         echo "<td>$directory_names[id]</td>";
                         echo "<td>$directory_names[name]</td>";
                         echo "<td>$directory_names[order]</td>";
                              
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
                     <th><?php _t("Order"); ?></th>
                                                                     
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

