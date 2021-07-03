<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-lg-3">
        <?php include view("config", "izq"); ?>
    </div>

    <div class="col-lg-9">
        <?php include view("config", "nav"); ?>


        <?php
        if ($m) {
            foreach ($m as $key => $value) {
                message("info", "$value");
            }
        }
        ?>

        <h1><?php _t("Invoices"); ?></h1>

        Prefijo 
        tva por defecto 
        idioma por defecto 
        email tmp por defecto 
        
        Terminios por defecto (notas)
        
        Activar envio de email 
        crear numeros automaticamete 
        
        Pdf template
        -Color 
        - Mostrar codigo QR
        - Mostrar codigo de barras
        - Texto en header
        - Texto en footer
        
        ---<!-- Recordatorios -->
        x dias fecha de expira 
        rapel 1 x dias despues de fecha expira
        rapel 2 x dias despues de fecha expira
        rapel 3 x dias despues de fecha expira
        r1
        Tmp email recordatorio 
        tmp pdf recordatorio
        r2
        Tmp email recordatorio 
        tmp pdf recordatorio
        r3
        Tmp email recordatorio 
        tmp pdf recordatorio
        
        Sender rappels al cliente (si,no)
        Sender rappels al admin (si,no)
        Sender rappels a quien creo la factura (si,no)




    </div>
</div>

<?php include view("home", "footer"); ?> 

