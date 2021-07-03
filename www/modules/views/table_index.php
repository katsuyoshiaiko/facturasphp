<style>
    .imgdisabled{
        opacity: 0.15; 
    }
img:hover {
  opacity: 0.5;
}
</style>



<div class="row">
  
    <?php 
    foreach ($modules as $key => $module) {
        
        if( permissions_has_permission($u_rol, $module['name'], 'read') ){
            $disabled = ""; 
            $hidden = false; 
        }else{
            $disabled = " disabled "; 
            $hidden = true; 
        }
        
        
        if( $module['status'] == 1){
            // esta activo, debo desactivar
            $class = ""; 
            $btn_status = '<a href="index.php?c=modules&a=ok_change_status&status=0&id='.$module['id'].'" '.$disabled.' class="btn btn-danger" role="button">'. _tr("Deactivate").'</a> '; 
        }else{
            // esta inactivo, debo activar
            $class = "imgdisabled";
            $btn_status = '<a href="index.php?c=modules&a=ok_change_status&status=1&id='.$module['id'].'" '.$disabled.' class="btn btn-default" role="button">'. _tr("Activate").'</a> '; 
        }
        
        
        echo '<div class="col-sm-6 col-md-4">
    <div class="thumbnail">
      <img class="'.$class.'" src="www/modules/views/img/'.$module['name'].'.jpg" alt="...">
      <div class="caption">
        <h3>'. ucfirst($module['name']).'</h3>
        <p>'.$module['description'].'</p>
        <p>
      
        '; 
          
        if( $hidden ){
            
            message("info", "You do not have permission to view this module");                          
            
        }else{
            echo '

        <a href="index.php?c=modules&a=details&id='.$module['id'].'" '.$disabled.' class="btn btn-primary" role="button">'. _tr("Details").'</a> 
        
        '.$btn_status.'
        
        </p>'; 
                    
        }
                
                
        echo   '

      </div>
    </div>
  </div>'; 
        
        
        
        
        
        
    }
    ?>
</div>
