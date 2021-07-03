<?php
//vardump($options_options);
$option_id = intval($options_options['option_id']);
$tmf_id = ($options_options['tmf_id']);
$type_id = _types_modeles_formes_field_id('type_id', $options_options['tmf_id']);
$material_id = ($options_options['material_id']);

$_tmf_materials_options_id = _tmf_materials_options_search_id_by_by_tmf_material_option_id($tmf_id, $material_id, $option_id); 

//vardump($_tmf_materials_options_id); 

$disabled_id_array = array();

// lista de id disabled
$_options_options_disabled_id = _options_options_search_disabled_id_by_tmf_materials_options_id($_tmf_materials_options_id);

//vardump($_options_options_disabled_id); 



foreach ($_options_options_disabled_id as $key => $value) {
    array_push($disabled_id_array, $value['disabled_id']);
}

//vardump($disabled_id_array); 

//vardump(array($_tmf_materials_options_id, $disabled_id_array));

?>

<h1><?php echo options_field_id('option', $option_id); ?></h1>

<p><?php _t("Selected options are disabled for option"); ?>: <b><?php echo options_field_id('option', $option_id); ?></b></p>

<form class="form-horizontal" method="post" action="index.php">

    <input type="hidden" name="c" value="_options_options">
    <input type="hidden" name="a" value="addOk">
    <input type="hidden" name="type_id" value="<?php echo $type_id;     ?>">
    <input type="hidden" name="_tmf_materials_options_id" value="<?php echo $_tmf_materials_options_id; ?>">
    
    
    
<?php
$i = 1;
foreach (_tmf_materials_options_by_tmf_material_id($tmf_id, $material_id) as $key => $option) {
    $_tmf_materials_options_id = $option['id'];
    $options_id = $option['option_id'];
    //vardump($type_id); 
    $disabled = ( $option_id == $option['option_id']) ? ' disabled ' : '';
//        
    // Si el id esta presente el el array de disables
    $checked = ( in_array($option['option_id'], $disabled_id_array) ) ? ' checked="" ' : "";
    ?>
        <?php if (!$disabled) { ?>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <div class="checkbox">
                        <label>

                            <input type="checkbox" name="disabled_id[]" value="<?php echo $option['option_id']?>" <?php echo "$checked $disabled "; ?> > 
                            <?php //echo $i; ?> 
                                <?php // echo ($_tmf_materials_options_id); ?> 
                                <?php //echo $option['option_id']; ?>

                                <?php echo options_field_id('option', $option['option_id']); 
                                //echo var_dump(options_field_id('option', $option['option_id'])); 
                                ?>



                        </label>
                    </div>
                </div>
            </div>
                        <?php } else { ?>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <div class="checkbox">
                        <label>

                            <div class="alert alert-success" role="alert"><b> 
                            <?php //echo $_tmf_materials_options_id; ?>
                            <?php //echo $option['option_id']; ?> 

                             <?php echo $checked . options_field_id('option', $option['option_id']); ?>**</b>



                            </div>

                        </label>
                    </div>
                </div>
            </div>

    <?php } ?>
    <?php $i++;
} ?>







    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <p><?php _t("Do you really want to disable the selected options?"); ?></p>
            <button type="submit" class="btn btn-danger"><?php _t("Yes, deactivate now"); ?></button>
        </div>
    </div>

</form>


























<?php
/*



  <div class="panel panel-default">
  <div class="panel-heading">
  OPTION:
  <?php echo options_field_id('option', $option_id) ?>
  </div>
  <div class="list-group">
  <?php
  foreach (_tmf_materials_options_by_tmf_material_id($tmf_id, $material_id) as $key => $option) {
  $disabled = (1 == 1) ? '<span class="badge ">' . _tr('Disabled') . '</span>' : "";
  ?>
  <a href="#" class="list-group-item"><?php echo options_field_id('option', $option['option_id']); ?><?php echo $disabled; ?></a>

  <?php } ?>
  </div>
  </div>
 * 
 * 
 * 
 * 
 * 
 * 
 *  <form class="form-horizontal" action="index.php" method="post" >
  <input type="hidden" name="c" value="options_options">
  <input type="hidden" name="a" value="edit_disabled">
  <input type="hidden" name="type_id" value="<?php echo "$options_options[id]"; ?>">


  <?php
  $i = 1; // esto sirbe para selecionar el sigueinte de la lista
  // despues de los items
  foreach ($options_options as $key => $value) {

  $pos = count($options_options) - 2;

  $type_id = $value['type_id'];

  $option_actual = intval($options_options[$pos]['option_actual']);

  $options_disabled_list = $options_options[$pos + 1]['disabled_list'];

  // $checked = ($value['option_id'] == $items['disabled_id'] )? " checked " : " ** " ;

  $disabled = ( $value['option_id'] == $option_actual ) ? " disabled " : "";

  //  vardump($items['disabled_id']);
  //  vardump($options_disabled_list);

  foreach ($options_disabled_list as $key => $opt) {
  if ($value['option_id'] == $opt['disabled_id']) {
  $checked = " checked ";
  break;
  }
  }




  // si es opcion lo muestro
  if (isset($value['option_id'])) {
  ?>
  <div class="form-group">
  <div class="col-sm-offset-2 col-sm-10">
  <div class="checkbox">

  <label>
  <input name="disabled_id[]" type="checkbox"<?php echo "$checked $disabled"; ?> value="<?php echo $value['option_id']; ?>">
  <?php echo options_field_id("option", $value['option_id']); ?>
  <?php //echo $i;  ?>
  <?php echo $value['option_id']; ?>
  <?php //echo $options_options[$pos]['option_actual'];  ?>
  <?php //echo $disabled;  ?>
  <?php //echo  $pos;  ?>
  <?php echo $checked; ?>
  </label>

  <?php
  if ($disabled) {
  echo '<span class="glyphicon glyphicon-ok"></span>';
  }
  ?>


  </div>
  </div>
  </div>
  <?php
  }
  $i++;
  $disabled = "";
  $checked = "";
  }
  ?>



  <div class="form-group">
  <label class="control-label col-sm-2" for=""></label>
  <div class="col-sm-8">
  <input class="btn btn-primary active" type ="submit" value ="<?php _t("Deactivate"); ?>">
  </div>
  </div>

  </form>

 */
?>