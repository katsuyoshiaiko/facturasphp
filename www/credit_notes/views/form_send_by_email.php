<?php
$mensaje = "Estimado Sr. \n"
        . "Reciba ud el presupuesto de nuestra empresa"
        . "\n"
        . "La contabilidad\n"
        . "$config_company_name" ;
?>
<form action="index.php" method="post" >
    <input type="hidden" name="c" value="credit_notes"> 
    <input type="hidden" name="a" value="export_pdf"> 
    <input type="hidden" name="way" value="email"> 
    <input type="hidden" name="id" value="<?php echo "$id" ; ?>"> 


    <div class="form-group">
        <label for="reciver_id"><?php _t("Send to") ; ?></label>
        <?php
        // echo vardump(invoices_field_id("client_id", $id));
        // echo vardump($invoices["client_id"]);
        //echo vardump(directory_search_data_by_contact_id("Email", 50389))
        ?>        
        <select class="form-control" name="reciver_id" id="reciver_id">            
            <?php
            foreach ( employees_list_by_company($invoices["client_id"]) as $key => $employee ) {


                $email = directory_search_data_by_contact_id("Email" , $employee['contact_id'])[0] ;
                $contact = contacts_formated($employee['contact_id']) ;

                echo '<option value="' . $employee['contact_id'] . '">' . $contact . ' (' . $email . ') </option>' ;
            }
            ?>           
        </select>

    </div>

    <?php
    /*
      <div class="form-group">
      <label for="cc"><?php _t("Copy to"); ?></label>
      <input type="text" class="form-control" name="cc" id="cc" placeholder="info@mail.com">
      </div>

     */
    ?>


    <div class="form-group">
        <label for="message"><?php _t("Message") ; ?></label>
        <textarea name="message" class="form-control" rows="8"><?php echo $mensaje ; ?></textarea>
    </div>


    <div class="form-group">
        <label for="files"><?php _t("Files") ; ?></label>
        <p>
            <span class="glyphicon glyphicon-paperclip"></span> 
            <a href="index.php?c=invoices&a=export_pdf&way=web&id=<?php echo $id ; ?>" target="new">
                <?php _t("invoice.pdf") ; ?>
            </a>
        </p>
    </div>






    <button type="submit" class="btn btn-default">
        <?php _t("Send") ; ?>
    </button>
</form>