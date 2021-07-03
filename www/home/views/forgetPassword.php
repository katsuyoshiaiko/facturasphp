<?php include view("home" , "header") ; ?>

<div class="container-fluid">
    <div class="col-lg-4"></div>
    <div class="col-lg-4">

        <?php
        if ( $_REQUEST ) {
            foreach ( $error as $key => $value ) {
                message("info" , "$value") ;
            }
        }
        
        
        
        
        
        include "form_forgetPassword.php" ;

        /*         * *
         * 1 solicita la recuperacion de la clave 
         * registro solicitud valida por una hora 
         * mando email con enlace para reiniciar clave
         * el usuario acede a nueva pagina y accede para cambiar clave
         * 
         * 
         */
        ?>
    </div>
    <div class="col-lg-4"></div>
</div>


<?php include view("home" , "footer") ; ?>