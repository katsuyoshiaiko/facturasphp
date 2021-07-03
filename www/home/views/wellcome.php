<?php include view("home", "header"); ?>



<div class="container-fluid">
    <div class="col-lg-3"></div>
    <div class="col-lg-4">

     
        
        


        <?php 
    //    echo vardump($html); 
        ?>




        <?php
// no tiene direccion de facturacion

        if ($u_rol == "labo") {
            if (!shop_addresses_billing()) {
                echo '<div class="alert alert-danger" role="alert"><h3>' . _tr("Add billing address beford") . ' <a href="index.php?c=shop&a=addressNew">here</a></h3></div>';
            }


// no tiene direccion de facturacion
            if (!shop_addresses_delivery()) {
                echo '<div class="alert alert-danger" role="alert"><h3>' . _tr("Add your delivery address") . ' <a href="index.php?c=shop&a=addressNew">here</a></h3></div>';
            }
        }
        ?>



    </div>
    <div class="col-lg-4"></div>
</div>





<?php include view("home", "footer"); ?>