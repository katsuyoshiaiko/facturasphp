<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="balance">
    <input type="hidden" name="a" value="ok_payement_registre">
    <?php /* type 1 ingreso, -1 salida */ ?>
    <input type="hidden" name="type" value="<?php echo ($type) ? $type : false; ?>">
    <input type="hidden" name="client_id" value="<?php echo ($client_id) ? $client_id : false; ?>">
    <input type="hidden" name="expense_id" value="<?php echo ($expense_id) ? $expense_id : false; ?>">
    <input type="hidden" name="invoice_id" value="<?php echo ($invoice_id) ? $invoice_id : false; ?>">
    <input type="hidden" name="credit_note_id" value="<?php echo ($credit_note_id) ? $credit_note_id : false; ?>">
    <input type="hidden" name="redi" value="<?php echo ($redi) ? $redi : false; ?>">


    <?php # account_number ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="account_number"><?php _t("Account_number"); ?></label>
        <div class="col-sm-9">
            <select  name="account_number" class="form-control selectpicker" id="account_number" data-live-search="true">
                <?php banks_select("account_number", "account_number", array(), array()); ?>                        
            </select>
        </div>	
    </div>
    <?php # /account_number ?>

    <?php
    /*
      <?php # sub_total ?>
      <div class="form-group">
      <label class="control-label col-sm-3" for="sub_total"><?php _t("Sub_total"); ?></label>
      <div class="col-sm-9">
      <input type="text"  name="sub_total" class="form-control" id="sub_total" placeholder=" - defecto">
      </div>
      </div>
      <?php # /sub_total ?>

      <?php # tax ?>
      <div class="form-group">
      <label class="control-label col-sm-3" for="tax"><?php _t("Tax"); ?></label>
      <div class="col-sm-9">
      <input type="text"  name="tax" class="form-control" id="tax" placeholder=" - defecto">
      </div>
      </div>
      <?php # /tax ?> */
    ?>

    <?php # total ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="total"><?php _t("Total"); ?></label>
        <div class="col-sm-9">
            <input 
                type="text" 
                name="total" 
                class="form-control" 
                id="total" 
                placeholder=""
                value="<?php echo $total; ?>"
                >
        </div>	
    </div>
    <?php # /total ?>

    <?php # date ?>
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
        <label class="control-label col-sm-3" for="date"><?php _t("Date"); ?></label>
        <div class="col-sm-9">
            <input type="text"  name="date" class="form-control" id="date" placeholder="" value="<?php echo date("Y-m-d");?>">
        </div>	
    </div>
    <?php # /date ?>

    <?php # ref ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="ref"><?php _t("Ref"); ?></label>
        <div class="col-sm-9">
            <input 
                type="text"  
                name="ref" 
                class="form-control" 
                id="ref" 
                placeholder="">
            
            <span id="ref" class="help-block">
                  <?php _t("Transaction number according to your bank statements"); ?>
              </span>
            
            
        </div>	
        
         
        
        
    </div>
    <?php # /ref ?>

    <?php # description ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="description"><?php _t("Description"); ?></label>
        <div class="col-sm-9">
            <input 
                type="text"  
                name="description" 
                class="form-control" 
                id="description" 
                placeholder=""
                >
        </div>	
    </div>
    <?php # /description ?>

    <?php # ce ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="ce"><?php _t("Ce"); ?></label>
        <div class="col-sm-9">
            <input 
                type="text"  
                name="ce" 
                class="form-control" 
                id="ce" 
                placeholder=""
                value="<?php echo ($ce) ? $ce : false; ?>"
                readonly=""
                >
        </div>	
    </div>
    <?php # /ce ?>


    <?php
    /*
      <?php # date_registre ?>
      <div class="form-group">
      <label class="control-label col-sm-3" for="date_registre"><?php _t("Date_registre"); ?></label>
      <div class="col-sm-9">
      <input type="date"  name="date_registre" class="form-control" id="date_registre" placeholder=" - date">
      </div>
      </div>
      <?php # /date_registre ?>
      <?php # code ?>
      <div class="form-group">
      <label class="control-label col-sm-3" for="code"><?php _t("Code"); ?></label>
      <div class="col-sm-9">
      <input type="text"  name="code" class="form-control" id="code" placeholder=" - defecto">
      </div>
      </div>
      <?php # /code ?>

      <?php # canceled ?>
      <div class="form-group">
      <label class="control-label col-sm-3" for="canceled"><?php _t("Canceled"); ?></label>
      <div class="col-sm-9">
      <input type="text"  name="canceled" class="form-control" id="canceled" placeholder=" - defecto">
      </div>
      </div>
      <?php # /canceled ?>

      <?php # canceled_code ?>
      <div class="form-group">
      <label class="control-label col-sm-3" for="canceled_code"><?php _t("Canceled_code"); ?></label>
      <div class="col-sm-9">
      <input type="text"  name="canceled_code" class="form-control" id="canceled_code" placeholder=" - defecto">
      </div>
      </div>
      <?php # /canceled_code ?> */
    ?>




    <div class="form-group">
        <label class="control-label col-sm-3" for=""></label>
        <div class="col-sm-9">    
            <input class="btn btn-primary active" type ="submit" value ="<?php _t("Save"); ?>">
        </div>      							
    </div>      							

</form>
