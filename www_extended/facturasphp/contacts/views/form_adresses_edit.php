<form class="form-horizontal" action="index.php" method="post" >

    <input type="hidden" name="c" value="contacts">
    <input type="hidden" name="a" value="ok_address_edit">
    <input type="hidden" name="id" value="<?php echo "$addresses_list_by_contact_id[id]" ; ?>">
    <input type="hidden" name="contact_id" value="<?php echo "$id" ; ?>">

    <div class="form-group">
        <label class="control-label col-sm-2" for="name"><?php _t("Type") ; ?></label>
        <div class="col-sm-8">                    
            <select class="selectpicker" data-live-search="true" data-width="100%" name="name" >	
                <option value="0" ><?php _t("Select one") ; ?></option>
                <?php
                //foreach (type_article_array() as $key => $value) {
                foreach ( addresses_name() as $value ) {
                    $selected = ( $value == $addresses_list_by_contact_id['name'] ) ? " selected " : "" ;

                     // si es headoffice    
                    if( strtolower($value) == 'billing' && ! contacts_is_headoffice($id) ) {                        
                        
                        echo "<option value=\"$value\" disabled $selected >$value ( "._tr('Only headoffice')." ) </option>\n" ;                        
                        
                    }else{
                        echo "<option value=\"$value\" $selected >$value</option>\n" ;
                    }
                                                                               
                }
                ?>
            </select>
        </div>	
    </div>



    <div class="form-group">
        <label class="control-label col-sm-2" for=""><?php _t("Address") ; ?></label>
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
        </div>*/
?>

        <div class="col-sm-8">    
            <select class="form-control" name="country">
                <?php
                foreach ( countries_list() as $key => $value ) {

                    $selected = ($value['countryCode'] == $addresses_list_by_contact_id['country']) ? " selected " : "" ;

                    echo "<option value=\"$value[countryCode]\" $selected >" . utf8_decode($value['countryName']) . "</option>" ;
                }
                ?>
            </select>
        </div>
    </div>
    
    
    
<?php if(modules_field_module('status', 'transport')){ ?>     
    <div class="form-group">
        <label class="control-label col-sm-2" for="transport_code"><?php _t('Transport') ; ?></label>               
        <div class="col-sm-3">    
            <select class="form-control" name="transport_code">
                <?php foreach ( transport_list() as $key => $transport ) {                                         
                    $selected = ($transport['code'] == addresses_transport_search_by_addresses_id($addresses_list_by_contact_id['id'])) ? " selected " : "" ;                                        
                    ?>
                <option value="<?php echo "$transport[code]" ?>" <?php echo $selected; ?>>
                    <?php echo "$transport[name] - " . monedaf($transport['price']); ?>
                </option>
                <?php } ?>
            </select>
        </div>
    </div>
<?php } ?>    
    
    



    <div class="form-group">
        <label class="control-label col-sm-2" for=""></label>
        <div class="col-sm-8">    
            <input class="btn btn-primary active" type ="submit" value ="<?php _t("Save") ; ?>">
        </div>      							
    </div>      							

</form>
