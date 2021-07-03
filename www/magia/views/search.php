<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-lg-2">
        <?php include view("magia", "izq"); ?>
    </div>
    <div class="col-lg-2">
        <?php include view("magia", "izq2"); ?>
    </div>

    <div class="col-lg-8">
       <?php include view("magia", "nav"); ?>


        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>

<div>

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active">
        <a href="#home" 
           aria-controls="home" 
           role="tab" 
           data-toggle="tab">form_add.php</a></li>
    <li role="presentation">
        <a href="#profile" 
           aria-controls="profile" 
           role="tab" 
           data-toggle="tab">form_delete.php</a></li>
    <li role="presentation">
        <a href="#form_details" 
           aria-controls="form_details" 
           role="tab" 
           data-toggle="tab">form_details.php</a></li>
    <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Settings</a></li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="home">...</div>
    <div role="tabpanel" class="tab-pane" id="profile">...</div>
    <div role="tabpanel" class="tab-pane" id="form_details">
        <?php include "tmp_form_details.php"; ?>
    </div>
    <div role="tabpanel" class="tab-pane" id="settings">...</div>
  </div>

</div>

<?php 
// https://api.jquery.com/prop/
?>


            <table class="table table-striped">
                <thead>
                    <tr>
                      <th><?php _t("Id"); ?></th>
                      <th><?php _t("Base_datos"); ?></th>
                      <th><?php _t("Tabla"); ?></th>
                      <th><?php _t("Campo"); ?></th>
                      <th><?php _t("Accion"); ?></th>
                      <th><?php _t("Label"); ?></th>
                      <th><?php _t("Tipo"); ?></th>
                      <th><?php _t("Clase"); ?></th>
                      <th><?php _t("Tabla_externa"); ?></th>
                      <th><?php _t("Columna_externa"); ?></th>
                      <th><?php _t("Nombre"); ?></th>
                      <th><?php _t("Identificador"); ?></th>
                      <th><?php _t("Marca_agua"); ?></th>
                      <th><?php _t("Valor"); ?></th>
                      <th><?php _t("Solo_lectura"); ?></th>
                      <th><?php _t("Obligatorio"); ?></th>
                      <th><?php _t("Seleccionado"); ?></th>
                      <th><?php _t("Desactivado"); ?></th>
                      <th><?php _t("Orden"); ?></th>
                      <th><?php _t("Estatus"); ?></th>
                                                                       
                      <th><?php _t("Action"); ?></th>                                                                      
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php
                        
                        
                        if( ! $magia ){
                            message("info", "No items"); 
                        }
                        
                        
                        //foreach ($liste_info as $address) {
                        foreach ($magia as $magia) {

                            
                            $menu='<div class="dropdown">
                            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                              Actions
                              <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                              <li><a href="index.php?c=magia&a=details&id='.$magia["id"].'">'._tr("Details").'</a></li>
                              <li><a href="index.php?c=magia&a=edit&id='.$magia["id"].'">'._tr("Edit").'</a></li>
                              <li role="separator" class="divider"></li>
                              <li><a href="index.php?c=magia&a=delete&id='.$magia["id"].'">'._tr("Delete").'</a></li>
                            </ul>
                          </div>'; 
                         //   $photo = addresses_photos_principal($address["id"]);
                         //   $contact_name = contacts_field_id("name", $magia["contact_id"]);
                         //   $contact_lastname = contacts_field_id("lastname", $magia["contact_id"]);
                         echo "<tr id=\"$magia[id]\">"; 
                         echo "<td>$magia[id]</td>";
                         echo "<td>$magia[base_datos]</td>";
                         echo "<td>$magia[tabla]</td>";
                         echo "<td>$magia[campo]</td>";
                         echo "<td>$magia[accion]</td>";
                         echo "<td>$magia[label]</td>";
                         echo "<td>$magia[tipo]</td>";
                         echo "<td>$magia[clase]</td>";
                         echo "<td>$magia[tabla_externa]</td>";
                         echo "<td>$magia[columna_externa]</td>";
                         echo "<td>$magia[nombre]</td>";
                         echo "<td>$magia[identificador]</td>";
                         echo "<td>$magia[marca_agua]</td>";
                         echo "<td>$magia[valor]</td>";
                         echo "<td>$magia[solo_lectura]</td>";
                         echo "<td>$magia[obligatorio]</td>";
                         echo "<td>$magia[seleccionado]</td>";
                         echo "<td>$magia[desactivado]</td>";
                         echo "<td>$magia[orden]</td>";
                         echo "<td>$magia[estatus]</td>";
                              
                         echo "<td>$menu</td>";
                          
                            echo "</tr>";
                        }
                        ?>	
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                                             <th><?php _t("Id"); ?></th>
                     <th><?php _t("Base_datos"); ?></th>
                     <th><?php _t("Tabla"); ?></th>
                     <th><?php _t("Campo"); ?></th>
                     <th><?php _t("Accion"); ?></th>
                     <th><?php _t("Label"); ?></th>
                     <th><?php _t("Tipo"); ?></th>
                     <th><?php _t("Clase"); ?></th>
                     <th><?php _t("Tabla_externa"); ?></th>
                     <th><?php _t("Columna_externa"); ?></th>
                     <th><?php _t("Nombre"); ?></th>
                     <th><?php _t("Identificador"); ?></th>
                     <th><?php _t("Marca_agua"); ?></th>
                     <th><?php _t("Valor"); ?></th>
                     <th><?php _t("Solo_lectura"); ?></th>
                     <th><?php _t("Obligatorio"); ?></th>
                     <th><?php _t("Seleccionado"); ?></th>
                     <th><?php _t("Desactivado"); ?></th>
                     <th><?php _t("Orden"); ?></th>
                     <th><?php _t("Estatus"); ?></th>
                                                                     
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

