<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-lg-3">
        <?php include view("_menus", "izq"); ?>
    </div>

    <div class="col-lg-9">
       <?php include view("_menus", "nav"); ?>


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
                    
                    <th><?php _t("Location"); ?></th>
                    <th><?php _t("Father"); ?></th>
                    <th><?php _t("Label"); ?></th>
                    <th><?php _t("Url"); ?></th>
                    <th><?php _t("Icon"); ?></th>
                    <th><?php _t("Order_by"); ?></th>

                    <th><?php _t("Action"); ?></th>                                                                      
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php
                    if (!$_menus) {
                        message("info", "No items");
                    }

                    $tr = "top"; 
                    //foreach ($liste_info as $address) {
                    foreach ($_menus as $_menus) {
                        
                        $tr = ( $_menus["father"] != "$tr")?  "<tr><td colspan=\"7\" bgcolor=\"lavender\"><b>".$_menus['father']."</b></td></tr>" : "";
                        
                        echo $tr; 
                        


                        $menu = '<div class="dropdown">
                            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                              Actions
                              <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                              <li><a href="index.php?c=_menus&a=details&id=' . $_menus["id"] . '">' . _tr("Details") . '</a></li>
                              <li><a href="index.php?c=_menus&a=edit&id=' . $_menus["id"] . '">' . _tr("Edit") . '</a></li>
                              <li role="separator" class="divider"></li>
                              <li><a href="index.php?c=_menus&a=delete&id=' . $_menus["id"] . '">' . _tr("Delete") . '</a></li>
                            </ul>
                          </div>';
                        //   $photo = addresses_photos_principal($address["id"]);
                        //   $contact_name = contacts_field_id("name", $_menus["contact_id"]);
                        //   $contact_lastname = contacts_field_id("lastname", $_menus["contact_id"]);
                        echo "<tr id=\"$_menus[id]\">";
                        //echo "<td>$_menus[id]</td>";
                        echo "<td>$_menus[location]</td>";
                        echo "<td>$_menus[father]</td>";
                        echo "<td>$_menus[label]</td>";
                        echo "<td>$_menus[url]</td>";
                        echo "<td>$_menus[icon]</td>";
                        echo "<td>$_menus[order_by]</td>";

                        echo "<td>$menu</td>";

                        echo "</tr>";
                        
                        $tr = $_menus["father"];
                    }
                    ?>	
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    
                    <th><?php _t("Location"); ?></th>
                    <th><?php _t("Father"); ?></th>
                    <th><?php _t("Label"); ?></th>
                    <th><?php _t("Url"); ?></th>
                    <th><?php _t("Icon"); ?></th>
                    <th><?php _t("Order_by"); ?></th>

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

