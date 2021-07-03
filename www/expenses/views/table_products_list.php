<table class="table tab-content">
    <thead>
        <tr>
            <th><?php _t("Code") ; ?></th>
            <th><?php _t("Name") ; ?></th>
            <th><?php _t("Description") ; ?></th>
            <th><?php _t("Price") ; ?></th>
            <th><?php _t("Tax") ; ?></th>
            <th><?php _t("Quantity") ; ?></th>
            <th><?php _t("Discount") ; ?></th>
            <th><?php _t("Discount mode") ; ?></th>            
            <th><?php _t("Action") ; ?></th>
        </tr>
    </thead>
    <tbody>





        <?php foreach ( products_list() as $key => $product ) { ?>


        <form method="post" action="index.php">    

            <input type="hidden" name="c" value="expenses">
            <input type="hidden" name="a" value="ok_linesAddIndividualByCode">
            <input type="hidden" name="code" value="<?php echo $product['code'] ; ?>">                          
            <tr>            
                <td><?php echo $product['code'] ; ?></td>
                <td><?php echo $product['name'] ; ?></td>
                <td><?php echo $product['description'] ; ?></td>
                <td class="text-right"><?php echo moneda($product['price']) ; ?></td>
                <td><?php echo $product['tax'] ; ?>%</td>
                <td><input type="text"  class="form-control" name="quantity" value="" placeholder="<?php _t("Quantity"); ?>"></td>
                <td>
                    <div class="row">
                        <div class="col-xs-12">
                            <input 
                                type="number" 
                                name="discounts"  
                                class="form-control" 
                                placeholder="<?php _t("Discount"); ?>"
                                >
                        </div>
                    </div>
                </td>
            
                <td>
                    <div class="row">
                        <div class="col-xs-12">
                            <select class="form-control" name="discounts_mode">
                                <?php foreach ( discounts_mode_list() as $key => $value ) { ?>
                                    <option value="<?php echo $value['discount'] ; ?>">
                                        <?php echo $value['discount'] ; ?>
                                    </option>
                                <?php } ?>                                           
                            </select>
                        </div>
                    </div>
                </td>

                <td>
                    <input type="submit" class="btn btn-sm btn-primary" value="go">
                </td>
            </tr>
        </form>



    <?php } ?>

    <tr>
        <td>11</td>
        <td>articulo 1</td>
        <td>Este es un demo de arti</td>
        <td class="text-right"><?php echo moneda(250) ; ?></td>
        <td>21%</td>
        <td>
            <a class="btn btn-md btn-primary" href="index.php?c=aaa&a=bbb&id=111">
                Add
            </a>
        </td>
    </tr>







</tbody>
</table>

