
<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "_menus"); ?>
        <?php echo _t("_menus"); ?>
    </a>
    <a href="index.php?c=_menus" class="list-group-item"><?php _t("List"); ?></a>
    <a href="index.php?c=_menus&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "_menus"); ?>
        <?php echo _t("by location"); ?>
    </a>

    <?php 
    foreach ( _menus_location_list() as $key => $item ) { ?>
        <a 
            href="index.php?c=_menus&a=search&w=location&txt=<?php echo "$item[location]"; ?>" 
           class="list-group-item">
               <?php _t($item['location']); ?>
        </a> 
    <?php }
    ?>
    
    <?php 
    /*
    
    <a href="index.php?c=_menus&a=search&w=location&txt=top" class="list-group-item"><?php _t("top"); ?></a> 
    <a href="index.php?c=_menus&a=search&w=location&txt=side_contacts" class="list-group-item"><?php _t("side_contacts"); ?></a> 
    <a href="index.php?c=_menus&a=search&w=location&txt=side_products" class="list-group-item"><?php _t("side_products"); ?></a> 
    
    */
    ?>
</div>











<form action="index.php" method="get">
    
    <input type="hidden" name="c" value="_menus">
    <input type="hidden" name="a" value="search">
    <input type="hidden" name="w" value="lf">
    
    <div class="form-group">
        <label for="l"><?php _t("Location"); ?></label>
        <select class="form-control" name="l">
            <option value="top">top</option>
        </select>
    </div>
    
    
    <div class="form-group">
        <label for="f"><?php _t("Father"); ?></label>
        <select class="form-control" name="f">            
            <?php 
            $f = array("admin","config","magia", "products", "root", "accounting");
            foreach ($f as $value) {
               echo '<option value="'.$value.'">'.$value.'</option>';
            }?>                        
        </select>
    </div>
    

    
    <button type="submit" class="btn btn-default"><?php _t("Search"); ?></button>
</form>

