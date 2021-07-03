<form class="form-horizontal" method="post" action="index.php">

    <input type="hidden" name="c" value="contacts">
    <input type="hidden" name="a" value="ok_discounts_update">
    <input type="hidden" name="contact_id" value="<?php echo $contact['id'] ?>">
    <input type="hidden" name="redi" value="1">





    <div class="form-group">
        <label class="control-label col-sm-2" for="name"><?php _t("Id"); ?></label>	
        <div class="col-sm-8">    		
            <input  disabled="" class="form-control" type ="text " name ="type" id="type" value="<?php echo ($contact['id']) ?>"/>
        </div>
    </div>	





    <div class="form-group">
        <label class="control-label col-sm-2" for="name"><?php _t("Office name"); ?></label>	
        <div class="col-sm-8">    		
            <input  disabled="" class="form-control" type ="text" name ="name" id="name"value="<?php echo "$contact[name]"; ?>"/>
        </div>
    </div>


    <?php if (offices_is_headoffice($id)) { ?>

        <div class="form-group">
            <label class="control-label col-sm-2" for="name"><?php _t("Tva"); ?></label>	
            <div class="col-sm-8">    		
                <input  disabled="" class="form-control" type ="text" name ="tva" id="tva" value="<?php echo "$contact[tva]"; ?>"/>

                <p class="help-block">
                    Check: 
                    <a href="https://kbopub.economie.fgov.be/kbopub/zoeknaamfonetischform.html" target="bce">BCE</a> - 
                    <a href="https://ec.europa.eu/taxation_customs/vies/?locale=fr" target="vies">VIES</a> - 
                    <a href="http://www.ejustice.just.fgov.be/tsv/tsvf.htm" target="moni">Moniteur</a> - 
                    <a href="https://data.be/" target="data">Data.be</a> - 
                    <a href="https://ec.europa.eu/taxation_customs/business/vat/eu-country-specific-information-vat_fr" target="eu"><?php _t("More"); ?></a>
                </p>


            </div>




        </div>


        <div class="form-group">
            <label class="control-label col-sm-2" for="discounts"><?php _t("Discounts"); ?></label>	
            <div class="col-sm-6">    
                <div class="input-group">                    
                    <input disabled="" type="text" class="form-control" name="discounts" id="discounts" value="<?php echo "$contact[discounts]"; ?>" placeholder="">
                    <div class="input-group-addon">%</div>
                </div>
                <p class="help-block"><?php _t("This percentage is applied to all purchases made by this customer"); ?></p>                
            </div>

            <div class="col-sm-2">    



                <?php #########################################################?>
                <?php #########################################################?>
                <?php #########################################################?>
                <?php #########################################################?>
                <?php #########################################################?>
                <?php #########################################################?>
                <?php #########################################################?>
                <?php #########################################################?>
                <?php #########################################################?>
                <?php #########################################################?>
                <?php if(permissions_has_permission($u_rol, "contacts", "update")){ ?>
                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#update_discount">
                    <?php _t("Update"); ?>
                </button>
                <div class="modal fade" id="update_discount" tabindex="-1" role="dialog" aria-labelledby="update_discountLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="update_discountLabel">
                                    <?php _t("Update"); ?>
                                </h4>
                            </div>

                            <div class="modal-body">
                                <h2><?php _t("Update discounts"); ?></h2>


                                <div class="form-group">
                                    <label for="discounts" class="col-sm-2 control-label"><?php _t("Discounts"); ?></label>

                                    <div class="col-sm-5">
                                        <input type="number" min="0" max="100" name="discounts" class="form-control" id="discounts" placeholder="<?php echo "$contact[discounts]"; ?>" value="<?php echo "$contact[discounts]"; ?>">
                                    </div>

                                </div>

                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" class="btn btn-default"><?php _t("Update"); ?></button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>                
                <?php } ?>




            </div>
        </div>
    <?php } ?>




    <div class="form-group">
        <label class="control-label col-sm-2" for="status"><?php _t("Status"); ?></label>	
        <div class="col-sm-8">    		
            <input  
                disabled="" 
                class="form-control" 
                type ="text" 
                name ="status" 
                id="status"
                value="<?php echo _tr(offices_status($contact['status'])); ?>"/>
        </div>
    </div>


    <?php
// COMPANY// COMPANY// COMPANY// COMPANY// COMPANY
    /*
      <div class="form-group">
      <label class="control-label col-sm-2" for="birthdate"><?php _t("Birthdate"); ?></label>
      <div class="col-sm-8">
      <div class="row">


      <div class="col-xs-3">
      <select class="form-control" name="day" disabled="">

      <?php
      for ($i = 1; $i <= 31; $i++) {

      $selected_d = (dates_day_of_date($contact['birthdate']) == $i) ? " selected " : "";

      echo "<option value=\"$i\" $selected_d >$i</option>";
      }
      ?>

      </select>
      </div>


      <div class="col-xs-5">
      <select class="form-control" name="month" disabled="">
      <?php
      for ($i = 1; $i <= 12; $i++) {
      $selected_m = (dates_month_of_date($contact['birthdate']) == $i) ? " selected " : "";
      echo "<option value=\"$i\" $selected_m >$i " . _tr($months[$i]) . "</option>";
      }
      ?>

      </select>
      </div>
      <div class="col-xs-4">
      <select class="form-control" name="year" disabled="">
      <?php
      for ($i = 1900; $i <= date("Y"); $i++) {
      $selected_a = (dates_year_of_date($contact['birthdate']) == $i) ? " selected " : "";
      echo "<option value=\"$i\" $selected_a >$i</option>";
      }
      ?>

      </select>
      </div>
      </div>


      </div>
      </div>







      <div class="form-group">
      <label class="control-label col-sm-2" for="name"><?php _t("") ; ?></label>
      <div class="col-sm-8">
      <input class="btn btn-primary active" type ="submit" value ="<?php _t("Edit") ; ?>">
      </div>
      </div>

     */
    ?>
</form>


