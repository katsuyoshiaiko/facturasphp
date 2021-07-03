<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-lg-3">
        <?php //include view("_content", "izq"); ?>
    </div>

    <div class="col-lg-9">
        <?php include view("_content", "nav"); ?>


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
                    <th><?php _t("#"); ?></th>
                    <th><?php _t("Id"); ?></th>
                    <th><?php _t("encoding"); ?></th>                    
                    <th><?php _t("Frase"); ?></th>
                    <th><?php _t("Contexto"); ?></th>
                    <th><?php _t("Languages"); ?></th>
                    <th><?php _t("Action"); ?></th>                                                                      
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php
                    if (!$_content) {
                        message("info", "No items");
                    }
                    $i = 1;

                    //foreach ($liste_info as $address) {
                    
                    foreach ($_content as $_content_item) {

                        $lang = array();
                        foreach (_languages_list() as $key => $_languages_list) {
                            array_push($lang, $_languages_list["language"]);
                        }




                        $menu = '<div class="dropdown">
                            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                              '._tr("Actions").'
                              <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                              <li><a href="index.php?c=_content&a=details&id=' . $_content_item["id"] . '">' . _tr("Details") . '</a></li>
                              <li><a href="index.php?c=_content&a=edit&id=' . $_content_item["id"] . '">' . _tr("Edit") . '</a></li>
                              <li role="separator" class="divider"></li>
                              <li><a href="index.php?c=_content&a=delete&id=' . $_content_item["id"] . '">' . _tr("Delete") . '</a></li>
                            </ul>
                          </div>';
                        //   $photo = addresses_photos_principal($address["id"]);
                        //   $contact_name = contacts_field_id("name", $_content_item["contact_id"]);
                        //   $contact_lastname = contacts_field_id("lastname", $_content_item["contact_id"]);
                        echo "<tr id=\"$_content_item[id]\">";
                        echo "<td>$i</td>";
                        echo "<td>$_content_item[id]</td>";
                        echo "<td>" . mb_detect_encoding($_content_item['frase']) . "</td>"; 
                        echo "<td>$_content_item[frase]</td>";
                        echo "<td>$_content_item[contexto]</td>";
                        echo "<td>";
                        foreach ($lang as $key => $l) {
                            //echo (_translations_by_content_language($_content_item["frase"], $l)) ? '<span class="label label-info">' . $l . '</span> ' : '<span class="label label-default">' . $l . '</span> ';
                            include (_translations_by_content_language($_content_item["id"], $l)) ? view("_content", "modal_details") : view("_content", "modal_add");
                        } echo "</td>";

                        echo "<td>$menu</td>";

                        echo "</tr>";
                        $i++;
                    }
                    ?>	
                </tr>
            </tbody>
            <tfoot>
                 <tr>
                    <th><?php _t("#"); ?></th>
                    <th><?php _t("Id"); ?></th>
                    <th><?php _t("Frase"); ?></th>
                    <th><?php _t("Contexto"); ?></th>
                    <th><?php _t("Languages"); ?></th>
                    <th><?php _t("Action"); ?></th>                                                                      
                </tr>
            </tfoot>
        </table>







        <?php
        
         pagination("index.php?c=$c" , $totalItems , $itemsByPage , $page); 
         
         
        /*
          Export:
          <a href="index.php?c=addresses&a=export_json">JSON</a>
          <a href="index.php?c=addresses&a=export_pdf">pdf</a>
         */
        ?>


    </div>
</div>

<?php include view("home", "footer"); ?> 

