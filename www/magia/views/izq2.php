
<div class="list-group">
    <a href="#" class="list-group-item active">
        <i class="fas fa-map-marker"></i>
        <?php echo _t("Fields"); ?>
    </a>
    <a href="index.php?c=magia" class="list-group-item"><?php _t("List"); ?></a>
    <a href="index.php?c=magia&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
</div>





<div class="list-group">
    <a href="#" class="list-group-item active">
        <i class="fas fa-map-marker"></i>
        <?php echo _t("Fields in") . ": $table"; ?>
    </a>

    <?php        
    foreach (magia_db_list_campos_by_table($table) as $key => $campo) {
        echo '<a href="index.php?c=magia&a=search&w=by_table_field&table=' . $table . '&field='.$campo['campo'].'" class="list-group-item">' . $campo['campo'] . '</a>';
    }
    ?>

   
   
</div>