


<form class="form-inline" method="post" action="index.php">

    <input type="hidden" name="c" value="options">
    <input type="hidden" name="a" value="ok_price_update">
    <input type="hidden" name="id" value="<?php echo $options['id'] ; ?>">

    <div class="form-group">
        <label class="sr-only" for="price"></label>
        <input 
            type="number" 
            class="form-control" 
            name="price" 
            id="price" 
            placeholder="" 
            size="5"
            value="<?php echo $options['price'] ; ?>"

            >
    </div>

    <?php if ( $options['price'] > 0 ) { ?>
        <button type="submit" class="btn btn-primary btn-sm"><?php _t("Update") ; ?></button>
    <?php } else { ?>
        <button type="submit" class="btn btn-default btn-sm"><?php _t("Add") ; ?></button>
    <?php } ?>



</form>
