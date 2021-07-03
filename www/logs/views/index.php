<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-lg-3">
        <?php include view("logs", "izq"); ?>
    </div>

    <div class="col-lg-9">
        <?php include view("logs", "nav"); ?>


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
                    <th><?php _t("Date"); ?></th>
                    <th><?php _t("User"); ?></th>
                    <th><?php _t("Description"); ?></th>                                
                    <th><?php _t("Action"); ?></th>                                                                      
                </tr>                                
               <?php 
               /* <tr>
                    <th><?php _t("Id"); ?></th>
                    <th><?php _t("Level"); ?></th>
                    <th><?php _t("Date"); ?></th>
                    <th><?php _t("U_id"); ?></th>
                    <th><?php _t("U_rol"); ?></th>
                    <th><?php _t("C"); ?></th>
                    <th><?php _t("A"); ?></th>
                    <th><?php _t("W"); ?></th>
                    <th><?php _t("Description"); ?></th>
                    <th><?php _t("Doc_id"); ?></th>
                    <th><?php _t("Crud"); ?></th>
                    <th><?php _t("Error"); ?></th>
                    <th><?php _t("Val_get"); ?></th>
                    <th><?php _t("Val_post"); ?></th>
                    <th><?php _t("Val_request"); ?></th>
                    <th><?php _t("Ip4"); ?></th>
                    <th><?php _t("Ip6"); ?></th>
                    <th><?php _t("Broswer"); ?></th>

                    <th><?php _t("Action"); ?></th>                                                                      
                </tr>*/
               ?>
            </thead>
            <tbody>
                <tr>
                    <?php
                    if (!$logs) {
                        message("info", "No items");
                    }


                    //foreach ($liste_info as $address) {
                    foreach ($logs as $logs) {


                        $menu = '<div class="dropdown">
                            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                              Actions
                              <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                              <li><a href="index.php?c=logs&a=details&id=' . $logs["id"] . '">' . _tr("Details") . '</a></li>
                              <li><a href="index.php?c=logs&a=edit&id=' . $logs["id"] . '">' . _tr("Edit") . '</a></li>
                              <li role="separator" class="divider"></li>
                              <li><a href="index.php?c=logs&a=delete&id=' . $logs["id"] . '">' . _tr("Delete") . '</a></li>
                            </ul>
                          </div>';
                        //   $photo = addresses_photos_principal($address["id"]);
                        //   $contact_name = contacts_field_id("name", $logs["contact_id"]);
                        //   $contact_lastname = contacts_field_id("lastname", $logs["contact_id"]);
                        echo "<tr id=\"$logs[id]\">";
                    //    echo "<td>$logs[id]</td>";
                    //    echo "<td>$logs[level]</td>";
                        echo "<td>$logs[date]</td>";
                        echo "<td>". contacts_formated($logs['u_id'])."</td>";
                        //echo "<td>$logs[u_rol]</td>";
                        //echo "<td>$logs[c]</td>";
                        //echo "<td>$logs[a]</td>";
                        //echo "<td>$logs[w]</td>";
                        echo "<td>$logs[description]</td>";
                        //echo "<td>$logs[doc_id]</td>";
                        //echo "<td>$logs[crud]</td>";
                        //echo "<td>$logs[error]</td>";
                        //echo "<td>$logs[val_get]</td>";
                        //echo "<td>$logs[val_post]</td>";
                        //echo "<td>$logs[val_request]</td>";
                        //echo "<td>$logs[ip4]</td>";
                        //echo "<td>$logs[ip6]</td>";
                        //echo "<td>$logs[broswer]</td>";

                        echo "<td>$menu</td>";

                        echo "</tr>";
                    }
                    ?>	
                </tr>
            </tbody>
            <tfoot>
                  <tr>                                        
                    <th><?php _t("Date"); ?></th>
                    <th><?php _t("User"); ?></th>
                    <th><?php _t("Description"); ?></th>                                  
                    <th><?php _t("Action"); ?></th>                                                                      
                </tr>                                                                      
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

