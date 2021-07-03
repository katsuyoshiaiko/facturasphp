<div class="list-group">
    <a href="#" class="list-group-item active">
        <i class="fas fa-map-marker"></i>
            <?php echo _t("_options"); ?>
    </a>
    <a href="index.php?c=_options" class="list-group-item"><?php _t("List"); ?></a>
     <a href="index.php?c=_options&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
</div>



<div class="list-group">
    <a href="#" class="list-group-item active">
        <i class="fas fa-map-marker"></i>
            <?php echo _t("By group"); ?>
    </a>
    
   <?php 
   foreach ( _options_list_groups() as $key => $value ) {
    echo '<a href="index.php?c=_options&a=search&w=byGroup&g='.$value['group'   ].'&" class="list-group-item">'.$value['group'].'</a>';    
   }
   ?>  
</div>


<div class="list-group">
    <a href="#" class="list-group-item active">
        <i class="fas fa-map-marker"></i>
            <?php echo _t("Debug"); ?>
    </a>
    <a href="index.php?c=_options&a=ok_debugOn" class="list-group-item"><?php _t("Debug on"); ?></a>     
    <a href="index.php?c=_options&a=ok_debugOff" class="list-group-item"><?php _t("Debug off"); ?></a>     
</div>


<?php 
echo (_options_option("debug"))? "Debug ON": " Debug off"; 
?>


