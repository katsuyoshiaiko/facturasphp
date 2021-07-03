<table class="table table-striped">


    <form action="index.php" method="post" class="form-inline">                                                                                              
        <input type="hidden" name="c" value="invoices"> 
        <input type="hidden" name="a" value="ok_linesAddIndividual"> 
        <input type="hidden" name="invoice_id" value="<?php echo "$id" ; ?>"> 
        <input type="hidden" name="status" value="1"> 
        <input type="hidden" name="order_by" value="1"> 


        <tr>
            <td></td>
            <td>
                <div class="row">
                    <div class="col-xs-6">
                        <input 
                            type="number" 
                            name="quantity" 
                            class="form-control" 
                            placeholder="<?php _t("Quantity"); ?>"
                            value=""
                            >
                    </div>
                </div>
            </td>
            
            
            
            <td>
                <div class="row">
                    <div class="col-xs-12">
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
                            placeholder="<?php _t("Price"); ?>"
                            value="">
                    </div>
                </div>
            </td>
            <td>
                <div class="row">
                    <div class="col-xs-12 input-group">

                        <select class="form-control" name="tax">

                            <?php foreach ( tax_list_by_status(1) as $key => $tax_list ) { ?>
                                <option value="<?php echo "$tax_list[value]" ; ?>"><?php echo "$tax_list[value] %" ; ?></option>
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
                            placeholder="<?php _t("Discount"); ?>"
                            value="<?php echo contacts_field_id('discounts', invoices_field_id("client_id", $id)) ?>"
                            >
                    </div>
                </div>
            </td>
            <td>
                <div class="row">
                    <div class="col-xs-12">
                        <select class="form-control" name="discounts_mode">
                            <?php foreach ( discounts_mode_list() as $key => $value ) { ?>
                                <option value="<?php echo $value['discount'] ; ?>"><?php echo $value['discount'] ; ?></option>
                            <?php } ?>                                           
                        </select>
                    </div>
                </div>
            </td>


            <td>
                <div class="row">
                    <div class="col-xs-12">
                        <button type="submit" class="btn btn-default"><?php _t("Add") ; ?></button>
                    </div>
                </div>
            </td>

    </form>   
    

    
            <td>
                
            </td>
        
      
            
            <td>
                <div class="row">
                    <div class="col-xs-12">

                    </div>
                </div>
            </td>
            
            
            
            
            
            <td>
                <div class="row">
                    <div class="col-xs-12">

                    </div>
                </div>
            </td>
            <td></td>


        </tr>

 

</table>