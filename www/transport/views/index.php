<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-lg-3">
        <?php include view("config", "izq"); ?>
    </div>
    <div class="col-lg-3">
        <?php include view("transport", "izq"); ?>
    </div>

    <div class="col-lg-6">
        <?php include view("transport", "nav"); ?>


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
                    <th><?php _t("Code"); ?></th>
                    <th><?php _t("Transport name"); ?></th>
                    <th><?php _t("Price"); ?></th>
                    <th><?php _t("Tax"); ?></th>
                    <th><?php _t("Order_by"); ?></th>
                    <th><?php _t("Status"); ?></th>
                    <th><?php _t("In use"); ?></th>                                                                       
                    <th><?php _t("Action"); ?></th>                                                                      
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php
                    if (!$transport) {
                        message("info", "No items");
                    }


                    //foreach ($liste_info as $address) {
                    foreach ($transport as $transport) {

                        $total = count(addresses_transport_search_by_transport_code($transport['code']));

                        $menu = '<div class="dropdown">
                            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                              Actions
                              <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                              <li><a href="index.php?c=transport&a=details&id=' . $transport["id"] . '">' . _tr("Details") . '</a></li>
                              <li><a href="index.php?c=transport&a=edit&id=' . $transport["id"] . '">' . _tr("Edit") . '</a></li>
                              <li role="separator" class="divider"></li>
                              <li><a href="index.php?c=transport&a=delete&id=' . $transport["id"] . '">' . _tr("Delete") . '</a></li>
                            </ul>
                          </div>';
                        //   $photo = addresses_photos_principal($address["id"]);
                        //   $contact_name = contacts_field_id("name", $transport["contact_id"]);
                        //   $contact_lastname = contacts_field_id("lastname", $transport["contact_id"]);
                        echo "<tr id=\"$transport[id]\">";
                        echo "<td>$transport[id]</td>";
                        echo "<td>$transport[code]</td>";
                        echo "<td>$transport[name]</td>";
                        echo "<td>$transport[price]</td>";
                        echo "<td>$transport[tax] % </td>";
                        echo "<td>$transport[order_by]</td>";
                        echo "<td>$transport[status]</td>";
                        echo "<td>$total</td>";

                        echo "<td>$menu</td>";

                        echo "</tr>";
                    }
                    ?>	
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <th><?php _t("Id"); ?></th>
                    <th><?php _t("Code"); ?></th>
                    <th><?php _t("Transport name"); ?></th>
                    <th><?php _t("Price"); ?></th>
                    <th><?php _t("Tax"); ?></th>
                    <th><?php _t("Order_by"); ?></th>
                    <th><?php _t("Status"); ?></th>
                    <th><?php _t("In use"); ?></th>

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

