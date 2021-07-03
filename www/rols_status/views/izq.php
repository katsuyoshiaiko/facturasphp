<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "rols_status"); ?>
        <?php echo _t("Rols_status") ; ?>
    </a>
    
    <a href="index.php?c=rols_status" class="list-group-item"><?php _t("List") ; ?></a>
    
    <?php if( permissions_has_permission($u_rol, $c, "create")){?>
    <a href="index.php?c=rols_status&a=add" class="list-group-item"><?php _t("Add") ; ?></a> 
    <?php } ?>
    
</div>


<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "rols_status"); ?>
        <?php echo _t("By rol") ; ?>
    </a>

    <?php
    foreach ( rols_list_order_by("rango") as $key => $rol ) {
        
        $danger = ($rol['rango'] == 1)?"list-group-item-danger":""; 
        
        
        echo '<a href="index.php?c=rols_status&a=search&w=all&txt=' . $rol["rol"] . '" class="list-group-item '.$danger.'">' . $rol["rol"] . '</a>' ;
    }
    ?>

</div>