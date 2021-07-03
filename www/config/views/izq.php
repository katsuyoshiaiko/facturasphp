<?php if (modules_field_module('status', 'accounting')) { ?>
    <div class="list-group">
        <a href="#" class="list-group-item <?php 
        
        echo ( in_array($c, array(
            'tax',
            'banks',
            'config',
            'doc_models',
            
            
            ))) ? " active " : ""; 
        
        
        ?>">
            <?php _menu_icon("top", "config"); ?>
            <?php echo _t("Config"); ?>
        </a>
        <a href="index.php?c=tax" class="list-group-item">
            <?php _menu_icon("top", "tax"); ?>
            <?php _t("Tax"); ?></a>    
        <?php /* <a href="index.php?c=config&a=company" class="list-group-item"><?php _t("My company"); ?></a>    */ ?>
        <a href="index.php?c=banks" class="list-group-item"><?php _menu_icon("top", "banks"); ?> <?php _t("Banks"); ?></a>
        <a href="index.php?c=config&a=invoices_expiration_days" class="list-group-item"><?php _menu_icon("top", "invoices_expiration_days"); ?> <?php _t("Invoices expiration days"); ?></a>
        <a href="index.php?c=config&a=logo" class="list-group-item"><?php _menu_icon("top", "config"); ?> <?php _t("Logo"); ?></a>
        <a href="index.php?c=config&a=web" class="list-group-item"><?php _menu_icon("top", "config"); ?> <?php _t("My web site"); ?></a>
        <a href="index.php?c=config&a=home_page" class="list-group-item"><?php _menu_icon("top", "config"); ?> <?php _t("Home page"); ?></a>
        <a href="index.php?c=config&a=tva" class="list-group-item"><?php _menu_icon("top", "config"); ?> <?php _t("My vat number"); ?></a>    
        <a href="index.php?c=config&a=email" class="list-group-item"><?php _menu_icon("top", "config"); ?> <?php _t("Email"); ?></a>    


        <?php
        if (
                permissions_has_permission($u_rol, 'doc_models', 'read') &&
                modules_field_module('status', modules_search_module_by_sub_module('doc_models'))
        ) {
            ?>

            <a href="index.php?c=doc_models" class="list-group-item"><?php _menu_icon("top", "config"); ?> <?php _t("Pdf models"); ?></a>    

        <?php } ?>





    </div>
<?php } ?>







<?php if (modules_field_module('status', 'products')) { ?>

    <div class="list-group">
        <a href="#" class="list-group-item <?php
        echo ( in_array($c, array(
            'products_categories',
            'products_stock',
        ))) ? " active " : "";
        ?>">


            <?php _menu_icon("top", "products"); ?>
            <?php echo _t("Products"); ?>
        </a>

        <a 
            href="index.php?c=products" 
            class="list-group-item">
                <?php _menu_icon("top", "products"); ?>
                <?php _t("Products"); ?>
        </a>
        <a 
            href="index.php?c=products_categories" 
            class="list-group-item">
                <?php _menu_icon("top", "products_categories"); ?>
                <?php _t("Categories"); ?>
        </a>

        <a 
            href="index.php?c=products_stock" 
            class="list-group-item">
                <?php _menu_icon("top", "products_stock"); ?>
                <?php _t("Stock"); ?>
        </a>
    </div>
<?php } ?>




<?php if (permissions_has_permission($u_rol, 'system', 'read')) { ?>
    <div class="list-group">

        <a href="#" class="list-group-item <?php
        echo ( in_array($c, array(
            '_options',
            'transport',
            'countries',
            'holidays',
            
        ))) ? " active " : "";
        ?>">

            <?php _menu_icon("top", "system"); ?>
            <?php echo _t("Sistem"); ?>
        </a>

        <a 
            href="index.php?c=_options" 
            class="list-group-item">
                <?php _menu_icon("top", "_options"); ?>
                <?php _t("Options"); ?>
        </a>

        <?php if (modules_field_module('status', 'transport')) { ?>
            <a 
                href="index.php?c=transport" 
                class="list-group-item">
                    <?php _menu_icon("top", "transport"); ?>
                    <?php _t("Transport"); ?>
            </a>
        <?php } ?>




        <a 
            href="index.php?c=countries" 
            class="list-group-item">
                <?php _menu_icon("top", "countries"); ?>  
                <?php _t("Countries"); ?>
        </a>


        <a 
            href="index.php?c=holidays" 
            class="list-group-item">
                <?php _menu_icon("top", "holidays"); ?>
                <?php _t("Holidays"); ?>
        </a>

        <?php
        /* <a 
          href="index.php?c=config&a=debug_lang"
          class="list-group-item">
          <?php _t("Debug lang"); ?>
          </a> */
        ?>
    </div>

<?php } ?>











<div class="list-group">

    <a href="#" class="list-group-item <?php
    echo ( in_array($c, array(
        'modules',
    ))) ? " active " : "";
    ?>">

        <?php _menu_icon("top", 'modules'); ?>
        <?php echo _t("Modules"); ?>
    </a>
    <a href="index.php?c=modules" class="list-group-item"><?php _t("List"); ?></a>
    <a href="index.php?c=modules&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
</div>