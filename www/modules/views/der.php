
<div class="panel panel-primary">
    <div class="panel-heading">
        <?php _menu_icon("top" , 'modules'); ?>
        <?php _t($modules['name']); ?>
    </div>
  <div class="panel-body">

           
      <form action="index.php" method="get" class="navbar-form navbar-left">
          <input type="hidden" name="c" value="modules">
          <input type="hidden" name="a" value="ok_change_status">
          <input type="hidden" name="id" value="<?php echo "$id"; ?>">   
          
          <?php 
          if( $modules['status'] == 1  ){
              // activo              
              echo '<input type="hidden" name="status" value="0">'; 
              echo '<button type="submit" class="btn btn-danger">'. _tr("Disable") .'</button>'; 
          }else{
              // inactivo
              echo '<input type="hidden" name="status" value="1">';
              echo '<button type="submit" class="btn btn-primary">'. _tr("Active") .'</button>'; 
          }
          ?>
          
        
      </form>
      
      
  </div>
</div>





<div class="panel panel-primary">
    <div class="panel-heading">
        <?php _menu_icon("top" , 'modules'); ?>
        <?php _t("Sub modules"); ?>
    </div>
  <div class="panel-body">
      <p>Sub modulos</p>      
    <?php   
    
    //$sm = modules_search_sub_modules_by_module($modules['name']); 
    
    //vardump($sm); 
    
     $sub_modules = explode(", ", modules_search_sub_modules_by_module($modules['name'])); 
     $i=1;           
     foreach ($sub_modules as $key => $sm) {
         echo $i++ . " $sm <br>";          
     }                                    
    ?>          
  </div>
</div>





<div class="panel panel-primary">
    <div class="panel-heading">
        <?php _menu_icon("top" , 'modules'); ?>
        <?php _t("Sub modules"); ?>
    </div>
  <div class="panel-body">

      <p>Sub modulos huerfanos</p>
      
   
      
      
      
    <?php 
    //    vardump($directory); 
        
    $folder_list = array_diff(scandir("www") , array( '..' , '.' , '.*' )) ;
    
    //vardump($folder_list); 
    
    $sub_moduls_orphans = array(); 
    
    $module = $modules['name']; 
    
    $i=1; 
    foreach ($folder_list as $key => $folder) {
        // verifico si es un directorio
        
        if(  is_dir("www/".$folder)){
                    
            if( modules_search_module_by_sub_module($folder) ){
                array_push($sub_moduls_orphans, $folder); 
               // echo "$folder<br>"; 
            }else{
                echo $i++ . " <a href='index.php?c=modules&a=ok_add_sm2m&module=$modules[name]&sm=$folder&id=$id'>$folder</a> <br>"; 
            }
        
        }
        
        
    }
    
    //vardump($sub_moduls_orphans); 
    
    
    
    ?>






      
      
  </div>
</div>






