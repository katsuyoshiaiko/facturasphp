<form action="index.php">
    <input type="hidden" name="c" value="balance">
  
    <div class="form-group">
    <label for="client_id"><?php _t("Client"); ?></label>
                <select class="form-control selectpicker" data-live-search="true" name="client_id" required="">


                <?php //foreach ( contacts_list_by_type(1) as $key => $contacts_list ) { ?>
                    <?php foreach ( contacts_headoffice_list() as $key => $headoffice ) { ?>

                    <optgroup label="<?php echo contacts_formated($headoffice['id']); ?>">
                    
                    <?php foreach ( contacts_list_according_company_and_type($headoffice['id'], 1) as $key => $contacts_list ) { ?>
                        
                        <option 
                        value="<?php echo "$contacts_list[id]" ; ?>"
                        >
                            <?php echo $contacts_list['id'] . ",  " . contacts_formated($contacts_list['id']) ; ?>
                        </option>
                        
                    <?php }?>
                    
                    </optgroup>
                    

                <?php } ?>
            </select>
  </div>
    
    
    <?php # date ?>
    <?php # date ?>
    <?php # date ?>
    <?php # date ?>
    <?php # date ?>
    <?php # date ?>
    <?php # date ?>
    <?php # date ?>
    <script>
        $(function () {
            $("#date").datepicker({
                // minDate: +0,
                // maxDate: "+12M +0D",
                dateFormat: "yy-mm-dd"

            });
        });
    </script>  


    <div class="form-group">
        <label class="control-label col-sm-3" for="date"><?php _t("Date") ; ?></label>
        
            <input 
                type="text"  
                name="date" 
                class="form-control" 
                id="date" 
                placeholder=""
                value="<?php echo substr(magia_dates_add_day(date("y-m-d") , 0) , 0 , 10) ; ?>"
                readonly=""
                >
        
    </div>
    <?php # /date ?>
    
    
    
    
    
    
  <button type="submit" class="btn btn-default"><?php _t("Search"); ?></button>
</form>


<?php 
/*

<form class="" action="index.php" method="get" >
    <input type="hidden" name="c" value="balance">
    <input type="hidden" name="a" value="search_advancedOk">
    
    
   

    <?php # client_id ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Client_id"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="client_id" class="form-control"  id="client_id" placeholder="client_id" value="">
        </div>	
    </div>
<?php # client_id ?>

<?php # invoice_id ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Invoice_id"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="invoice_id" class="form-control"  id="invoice_id" placeholder="invoice_id" value="">
        </div>	
    </div>
<?php # invoice_id ?>

<?php # credit_note_id ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Credit_note_id"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="credit_note_id" class="form-control"  id="credit_note_id" placeholder="credit_note_id" value="">
        </div>	
    </div>
<?php # credit_note_id ?>

<?php # type ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Type"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="type" class="form-control"  id="type" placeholder="type" value="">
        </div>	
    </div>
<?php # type ?>

<?php # account_number ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Account_number"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="account_number" class="form-control"  id="account_number" placeholder="account_number" value="">
        </div>	
    </div>
<?php # account_number ?>

<?php # sub_total ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Sub_total"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="sub_total" class="form-control"  id="sub_total" placeholder="sub_total" value="">
        </div>	
    </div>
<?php # sub_total ?>

<?php # tax ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Tax"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="tax" class="form-control"  id="tax" placeholder="tax" value="">
        </div>	
    </div>
<?php # tax ?>

<?php # total ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Total"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="total" class="form-control"  id="total" placeholder="total" value="">
        </div>	
    </div>
<?php # total ?>

<?php # ref ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Ref"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="ref" class="form-control"  id="ref" placeholder="ref" value="">
        </div>	
    </div>
<?php # ref ?>

<?php # description ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Description"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="description" class="form-control"  id="description" placeholder="description" value="">
        </div>	
    </div>
<?php # description ?>

<?php # ce ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Ce"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="ce" class="form-control"  id="ce" placeholder="ce" value="">
        </div>	
    </div>
<?php # ce ?>

<?php # date ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Date"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="date" class="form-control"  id="date" placeholder="date" value="">
        </div>	
    </div>
<?php # date ?>

<?php # date_registre ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Date_registre"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="date_registre" class="form-control"  id="date_registre" placeholder="date_registre" value="">
        </div>	
    </div>
<?php # date_registre ?>

<?php # canceled ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Canceled"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="canceled" class="form-control"  id="canceled" placeholder="canceled" value="">
        </div>	
    </div>
<?php # canceled ?>

<?php # canceled_code ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Canceled_code"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="canceled_code" class="form-control"  id="canceled_code" placeholder="canceled_code" value="">
        </div>	
    </div>
<?php # canceled_code ?>






    <div class="form-group">
        <label class="control-label col-sm-2" for=""></label>
        <div class="col-sm-8">    
            <input class="btn btn-primary active" type ="submit" value ="<?php _t("Save"); ?>">
        </div>      							
    </div>      							

</form>
*/
?>