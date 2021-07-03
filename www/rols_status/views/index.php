<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-lg-3">
        <?php include view("rols_status", "izq"); ?>
    </div>

    <div class="col-lg-9">
        <?php include view("rols_status", "nav"); ?>


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
                <tr>         <th><?php _t("Id"); ?></th>
                    <th><?php _t("Rol"); ?></th>
                    <th><?php _t("Status_code"); ?></th>

                    <th><?php _t("Action"); ?></th>                                                                      
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php
                    if (!$rols_status) {
                        message("info", "No items");
                    }


                    //foreach ($liste_info as $address) {
                    foreach ($rols_status as $value) {


                        $menu = '<div class="dropdown">
                            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                              Actions
                              <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                              <li><a href="index.php?c=rols_status&a=details&id=' . $value["id"] . '">' . _tr("Details") . '</a></li>
                              <li><a href="index.php?c=rols_status&a=edit&id=' . $value["id"] . '">' . _tr("Edit") . '</a></li>
                              <li role="separator" class="divider"></li>
                              <li><a href="index.php?c=rols_status&a=delete&id=' . $value["id"] . '">' . _tr("Delete") . '</a></li>
                            </ul>
                          </div>';
                        //   $photo = addresses_photos_principal($address["id"]);
                        //   $contact_name = contacts_field_id("name", $value["contact_id"]);
                        //   $contact_lastname = contacts_field_id("lastname", $value["contact_id"]);

                        echo "<tr>";



                        echo "<td>$value[id]</td>";
                        echo "<td>$value[rol]</td>";
                        echo "<td>$value[status_code] ". orders_status_field_code("status", $value['status_code'])."</td>";

                        echo "<td>$menu</td>";

                        echo "</tr>";
                    }
                    ?>	
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <th><?php _t("Id"); ?></th>
                    <th><?php _t("Rol"); ?></th>
                    <th><?php _t("Status_code"); ?></th>

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

