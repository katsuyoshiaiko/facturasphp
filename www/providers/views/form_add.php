nuevo probvehedor, 
Agrega un contacto y tambien lo pone en la losta de provehedores

<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="providers">
    <input type="hidden" name="a" value="ok_provider_add">
    <input type="hidden" name="redi" value="2">


    <?php # provider_name ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="provider_name"><?php _t("Provider name"); ?></label>
        <div class="col-sm-8">
            <input type="text"  name="provider_name" class="form-control" id="provider_name" placeholder="">
        </div>	
    </div>
    <?php # /provider_name ?>


    <?php # TVA ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="provider_tva"><?php _t("Tva"); ?></label>
        <div class="col-sm-8">
            <input type="text"  name="provider_tva" class="form-control" id="provider_tva" placeholder="BE123456789">
        </div>	
    </div>
    <?php # /TVA ?>


    <hr>

    <div class="form-group">
        <label class="control-label col-sm-2" for=""><?php _t("Address"); ?></label>
        <div class="col-sm-2">    
            <input type="text"  name="number" class="form-control" id="number" placeholder="Number" value="<?php echo $addresses_list_by_contact_id['number'] ?>">
        </div>
        <div class="col-sm-6">    
            <input type="text"  name="address" class="form-control" id="address" placeholder="Av. Louise " value="<?php echo $addresses_list_by_contact_id['address'] ?>">
        </div>
    </div>


    <div class="form-group">
        <label class="control-label col-sm-2" for="postcode"></label>
        <div class="col-sm-2">    
            <input type="text"  name="postcode" class="form-control" id="postcode" placeholder="1050" value="<?php echo $addresses_list_by_contact_id['postcode'] ?>">
        </div>

        <div class="col-sm-3">    
            <input type="text"  name="barrio" class="form-control" id="barrio" placeholder="Ixelles" value="<?php echo $addresses_list_by_contact_id['barrio'] ?>">
        </div>

        <div class="col-sm-3">    
            <input type="text"  name="city" class="form-control" id="city" placeholder="Bruxelles" value="<?php echo $addresses_list_by_contact_id['city'] ?>">
        </div>
    </div>




    <div class="form-group">
        <label class="control-label col-sm-2" for="region"></label>
        <?php
        /*
          <div class="col-sm-5">
          <input type="text"  name="region" class="form-control" id="region" placeholder="Region" value="<?php echo $addresses_list_by_contact_id['region'] ?>">
          </div> */
        ?>

        <div class="col-sm-8">    
            <select class="form-control" name="country">
                <?php
                foreach (countries_list() as $key => $value) {

                    $selected = ($value['countryCode'] == $addresses_list_by_contact_id['country']) ? " selected " : "";

                    echo "<option value=\"$value[countryCode]\" $selected >" . utf8_decode($value['countryName']) . "</option>";
                }
                ?>
            </select>
        </div>
    </div>

    <hr>


    <?php # tva ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="client_number"><?php _t("Tva by default"); ?></label>
        <div class="col-sm-8">
            <select name="tva_default">
                <?php
                foreach (tax_list() as $key => $value) {
                    echo '<option>' . $value['value'] . '</option>';
                }
                ?>
            </select>
        </div>	
    </div>
<?php # /tva   ?>


<?php # date   ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="client_number"><?php _t("Client number"); ?></label>
        <div class="col-sm-8">
            <input type="text"  name="client_number" class="form-control" id="client_number" placeholder="">
        </div>	
    </div>
<?php # /date   ?>



    <div class="form-group">
        <label class="control-label col-sm-2" for=""></label>
        <div class="col-sm-8">    
            <input class="btn btn-primary active" type ="submit" value ="<?php _t("Save"); ?>">
        </div>      							
    </div>      							

</form>
