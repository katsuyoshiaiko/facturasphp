<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-sm-3 col-md-3 col-lg-3">        
        <?php
        include "izq.php";
        ?>                    
    </div>
    <div class="col-sm-6 col-md-6 col-lg-6">
        <?php include view("contacts", "nav_system"); ?>  
        <?php
        if ($_REQUEST && $a) {
            foreach ($error as $key => $value) {
                message("warning", "$value");
            }
        }
        ?>
        <?php
        if ((isset($smst) && $smst != false ) && (isset($smst) && $smst != false)) {
            message($smst, $smsm);
        }
        ?>
        <?php //include view("contacts" , "nav") ; ?>       
        <div>   





            <?php include "table_contacts_system.php";?>




        </div>


    </div>

    <div class="col-sm-3 col-md-3 col-lg-3">        
<?php
include "der_system.php";
?>                    
    </div>

</div>
<?php include view("home", "footer"); ?>  
