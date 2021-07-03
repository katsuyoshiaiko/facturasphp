<?php
//
$imputs = array(
    array("type" => "hidden", "name" => "c", "id" => "c", "value" => "invoices"),
    array("type" => "hidden", "name" => "a", "id" => "a", "value" => "ok_linesAddIndividual"),
    array("type" => "hidden", "name" => "invoice_id", "id" => "invoice_id", "value" => "$id"),
    array("type" => "hidden", "name" => "redi", "id" => "redi", "value" => "1"),
);

echo (form($imputs));
?>
<tr>
    <?php if(modules_field_module('status', 'products')  ){?> <td></td> <?php } ?>                                    
    <td></td>
    <td colspan="10">
        <input 
            type="text"
            min="1"
            name="quantity" 
            class="form-control" 
            placeholder="<?php _t("Quantity"); ?>"
            value="1"
            size="50" required="">
    </td>
</tr>



<tr>
    <?php if(modules_field_module('status', 'products') ){?> <td></td> <?php } ?>                                    
    <td></td>
    <td colspan="10">
        <input 
            type="text" 
            name="description" 
            class="form-control" 
            placeholder="<?php _t("Description"); ?>" 
            autofocus=""
            value="" required="">
    </td>    
</tr>


<tr>
    <?php if(modules_field_module('status', 'products') ){?> <td></td> <?php } ?>                                    
    <td></td>
    <td>        
        <input  
            type="number" 
            name="price" 
            required=""
            min="0" 
            value="" 
            step=.01
            class="form-control" 
            placeholder="<?php _t("Price"); ?>"
            value="">                    
    </td>

    <td>
        <select class="form-control" name="tax">
            <?php foreach (tax_list_by_status(1) as $key => $tax_list) { ?>
                <option value="<?php echo "$tax_list[value]"; ?>"><?php echo "$tax_list[value] %"; ?></option>
            <?php } ?>                   
        </select>       
    </td>

    <td>        
        <input 
            type="number" 
            name="discounts"  
            class="form-control" 
            placeholder="<?php _t("Discount"); ?>"
            value="<?php echo contacts_field_id('discounts', invoices_field_id("client_id", $id)) ?>"
            >        
    </td>
    
    
    <td>
        
        
                <select class="form-control" name="discounts_mode">
                    <?php foreach (discounts_mode_list() as $key => $value) { ?>
                        <option value="<?php echo $value['discount']; ?>"><?php echo $value['discount']; ?></option>
                    <?php } ?>                                           
                </select>
        
        
    </td>


    <td>
        <div class="row">
            <div class="col-xs-12">
                <button type="submit" class="btn btn-default"><?php _t("Add"); ?></button>
            </div>
        </div>
    </td>

</form>



    <td>

    </td>



<td></td>
<td></td>
<td></td>



<td>
    <div class="row">
        <div class="col-xs-12">


            

                <form action="index.php" method="post" class="form-inline">                                                                                              
                    <input type="hidden" name="c" value="invoices"> 
                    <input type="hidden" name="a" value="linesAddOk"> 
                    <input type="hidden" name="invoice_id" value="<?php echo "$id"; ?>"> 
                    <input type="hidden" name="status" value="1"> 
                    <input type="hidden" name="quantity" value="1"> 
                    <input type="hidden" name="description" value="---Separator"> 
                    <input type="hidden" name="tax" value="0"> 
                    <input type="hidden" name="discounts" value="0"> 
                    <input type="hidden" name="discounts_mode" value="%"> 


                    <button type="submit" class="btn btn-default"><?php _t("Add separator"); ?></button>                        
                </form>
            





        </div>
    </div>
</td>


</tr>



