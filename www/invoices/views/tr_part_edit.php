<tr class="<?php echo $class; ?>">  

    <?php if (!$separator) { ?> 


        <td><?php echo $i; ?></td>
        <td><?php echo "$invoice_items[quantity]"; ?></td>


        <?php if (modules_field_module('status', 'products') ) { ?> <td><?php echo "$invoice_items[code]"; ?></td> <?php } ?>


        <td><?php echo "$invoice_items[description]"; ?></td>
        <td class="text-right"><?php echo monedaf($invoice_items['price']); ?></td>
        <td class="text-right"><?php echo monedaf($invoice_items['price'] * $invoice_items['quantity']); ?></td>

        <td class="text-right">
            <?php
            echo ($invoice_items['discounts_mode'] == '%') ?
                    " ( $invoice_items[discounts]$invoice_items[discounts_mode] ) " :
                    "";

            echo monedaf($invoice_items['totaldiscounts']);
            ?>
        </td>
        <td class="text-right"><?php echo monedaf($invoice_items['subtotal']); ?> </td>
        <td class="text-right">(<?php echo ($invoice_items['tax']); ?> %) <?php echo monedaf($invoice_items['totaltax']); ?> </td>                                
        <td class="text-right"><?php echo monedaf($invoice_items["subtotal"] + $invoice_items["totaltax"]); ?> </td>                                

        <td><?php include "modal_items_edit.php"; ?></td>



        <td class=""> 


            <button type="button" class="btn btn-danger btn-md" data-toggle="modal" data-target="#myModalEdit<?php echo "$invoice_items[id]"; ?>">
                <span class="glyphicon glyphicon-trash"></span> <?php _t("Delete"); ?> 
            </button>

            <!-- Modal -->
            <div class="modal fade" id="myModalEdit<?php echo "$invoice_items[id]"; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalEditLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalEditLabel"><?php _t('Delete'); ?>

                            </h4>
                        </div>
                        <div class="modal-body">

                            <h2><?php _t("Are you sure you want to delete it"); ?>?</h2>



                            <a class="btn btn-danger" href="index.php?c=invoices&a=linesDeleteOk&id=<?php echo "$invoice_items[id]"; ?>">
                                <span class="glyphicon glyphicon-trash"></span>
                                <?php _t("Delete"); ?> 
                            </a>




                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal"><?php _t("Close"); ?></button>

                        </div>
                    </div>
                </div>
            </div>

        </td>

        <?php
    } else {
        ?> 
        <td><?php echo strtoupper($invoice_items['description']); ?></td>

        <?php if(modules_field_module('status', 'products')  ){?> <td></td> <?php } ?>                                    
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>


        <td > 

            <a class="btn btn-danger" href="index.php?c=invoices&a=linesDeleteOk&id=<?php echo "$invoice_items[id]"; ?>&redi=1">
                <span class="glyphicon glyphicon-trash"></span> 
                <?php _t("Delete"); ?>
            </a>
        </td>


    <?php } ?>
</tr>   