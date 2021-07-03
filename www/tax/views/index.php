<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-lg-3">
        <?php include view("config", "izq"); ?>
    </div>







    <div class="col-lg-9">
        <?php include view("tax", "nav"); ?>


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

                    <th><?php _t("Tax name"); ?></th>
                    <th><?php _t("Value"); ?></th>

                    <th><?php _t("Status"); ?></th>

                    <th><?php _t("Action"); ?></th>                                                                      
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php
                    if (!$tax) {
                        message("info", "No items");
                    }


                    //foreach ($liste_info as $address) {
                    foreach ($tax as $tax) {


                        $menu = '<div class="dropdown">
                            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                              Actions
                              <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                              <li><a href="index.php?c=tax&a=details&id=' . $tax["id"] . '">' . _tr("Details") . '</a></li>
                              <li><a href="index.php?c=tax&a=edit&id=' . $tax["id"] . '">' . _tr("Edit") . '</a></li>
                              <li role="separator" class="divider"></li>
                              <li><a href="index.php?c=tax&a=delete&id=' . $tax["id"] . '">' . _tr("Delete") . '</a></li>
                            </ul>
                          </div>';


                        //    $status = '<input type="checkbox" checked data-toggle="toggle">'; 
                        //   $photo = addresses_photos_principal($address["id"]);
                        //   $contact_name = contacts_field_id("name", $tax["contact_id"]);
                        //   $contact_lastname = contacts_field_id("lastname", $tax["contact_id"]);
                        echo "<tr id=\"$tax[id]\">";
                        //  echo "<td>$tax[id]</td>" ;
                        echo "<td>$tax[name]</td>";
                        echo "<td>$tax[value]%</td>";
                        //   echo "<td>$tax[order_by]</td>" ;
                        echo "<td>$tax[status]</td>";
                        //    echo "<td>$status</td>" ;

                        echo "<td>$menu</td>";

                        echo "</tr>";
                    }
                    ?>	
                </tr>
            </tbody>
            <tfoot>
                <tr>

                    <th><?php _t("Name"); ?></th>
                    <th><?php _t("Value"); ?></th>

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

