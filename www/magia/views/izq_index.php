
<div class="list-group">
    <a href="#" class="list-group-item active">
        <i class="fas fa-map-marker"></i>
        <?php echo _t("Data bases"); ?>
    </a>
    <a href="index.php?c=magia" class="list-group-item"><?php _t("List"); ?></a>
    <a href="index.php?c=magia&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
</div>





<div class="list-group">
    <a href="#" class="list-group-item active">
        <i class="fas fa-map-marker"></i>
        <?php echo _t("Tables"); ?>
    </a>

    <?php        
    foreach (magia_db_list_tables_by_db($config_db) as $key => $campo) {
        echo '<a href="index.php?c=magia&a=search&w=by_table_field&table=' . $table . '&field='.$campo['campo'].'" class="list-group-item">' . $campo['campo'] . '</a>';
    }
    ?>

   
   
</div>