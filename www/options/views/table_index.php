<?php
//message('info', 'The name of the options are not translated');
?>

<table class="table table-striped">
    <thead>
        <tr>
            <th><?php _t("#"); ?></th>
            <th><?php _t("Id"); ?></th>
            <th><?php _t("Image L"); ?></th>
            <th><?php _t("Option"); ?></th>
            <th><?php _t("Translation"); ?></th>
            <th><?php _t("Price"); ?></th>
            <th><?php _t("Tax"); ?></th>            
            <th><?php _t("Status"); ?></th>
            <th><?php _t("Image R"); ?></th>
            <th><?php _t("Action"); ?></th>                                                                      
        </tr>
    </thead>

    <tfoot>
       <tr>
            <th><?php _t("#"); ?></th>
            <th><?php _t("Id"); ?></th>
            <th><?php _t("Image L"); ?></th>
            <th><?php _t("Option"); ?></th>
            <th><?php _t("Translation"); ?></th>
            <th><?php _t("Price"); ?></th>
            <th><?php _t("Tax"); ?></th>            
            <th><?php _t("Status"); ?></th>
            <th><?php _t("Image R"); ?></th>
            <th><?php _t("Action"); ?></th>                                                                      
        </tr>
    </tfoot>


    <tbody>
        <tr>
            <?php
            if (!$options) {
                message("info", "No items");
            }

            $i = 1;

            //foreach ($liste_info as $address) {
            foreach ($options as $options) {


                $menu = '<div class="dropdown">
                            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                              ' . _tr("Actions") . '
                              <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                              <li><a href="index.php?c=options&a=details&id=' . $options["id"] . '">' . _tr("Details") . '</a></li>
                              <li><a href="index.php?c=options&a=edit&id=' . $options["id"] . '">' . _tr("Edit") . '</a></li>
                              <li role="separator" class="divider"></li>
                              <li><a href="index.php?c=options&a=delete&id=' . $options["id"] . '">' . _tr("Delete") . '</a></li>
                            </ul>
                          </div>';



                $modal = '

<button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#myModal' . $options["id"] . '">
  ' . $i . '
</button>

<div class="modal fade" id="myModal' . $options["id"] . '" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">
' . options_field_id('option', $options["id"]) . '
                </h4>
            </div>
            <div class="modal-body">


               


                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                                <th>' . _tr("Type") . '</th>
                                <th>' . _tr("Modele") . '</th>
                                    <th>' . _tr("Forme") . '</th>
                                        <th>' . _tr("Material") . '</th>
                                        <th>' . _tr("Option") . '</th>
                                            

                        </tr>
                    </thead>
                    <tbody>';

                $j = 1;

                foreach (_tmf_materials_options_by_tmf_option_id($options["id"]) as $key => $value) {
                    $modal .= '<tr>
                                <td>' . $j++ . '</td>
                                <td>' . types_field_id('type', _types_modeles_formes_field_id('type_id', $value['tmf_id'])) . '</td>
                                <td>' . modeles_field_id('modele', _types_modeles_formes_field_id('modele_id', $value['tmf_id'])) . '</td>
                                <td>' . formes_field_id('forme', _types_modeles_formes_field_id('forme_id', $value['tmf_id'])) . '</td>
                                            
                                
                                
                                <td>' . materials_field_id('material', $value["material_id"]) . '</td>
                                <td>' . $options['option'] . '</td>
                            </tr>';
                }

                $modal .= ' <tr>
                            <th>#</th>
                                <th>' . _tr("Type") . '</th>
                                <th>' . _tr("Modele") . '</th>
                                    <th>' . _tr("Forme") . '</th>
                                        <th>' . _tr("Material") . '</th>
                                        <th>' . _tr("Option") . '</th>
                                            

                        </tr>
                    </tbody>
                </table>




            </div>



        </div>
    </div>
</div>
';





                //   $photo = addresses_photos_principal($address["id"]);
                //   $contact_name = contacts_field_id("name", $options["contact_id"]);
                //   $contact_lastname = contacts_field_id("lastname", $options["contact_id"]);
                echo "<tr id=\"$options[id]\">";
                echo "<td>$modal</td>";

                echo "<td>$options[id]</td>";

                echo '<td>';
                echo "</td>";




                echo "<td>" . ($options['option']) . "</td>";



                echo "<td>";
                foreach (_languages_list() as $key => $lan) {
                    $_translation = _translations_by_content_id_language($options['option'], $lan['language']);
                    echo "<b>" . $lan['name'] . "</b> : " . _tr($options['option'], $lan['language']);
                    echo "<br>";
                }
                echo "</td>";
                ?>
                <td>

                    <?php include "form_price_update.php"; ?>

                </td>

                <?php
                echo "<td>$options[tax]%</td>";
                //  echo "<td>$options[order_by]</td>" ;
                echo "<td>$options[status]</td>";


                echo '<td>';
                echo "</td>";


                echo "<td>$menu</td>";

                echo "</tr>";
                $i++;
            }
            ?>	
        </tr>
    </tbody>

</table>







