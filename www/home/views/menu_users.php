<div class="container">
    <div class="row">
        <div class="col-lg-12">

            <a href="index.php"><?php logo(150) ; ?></a>
        </div>   
        <?php 
        echo (count(discounts_mode_list()) > 2)? "<h1>Se agrego un discount mode </h1>":"";
         ?>
    </div>
</div>




<?php
if ( permissions_has_permission($u_rol , "shop" , "read") ) {

    //include "menu_labo.php" ;
    include view("home", "menu_labo"); 
    //include view("home", "menu_root"); 
    
} else {

    //include "menu_root.php" ;
    include view("home", "menu_root"); 
    if( $theme == 'factux'){
        include view("home", "menu_factux"); 
    }
    
}
?>