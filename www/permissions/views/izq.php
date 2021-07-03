
<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "permissions"); ?>
            <?php echo _t("Permissions"); ?>
    </a>
    <a href="index.php?c=permissions" class="list-group-item"><?php _t("List"); ?></a>
     <a href="index.php?c=permissions&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
     <?php /* <a href="index.php?c=permissions&a=addAll" class="list-group-item"><?php _t("AddAll"); ?></a> */ ?>
</div>




<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "permissions"); ?>
            <?php echo _t("List by rols"); ?>
    </a>
    <?php foreach (rols_list_order_by("rango") as $key => $value) {
        
        $danger = ($value['rango'] <= $config_rango_max_for_labo)?"list-group-item-danger":""; 
        
        echo '<a href="index.php?c=permissions&a=search&w=byRol&rol='.$value['rol'].'" class="list-group-item '.$danger.'">'.$value['rol'].'</a>'; 
    }?>
</div>