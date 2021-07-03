<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-lg-3">
        <?php include view("_diccionario", "izq"); ?>
    </div>

    <div class="col-lg-9">
       <?php include view("_diccionario", "nav"); ?>


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

        <?php 
echo vardump(_diccionario_search_translation_by_content_lang("Action don't send" , 'es_ES')); 
        ?>

            <table class="table table-striped">
                <thead>
                    <tr>
                      <th><?php _t("Id"); ?></th>
                      <th><?php _t("Content"); ?></th>
                      <th><?php _t("Language"); ?></th>
                      <th><?php _t("Translation"); ?></th>
                      <th><?php _t("Order_by"); ?></th>
                      <th><?php _t("Status"); ?></th>
                                                                       
                      <th><?php _t("Action"); ?></th>                                                                      
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php
                        
                        
                        if( ! $_diccionario ){
                            message("info", "No items"); 
                        }
                        
                        
                        //foreach ($liste_info as $address) {
                        foreach ($_diccionario as $_diccionario) {

                            
                            $menu='<div class="dropdown">
                            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                              '._tr("Actions").'
                              <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                              <li><a href="index.php?c=_diccionario&a=details&id='.$_diccionario["id"].'">'._tr("Details").'</a></li>
                              <li><a href="index.php?c=_diccionario&a=edit&id='.$_diccionario["id"].'">'._tr("Edit").'</a></li>
                              <li role="separator" class="divider"></li>
                              <li><a href="index.php?c=_diccionario&a=delete&id='.$_diccionario["id"].'">'._tr("Delete").'</a></li>
                            </ul>
                          </div>'; 
                         //   $photo = addresses_photos_principal($address["id"]);
                         //   $contact_name = contacts_field_id("name", $_diccionario["contact_id"]);
                         //   $contact_lastname = contacts_field_id("lastname", $_diccionario["contact_id"]);
                         echo "<tr id=\"$_diccionario[id]\">"; 
                         echo "<td>$_diccionario[id]</td>";
                         echo "<td>$_diccionario[content]</td>";
                         echo "<td>$_diccionario[language]</td>";
                         echo "<td>$_diccionario[translation]</td>";
                         echo "<td>$_diccionario[order_by]</td>";
                         echo "<td>$_diccionario[status]</td>";
                              
                         echo "<td>$menu</td>";
                          
                            echo "</tr>";
                        }
                        ?>	
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                                             <th><?php _t("Id"); ?></th>
                     <th><?php _t("Content"); ?></th>
                     <th><?php _t("Language"); ?></th>
                     <th><?php _t("Translation"); ?></th>
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

