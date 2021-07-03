<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-lg-3">
        <?php include view("schedule", "izq"); ?>
    </div>

    <div class="col-lg-9">
       <?php include view("schedule", "nav"); ?>


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
                      <th><?php _t("Day"); ?></th>
                      <th><?php _t("Am_start"); ?></th>
                      <th><?php _t("Am_end"); ?></th>
                      <th><?php _t("Pm_start"); ?></th>
                      <th><?php _t("Pm_end"); ?></th>
                      <th><?php _t("Order_by"); ?></th>
                      <th><?php _t("Status"); ?></th>
                                                                       
                      <th><?php _t("Action"); ?></th>                                                                      
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php
                        
                        
                        if( ! $schedule ){
                            message("info", "No items"); 
                        }
                        
                        
                        //foreach ($liste_info as $address) {
                        foreach ($schedule as $schedule) {

                            
                            $menu='<div class="dropdown">
                            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                              Actions
                              <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                              <li><a href="index.php?c=schedule&a=details&id='.$schedule["id"].'">'._tr("Details").'</a></li>
                              <li><a href="index.php?c=schedule&a=edit&id='.$schedule["id"].'">'._tr("Edit").'</a></li>
                              <li role="separator" class="divider"></li>
                              <li><a href="index.php?c=schedule&a=delete&id='.$schedule["id"].'">'._tr("Delete").'</a></li>
                            </ul>
                          </div>'; 
                         //   $photo = addresses_photos_principal($address["id"]);
                         //   $contact_name = contacts_field_id("name", $schedule["contact_id"]);
                         //   $contact_lastname = contacts_field_id("lastname", $schedule["contact_id"]);
                         echo "<tr id=\"$schedule[id]\">"; 
                         echo "<td>$schedule[id]</td>";
                         echo "<td>$schedule[contact_id]</td>";
                         echo "<td>$schedule[day]</td>";
                         echo "<td>$schedule[am_start]</td>";
                         echo "<td>$schedule[am_end]</td>";
                         echo "<td>$schedule[pm_start]</td>";
                         echo "<td>$schedule[pm_end]</td>";
                         echo "<td>$schedule[order_by]</td>";
                         echo "<td>$schedule[status]</td>";
                              
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
                     <th><?php _t("Day"); ?></th>
                     <th><?php _t("Am_start"); ?></th>
                     <th><?php _t("Am_end"); ?></th>
                     <th><?php _t("Pm_start"); ?></th>
                     <th><?php _t("Pm_end"); ?></th>
                     <th><?php _t("Order_by"); ?></th>
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

