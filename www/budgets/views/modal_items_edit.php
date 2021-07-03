
<button 
    type="button" 
    class="btn btn-primary btn-md" 
    data-toggle="modal" 
    data-target="#budget_items_<?php echo "$item[id]" ; ?>"
    
    >
    <span class="glyphicon glyphicon-pencil"></span> <?php _t("Edit") ; ?><?php  //echo "$item[id]";  ?>
</button>




<div 
    class="modal fade" 
    id="budget_items_<?php echo "$item[id]" ; ?>" 
    tabindex="-1" 
    role="dialog" aria-labelledby="budget_items_<?php echo "$item[id]" ; ?>Label"
    
    >
    
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 
                    class="modal-title" 
                    id="budget_items_<?php echo "$item[id]" ; ?>Label"
                    >
                        <?php _t("Update butget line") ; ?> 
                            <?php echo "$item[id]" ; ?>
                </h4>
            </div>
            <div class="modal-body">


                <form action="index.php" method="get">
                    <input type="hidden"  name="c" value="budgets">
                    <input type="hidden"  name="a" value="linesEditOk">
                    <input type="hidden"  name="id" value="<?php echo "$item[id]" ; ?>">

                    <div class="form-group">
                        <label for="code"><?php _t("Code") ; ?></label>
                        <input 
                            type="" 
                            name="code" 
                            
                            class="form-control" 
                            id="code" 
                            placeholder="<?php echo $item['code'] ; ?>" value="<?php echo $item['code'] ; ?>">
                    </div>
                    
                    
                    <div class="form-group">
                        <label for="quantity"><?php _t("Quantity") ; ?></label>
                        <input 
                            type="number" 
                            min="1"
                            name="quantity" 
                            class="form-control" 
                            id="quantity" 
                            placeholder="<?php echo $item['quantity'] ; ?>" value="<?php echo $item['quantity'] ; ?>">
                    </div>


                    <div class="form-group">
                        <label for="description"><?php _t("Description") ; ?></label>
                        <input type="text" name="description" class="form-control" id="description" placeholder="<?php echo $item['description'] ; ?>" value="<?php echo $item['description'] ; ?>">
                    </div>


                    <div class="form-group">
                        <label for="price"><?php _t("Price") ; ?></label>
                        <input 
                            type="number" 
                            name="price" 
                            min="0"
                            class="form-control" 
                            id="price" 
                            step="any"
                            placeholder="<?php echo $item['price'] ; ?>" 
                            value="<?php echo $item['price'] ; ?>">
                    </div>



                    <div class="form-group">
                        <label for="tax"><?php _t("Tax") ; ?></label>
                        <select class="form-control" name="tax">
                            <?php foreach ( tax_list() as $key => $tax ) { ?>                                                                
                                <?php $selected = ($tax['value'] == $item['tax']) ? " selected " : " " ; ?>                                                                
                                <option value="<?php echo $tax['value'] ; ?>" <?php echo "$selected" ; ?>><?php echo $tax['value'] ; ?>%</option>
                                
                            <?php } ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="discounts"><?php _t("Discount") ; ?></label>

                    </div>


                    <div class="row form-group">



                        <div class="col-xs-3">

                            <input 
                                type="number" 
                                name="discounts" 
                                class="form-control" 
                                id="discounts" 
                                placeholder="<?php echo $item['discounts'] ; ?>" 
                                value="<?php echo $item['discounts'] ; ?>">
                        </div>
                        
                        <div class="col-xs-4">
                            <select class="form-control" name="discounts_mode">
                                <?php foreach ( discounts_mode_list() as $key => $value ) { ?>
                                    
                                    <option 
                                        value="<?php echo $value['discount'] ; ?>" 
                                            <?php echo ($item['discounts_mode'] == $value['discount']) ? " selected " : "" ; ?>>
                                                <?php echo $value['discount'] ; ?>
                                    </option>
                                    
                                <?php } ?>                                           
                            </select>
                        </div>
                    </div>



                    <button type="submit" class="btn btn-default"><?php _t("Update") ; ?></button>
                </form>          



            </div>              
        </div>
    </div>
</div>   
