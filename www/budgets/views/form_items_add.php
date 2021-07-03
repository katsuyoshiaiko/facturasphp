

<form action="index.php" method="post" class="form-inline">                                                                                              
    <input type="hidden" name="c" value="budgets"> 
    <input type="hidden" name="a" value="linesAddOk"> 
    <input type="hidden" name="budget_id" value="<?php echo "$id"; ?>"> 
    <input type="hidden" name="status" value="1"> 
    <input type="hidden" name="order_by" value="1"> 
    <input type="hidden" name="redi" value="1"> 


    <tr>
        <?php if( modules_field_module('status', 'products') ){?><td></td><?php } ?>        
         <?php if(modules_field_module('status', 'transport')){?><td></td><?php } ?>     
        <td colspan="9">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <input 
                        type="number"
                        min="1"
                        name="quantity" 
                        class="form-control" 
                        placeholder="<?php _t("Quantity"); ?>"
                        size="25"
                        value="1"
                        >
                </div>
            </div>
        </td>
        <td></td>
    </tr> 




    <tr>
        <?php if( modules_field_module('status', 'products') ){?><td></td><?php } ?>             
         <?php if(modules_field_module('status', 'transport')){?><td></td><?php } ?>     
        <td colspan="9">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <input 
                        type="text" 
                        name="description" 
                        class="form-control" 
                        placeholder="<?php _t("Description"); ?>"
                        autofocus=""
                        >
                </div>
            </div>
        </td>
        <td></td>
    </tr>    




    <tr>

        <td></td>
        <td></td>
        <td></td>
        <td></td>

        <td class="text-right">
            <div class="row">   
                <div class="col-xs-12">
                    <input  
                        type="number" 
                        name="price" 
                        required=""
                        min="0" 
                        value="" 
                        step=.01
                        class="form-control" 
                        placeholder="<?php _t("Price"); ?>">
                </div>
            </div>
        </td>
        <td>
            <div class="row">
                <div class="col-xs-12 input-group">

                    <select class="form-control" name="tax">

                        <?php foreach (tax_list_by_status(1) as $key => $tax_list) { ?>
                            <option value="<?php echo "$tax_list[value]"; ?>"><?php echo "$tax_list[value] %"; ?></option>
                        <?php } ?>

                        <?php //tax_select("value", "value", $selected, $disabled);  ?>
                    </select>


                </div>
            </div>
        </td>
        <td>
            <div class="row">
                <div class="col-xs-12">
                    <input 
                        type="number" 
                        name="discounts"  
                        class="form-control" 
                        min="0"
                        max=""
                        placeholder="<?php _t("Discount"); ?>"
                        value="<?php echo contacts_field_id('discounts', budgets_field_id("client_id", $id)) ?>"
                        >
                </div>
            </div>
        </td>
        <td>
            <div class="row">
                <div class="col-xs-12">
                    <select class="form-control" name="discounts_mode">
                        <?php foreach (discounts_mode_list() as $key => $value) { ?>
                            <option value="<?php echo $value['discount']; ?>"><?php echo $value['discount']; ?></option>
                        <?php } ?>                                           
                    </select>
                </div>
            </div>
        </td>


        <td>
            <div class="row">
                <div class="col-xs-12">
                    <button type="submit" class="btn btn-default"><?php _t("Add"); ?></button>
                </div>
            </div>
        </td>



</form>   
<?php
/**
 * ***************************************************************************
 */
?>




<td>
    <div class="row">
        <div class="col-xs-12">
            <?php
            if ( modules_field_module('status', 'transport')  ) {
                include "modal_products_search.php";
            }
            ?>
        </div>
    </div>
</td>


         <?php if( modules_field_module('status', 'products') ){?><td></td><?php } ?>          





<td>
    <div class="row">
        <div class="col-xs-12">
            
                <form action="index.php" method="post" class="form-inline">                                                                                              
                    <input type="hidden" name="c" value="budgets"> 
                    <input type="hidden" name="a" value="linesAddOk"> 
                    <input type="hidden" name="budget_id" value="<?php echo "$id"; ?>"> 
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


