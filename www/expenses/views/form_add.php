<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="expenses">
    <input type="hidden" name="a" value="ok_add">
    <input type="hidden" name="budget_id" value="null">



    <?php # cliente_id ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="client_id"><?php _t("Cliente_id"); ?></label>
        <div class="col-sm-8">
            <select class="form-control selectpicker" data-live-search="true" name="client_id" required="">
                <?php //foreach ( contacts_list_by_type(1) as $key => $contacts_list ) { ?>
                <?php foreach (contacts_headoffice_list() as $key => $headoffice) { ?>
                    <optgroup label="<?php echo contacts_formated($headoffice['id']); ?>">                    
                        <?php foreach (contacts_list_according_company_and_type($headoffice['id'], 1) as $key => $contacts_list) { ?>                        
                            <option 
                                value="<?php echo "$contacts_list[id]"; ?>"
                                >
                                    <?php echo $contacts_list['id'] . ",  " . contacts_formated($contacts_list['id']); ?>
                            </option>                        
                        <?php } ?>                    
                    </optgroup>                                                                                                    
                <?php } ?>
            </select>                                    
        </div>	
    </div>
    <?php # /cliente_id ?>


    <?php
    /*

      <?php # sellers_id ?>
      <div class="form-group">
      <label class="control-label col-sm-2" for="seller_id"><?php _t("seller_id") ; ?></label>
      <div class="col-sm-8">
      <select class="form-control selectpicker"  data-live-search="true" name="seller_id">
      <option value="xxxx"></option>
      <?php foreach ( employees_list_by_company($u_owner_id) as $key => $employees_list ) { ?>
      <option value="<?php echo "$employees_list[contact_id]" ; ?>"><?php echo $employees_list['contact_id'] . ",  " . contacts_formated($employees_list['contact_id']) ; ?></option>
      <?php } ?>
      </select>
      </div>
      </div>
      <?php # /sellers_id ?>

      <?php # date ?>
      <div class="form-group">
      <label class="control-label col-sm-2" for="date"><?php _t("Date") ; ?></label>
      <div class="col-sm-8">
      <input type="date"  name="date" class="form-control" id="date" placeholder=" - date">
      </div>
      </div>
     */
    ?>





    <?php # /date ?>

    <?php
    /*
      <?php # date_registre ?>
      <div class="form-group">
      <label class="control-label col-sm-2" for="date_registre"><?php _t("Date_registre"); ?></label>
      <div class="col-sm-8">
      <input type="date"  name="date_registre" class="form-control" id="date_registre" placeholder=" - date">
      </div>
      </div>
      <?php # /date_registre ?> */
    ?>

    <?php # date  ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="date"><?php _t("pay beford"); ?></label>
        <div class="col-sm-8">
            <input 
                type="text"  
                name="date" 
                class="form-control" 
                id="date" 
                placeholder="<?php echo date("Y-m-d"); ?>"
                required=""
                >
        </div>
    </div>
    <?php # /date  ?>

    <?php /*

      <?php # total ?>
      <div class="form-group">
      <label class="control-label col-sm-2" for="total"><?php _t("Total"); ?></label>
      <div class="col-sm-8">
      <input type="text"  name="total" class="form-control" id="total" placeholder=" - defecto">
      </div>
      </div>
      <?php # /total ?>

      <?php # tax ?>
      <div class="form-group">
      <label class="control-label col-sm-2" for="tax"><?php _t("Tax"); ?></label>
      <div class="col-sm-8">
      <input type="text"  name="tax" class="form-control" id="tax" placeholder=" - defecto">
      </div>
      </div>
      <?php # /tax ?>

      <?php # advance ?>
      <div class="form-group">
      <label class="control-label col-sm-2" for="advance"><?php _t("Advance"); ?></label>
      <div class="col-sm-8">
      <input type="text"  name="advance" class="form-control" id="advance" placeholder=" - defecto">
      </div>
      </div>
      <?php # /advance ?>

      <?php # balance ?>
      <div class="form-group">
      <label class="control-label col-sm-2" for="balance"><?php _t("Balance"); ?></label>
      <div class="col-sm-8">
      <input type="text"  name="balance" class="form-control" id="balance" placeholder=" - defecto">
      </div>
      </div>
      <?php # /balance ?>



      <?php # comments ?>
      <div class="form-group">
      <label class="control-label col-sm-2" for="comments"><?php _t("Comments") ; ?></label>
      <div class="col-sm-8">
      <textarea class="form-control" name="comments"></textarea>


      </div>
      </div>
      <?php # /comments  ?>

      <?php # comments_private  ?>
      <div class="form-group">
      <label class="control-label col-sm-2" for="comments_private"><?php _t("Comments_private") ; ?></label>
      <div class="col-sm-8">
      <textarea class="form-control" name="comments_private"></textarea>

      </div>
      </div>


      <?php # /comments_private  ?>

      <?php # r1 ?>
      <div class="form-group">
      <label class="control-label col-sm-2" for="r1"><?php _t("R1"); ?></label>
      <div class="col-sm-8">
      <input type="text"  name="r1" class="form-control" id="r1" placeholder=" - defecto">
      </div>
      </div>
      <?php # /r1 ?>

      <?php # r2 ?>
      <div class="form-group">
      <label class="control-label col-sm-2" for="r2"><?php _t("R2"); ?></label>
      <div class="col-sm-8">
      <input type="text"  name="r2" class="form-control" id="r2" placeholder=" - defecto">
      </div>
      </div>
      <?php # /r2 ?>

      <?php # r3 ?>
      <div class="form-group">
      <label class="control-label col-sm-2" for="r3"><?php _t("R3"); ?></label>
      <div class="col-sm-8">
      <input type="text"  name="r3" class="form-control" id="r3" placeholder=" - defecto">
      </div>
      </div>
      <?php # /r3 ?>

      <?php # fc ?>
      <div class="form-group">
      <label class="control-label col-sm-2" for="fc"><?php _t("Fc"); ?></label>
      <div class="col-sm-8">
      <input type="text"  name="fc" class="form-control" id="fc" placeholder=" - defecto">
      </div>
      </div>
      <?php # /fc ?>

      <?php # date_update ?>
      <div class="form-group">
      <label class="control-label col-sm-2" for="date_update"><?php _t("Date_update"); ?></label>
      <div class="col-sm-8">
      <input type="date"  name="date_update" class="form-control" id="date_update" placeholder=" - date">
      </div>
      </div>
      <?php # /date_update ?>
     * 
     * 
     * 
     * 
     * 
     *    <?php # days ?>
      <div class="form-group">
      <label class="control-label col-sm-2" for="days"><?php _t("Days") ; ?></label>
      <div class="col-sm-8">
      <input type="text"  name="days" class="form-control" id="days" placeholder=" - defecto">
      </div>
      </div>
      <?php # /days  ?>


     */ ?>
    <?php # ce ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="ce"><?php _t("Ce"); ?></label>
        <div class="col-sm-8">
            <input 
                type="text"  
                name="ce" 
                class="form-control" 
                id="ce" 
                placeholder="+++123/4567/1235+++"
                required=""
                >
        </div>
    </div>
    <?php # /ce  ?>

    <?php /*
      <?php # key ?>
      <div class="form-group">
      <label class="control-label col-sm-2" for="key"><?php _t("Key"); ?></label>
      <div class="col-sm-8">
      <input type="text"  name="key" class="form-control" id="key" placeholder=" - defecto">
      </div>
      </div>
      <?php # /key ?>

      <?php # status ?>
      <div class="form-group">
      <label class="control-label col-sm-2" for="status"><?php _t("Status"); ?></label>
      <div class="col-sm-8">
      <input type="text"  name="status" class="form-control" id="status" placeholder=" - defecto">
      </div>
      </div>
      <?php # /status ?>
     */ ?>

    <div class="form-group">
        <label class="control-label col-sm-2" for=""></label>
        <div class="col-sm-8">    
            <input class="btn btn-primary active" type ="submit" value ="<?php _t("Save"); ?>">
        </div>      							
    </div>      							

</form>
