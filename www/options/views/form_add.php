<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="options">
    <input type="hidden" name="a" value="addOk">

    <?php # option ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="option"><?php _t("Option"); ?></label>
        <div class="col-sm-7">
            <input type="text"  name="option" class="form-control" id="option" placeholder="<?php _t("Option name"); ?>" required="">
        </div>	
    </div>
    <?php # /option ?>

    <?php # price ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="price"><?php _t("Price"); ?></label>
        <div class="col-sm-7">
            <input type="text"  name="price" class="form-control" id="price" placeholder="<?php _t("Price without tax"); ?>" >
        </div>	
    </div>
    <?php # /price ?>

    <?php # tax ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="tax"><?php _t("Tax"); ?></label>
        <div class="col-sm-7">
            <select class="form-control" name="tax">
                <?php foreach (tax_list() as $key => $tax) {?>
                <option value="<?php echo $tax['value']; ?>"><?php echo $tax['value']?>%</option>
                <?php } ?>
            </select>
        </div>	
    </div>
    <?php # /tax ?>

    <?php # order_by ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="order_by"><?php _t("Order_by"); ?></label>
        <div class="col-sm-7">
            <input type="text"  name="order_by" class="form-control" id="order_by" placeholder=" - defecto" value="1">
        </div>	
    </div>
    <?php # /order_by ?>

    <?php # status ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="status"><?php _t("Status"); ?></label>
        <div class="col-sm-7">
            <input type="text"  name="status" class="form-control" id="status" placeholder=" - defecto" value="1">
        </div>	
    </div>
    <?php # /status ?>


    <div class="form-group">
        <label class="control-label col-sm-3" for=""></label>
        <div class="col-sm-7">    
            <input class="btn btn-primary active" type ="submit" value ="<?php _t("Save"); ?>">
        </div>      							
    </div>      							

</form>
