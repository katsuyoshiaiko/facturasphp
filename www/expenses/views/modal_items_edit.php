<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#expense_items_<?php echo "$expense_items[id]"; ?>">
    <span class="glyphicon glyphicon-pencil"></span> <?php _t("Edit"); ?>
</button>

<!-- Modal -->
<div class="modal fade" id="expense_items_<?php echo "$expense_items[id]"; ?>" tabindex="-1" role="dialog" aria-labelledby="expense_items_<?php echo "$expense_items[id]"; ?>Label">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="expense_items_<?php echo "$expense_items[id]"; ?>Label"><?php _t("Update item"); ?> <?php echo "$expense_items[id]"; ?></h4>
            </div>
            <div class="modal-body">


                <form action="index.php" method="get">
                    <input type="hidden"  name="c" value="expenses">
                    <input type="hidden"  name="a" value="linesEditOk">
                    <input type="hidden"  name="id" value="<?php echo "$expense_items[id]"; ?>">

                    <div class="form-group">
                        <label for="quantity"><?php _t("Quantity"); ?></label>
                        <input type="text" name="quantity" class="form-control" id="quantity" placeholder="<?php echo $expense_items['quantity']; ?>" value="<?php echo $expense_items['quantity']; ?>">
                    </div>


                    <div class="form-group">
                        <label for="description"><?php _t("Description"); ?></label>
                        <input type="text" name="description" class="form-control" id="description" placeholder="<?php echo $expense_items['description']; ?>" value="<?php echo $expense_items['description']; ?>">
                    </div>


                    <div class="form-group">
                        <label for="price"><?php _t("Price"); ?></label>
                        <input type="number" name="price" class="form-control" id="price" placeholder="<?php echo $expense_items['price']; ?>" value="<?php echo $expense_items['price']; ?>">
                    </div>



                    <div class="form-group">
                        <label for="tax"><?php _t("Tax"); ?></label>
                        <select class="form-control" name="tax">
                            <?php foreach (tax_list() as $key => $tax) { ?>                                                                
                                <?php $selected = ($tax['value'] == $expense_items['tax']) ? " selected " : " "; ?>                                                                
                                <option value="<?php echo $tax['value']; ?>" <?php echo "$selected"; ?>><?php echo $tax['value']; ?>%</option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="discounts"><?php _t("Discount"); ?></label>

                    </div>


                    <div class="row form-group">



                        <div class="col-xs-3">

                            <input type="number" name="discounts" class="form-control" id="discounts" placeholder="<?php echo $expense_items['discounts']; ?>" value="<?php echo $expense_items['discounts']; ?>">
                        </div>
                        <div class="col-xs-4">
                            <select class="form-control" name="discounts_mode">
                                <?php foreach (discounts_mode_list() as $key => $value) { ?>
                                    <option value="<?php echo $value['discount']; ?>" <?php echo ($expense_items['discounts_mode'] == $value['discount']) ? " selected " : ""; ?>><?php echo $value['discount']; ?></option>
                                <?php } ?>                                           
                            </select>
                        </div>
                    </div>



                    <button type="submit" class="btn btn-default"><?php _t("Update"); ?></button>
                </form>          



            </div>              
        </div>
    </div>
</div>   
