

<?php include view("home" , "header") ; ?>  


<?php include "nav_details.php";  ?>



<div class="row">
    <div class="col-lg-2">
        <?php //include view("balance" , "izq") ; ?>
    </div>

    <div class="col-lg-8">
        


        <?php
        if ( $_REQUEST ) {
            foreach ( $error as $key => $value ) {
                message("info" , "$value") ;
            }
        }
        ?>



        <div class="well">

            <div class="row">
                <div class="col-lg-9">


                    <?php _t("Id") ; ?> : <?php echo $balance['id'] ; ?> <br>
                    <?php _t("Invoice") ; ?>: <?php echo $balance['invoice_id'] ; ?> <br>
                    <?php _t("Credit Note Id") ; ?>: <?php echo $balance['credit_note_id'] ; ?> <br>

                </div>
                <div class="col-lg-3">
                    <?php _t("Account") ; ?> : <?php echo $balance['account_number'] ; ?> <br>
                    <?php _t("Type") ; ?> : <?php echo balance_type($balance['type']) ; ?> <br>
                    <?php _t("Value") ; ?>: <?php echo monedaf($balance['sub_total'] + $balance['tax']) ; ?> <br>



                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-lg-9">                    
                    <?php _t("Ref") ; ?>: <?php echo $balance['ref'] ; ?> <br>                    
                    <?php _t("Description") ; ?>: <?php echo $balance['description'] ; ?> <br>
                    <?php _t("comunication") ; ?>: <?php echo $balance['ce'] ; ?> <br>


                </div>
                <div class="col-lg-3">
                    <?php _t("Date") ; ?>: <?php echo $balance['date'] ; ?> <br>
                    <?php _t("Date registre") ; ?>: <?php echo $balance['date_registre'] ; ?> <br>
                    <?php _t("Canceled") ; ?> ?: <?php echo $balance['canceled'] ; ?> <br>
                    <?php _t("Canceled code") ; ?>: <?php echo $balance['canceled_code'] ; ?><br>



                </div>
            </div>



        </div>


    <div class="col-lg-2">
        <?php //include view("balance" , "izq") ; ?>
    </div>



    </div>
</div>

<?php include view("home" , "footer") ; ?> 

