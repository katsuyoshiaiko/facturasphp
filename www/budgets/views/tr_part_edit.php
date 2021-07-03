<tr class="<?php echo $class; ?>" id="<?php echo "$item[id]"; ?>">  


    <?php if (!$separator) { ?> 
        <td><?php echo "$i"; ?> <?php // echo "$item[id]";   ?></td>
        <td><?php echo "$item[quantity]"; ?></td>
        <?php if (modules_field_module('status', 'products') ) { ?> <td><?php echo "$item[code]"; ?></td> <?php } ?>

        <td><?php echo "$item[description]"; ?></td>
        <td class="text-right"><?php echo moneda($item['price']); ?></td>
        <td class="text-right"><?php echo moneda($item['quantity'] * $item['price']); ?></td>
        <td class="text-right"><?php
            echo ($item['discounts_mode'] == '%') ? " ( $item[discounts] $item[discounts_mode] ) " : "";
            echo moneda($item['totaldiscounts']);
            ?>
        </td>
        <td class="text-right"><?php echo moneda($item['subtotal']); ?> </td>
        <td class="text-right">(<?php echo ($item['tax']); ?> %) <?php echo moneda($item['totaltax']); ?> </td>                                
        <td class="text-right"><?php echo moneda($item["subtotal"] + $item["totaltax"]); ?> </td>                                
        <td><?php include "modal_items_edit.php"; ?></td>
        <td class="text-right"> 

            <a class="btn btn-danger btn-md" href="index.php?c=budgets&a=linesDeleteOk&id=<?php echo "$item[id]"; ?>&redi=1">
                <span class="glyphicon glyphicon-trash"></span>
                <?php _t("Delete"); ?>
            </a>

        </td>

        <?php
        $i++;
    } else {
        ?> 

        <td colspan="10"><?php echo ($item['description']); ?></td>

        
        <?php if (modules_field_module('status', 'products') ) { ?> <td></td> <?php } ?>
        
        
        <td class="text-right"> 

            <a class="btn btn-danger" href="index.php?c=budgets&a=linesDeleteOk&id=<?php echo "$item[id]"; ?>&redi=1">
                <span class="glyphicon glyphicon-trash"></span> <?php _t("Delete"); ?>
            </a>
        </td>


    <?php } ?>


</tr>   