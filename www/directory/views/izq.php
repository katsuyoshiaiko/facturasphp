
<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "directory"); ?>
            <?php echo _t("Directory"); ?>
    </a>
    <a href="index.php?c=directory" class="list-group-item"><?php _t("List"); ?></a>
     <?php /*<a href="index.php?c=directory&a=add" class="list-group-item"><?php _t("Add"); ?></a> */?>
</div>



<div class="panel panel-primary">
    <div class="panel-heading">
        <?php _menu_icon("top", "directory"); ?>
        <?php echo _t("Search by contact"); ?>
    </div>
  <div class="panel-body">
    <?php include "form_search.php";  ?>
  </div>
</div>











