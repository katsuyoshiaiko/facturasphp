<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="transport">
    <input type="hidden" name="a" value="editOk">
    <input type="hidden" name="id" value="<?php echo "$id"; ?>">
    


    <?php # code ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="code"><?php _t("Code"); ?></label>
        <div class="col-sm-8">                    
            <input 
                type="text" 
                name="code" 
                class="form-control"  
                id="code" 
                placeholder="code" 
                value="<?php echo "$transport[code]"; ?>" 
                readonly=""
                >
        </div>	
    </div>
<?php # /code ?>

<?php # name ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="name"><?php _t("Transpot name"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="name" class="form-control"  id="name" placeholder="name" value="<?php echo "$transport[name]"; ?>" >
        </div>	
    </div>
<?php # /name ?>

<?php # price ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="price"><?php _t("Price"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="price" class="form-control"  id="price" placeholder="price" value="<?php echo "$transport[price]"; ?>" >
        </div>	
    </div>
<?php # /price ?>

    
<?php # tax ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="tax"><?php _t("Tax"); ?></label>
        <div class="col-sm-8">                    
            <select class="form-control" name="tax">
                <?php
                foreach (tax_list() as $key => $tax) {
                    $selected = ($tax['value'] == $transport['tax'])? " selected " : ""; 
                    echo '<option value="'.$tax['value'].'" '.$selected.'> '.$tax['value'].'%</option>'; 
                }
                ?>
            </select>
        </div>	
    </div>
<?php # /tax ?>
    
    

<?php # order_by ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="order_by"><?php _t("Order_by"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="order_by" class="form-control"  id="order_by" placeholder="order_by" value="<?php echo "$transport[order_by]"; ?>" >
        </div>	
    </div>
<?php # /order_by ?>

<?php # status ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="status"><?php _t("Status"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="status" class="form-control"  id="status" placeholder="status" value="<?php echo "$transport[status]"; ?>" >
        </div>	
    </div>
<?php # /status ?>





    <div class="form-group">
        <label class="control-label col-sm-2" for=""></label>
        <div class="col-sm-8">    
            <input class="btn btn-primary active" type ="submit" value ="<?php _t("Edit"); ?>">
        </div>      							
    </div>      							

</form>

