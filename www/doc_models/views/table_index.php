


<div class="row">

    <?php
    foreach ($doc_models as $key => $model) {

        include "www/doc_models/views/$model/_description.php";

        ////vardump(_options_option("doc_model")); 

        if (_options_option("doc_model") == $model) {
            // esta activo, debo desactivar
            $btn_status = '<a href="#" class="btn btn-danger" role="button">' . _tr("In use") . '</a> ';
        } else {
            // esta inactivo, debo activar
            $btn_status = '<a href="index.php?c=doc_models&a=ok_change_model&model=' . $model . '" class="btn btn-default" role="button">' . _tr("Activate") . '</a> ';
        }

        if ($actived) {



            echo '<div class="col-sm-6 col-md-3">
    <div class="thumbnail">
      <img src="www/doc_models/views/' . $model . '/' . $model . '.jpg" alt="...">
      <div class="caption">
        <h3>' . $name . '</h3>
        <p>' . $description . '</p>
        <p>
        
        ' . $btn_status . '    
            
        
        </p>
      </div>
    </div>
  </div>';
        }
    }
    ?>
</div>
