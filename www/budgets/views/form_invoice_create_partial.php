<form action="index.php" method="post" class="">
    <input type="hidden" name="c" value="budgets"> 
    <input type="hidden" name="a" value="ok_invoice_create_partial"> 
    <input type="hidden" name="id" value="<?php echo "$id"; ?>"> 



    <div class="form-group">
        <label for="description"><?php _t("Description"); ?></label>
        <input type="text" name="description" class="form-control" id="description" placeholder="" value="<?php _t("Advance payment"); ?>">
    </div>


    <div class="form-group">
        <label for="solde"><?php _t("Solde"); ?></label>
        <?php echo "<p>". monedaf(20)." ( x % ) "._tr("still to be invoiced")."</p>";  ?>
    </div>


    



    <div class="form-group">
        <label for="discounts"><?php _t("Balance"); ?></label>

    </div>


    <div class="row form-group">



        <div class="col-xs-3">
            <input 
                type="number" 
                name="percent" 
                class="form-control" 
                id="percent" 
                placeholder="<?php echo $budget_items['discounts']; ?>" value="<?php echo $budget_items['discounts']; ?>">
        </div>
        
        <div class="col-xs-4">
            <select class="form-control" name="discounts_mode">
                <?php foreach (discounts_mode_list() as $key => $value) { ?>
                    <option value="<?php echo $value['discount']; ?>" <?php echo ($budget_items['discounts_mode'] == $value['discount']) ? " selected " : ""; ?>><?php echo $value['discount']; ?></option>
                <?php } ?>                                           
            </select>
        </div>
    </div>


    <div class="row form-group">
        <div class="col-xs-12">
            <p><?php _t("How much do you want to invoice?"); ?> </p>
        </div>
        
        
    </div>




    <button type="submit" class="btn btn-primary"><?php _t("Create a partial invoice now"); ?></button>



</form>