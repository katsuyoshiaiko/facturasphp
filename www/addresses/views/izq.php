
<div class="list-group">
    <a href="#" class="list-group-item active">
        
        <?php //echo vardump(_menu_icon_by_location_label("top" , "addresses"))?>
        <?php _menu_icon("top", "addresses"); ?>
        
        
        <?php echo _t("Addresses") ; ?>
    </a>
    <a href="index.php?c=addresses" class="list-group-item"><?php _t("List") ; ?></a>
    

    
</div>

<div class="panel panel-primary">
    <div class="panel-heading">
        <?php echo _t("Search by contact"); ?>
    </div>
  <div class="panel-body">
    <?php include "form_search.php";  ?>
  </div>
</div>