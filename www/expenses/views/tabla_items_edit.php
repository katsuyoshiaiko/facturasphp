<table class="table table-striped">
    <thead>
        <tr>
            <th><?php _t("#") ; ?></th>
            <th><?php _t("Quantity") ; ?></th>
            <th><?php _t("Description") ; ?></th>                            
            <th class="text-right"><?php _t("Price") ; ?></th>
            <th class="text-right"><?php _t("Tax") ; ?></th>
            <th class="text-right"><?php _t("Discounts") ; ?></th>
            <th class="text-right"><?php _t("Subtotal") ; ?></th>
            <th class="text-right"><?php _t("Tax") ; ?></th>
            <th class="text-right"><?php _t("TVAC") ; ?></th>                            
            <th class="text-right"><?php _t("Action") ; ?></th>
            <th class="text-right"><?php _t("Action") ; ?></th>
        </tr>
    </thead>
    <tbody>
        <?php
        $items = expense_lines_list_by_expense_id($id) ;
        $total_subtotal = 0 ;
        $total_totaltax = 0 ;
        $total_totaltvac = 0 ;
        $total_totaldiscounts = 0 ;
        $i = 1 ; 
        foreach ( $items as $key => $expense_items ) {

            $total_subtotal = $total_subtotal + $expense_items['subtotal'] ;
            $total_totaltax = $total_totaltax + $expense_items['totaltax'] ;
            $total_totaltvac = $total_totaltvac + ($expense_items["subtotal"] + $expense_items["totaltax"]) ;
            $total_totaldiscounts = $total_totaldiscounts + ($expense_items["totaldiscounts"]) ;
            ?>
            <tr>                            
                <td><?php echo $i; ?></td>
                <td><?php echo "$expense_items[quantity]" ; ?></td>
                <td><?php echo "$expense_items[description]" ; ?></td>
                <td class="text-right"><?php echo monedaf($expense_items['price']) ; ?></td>
                <td class="text-right"><?php echo ($expense_items['tax']) ; ?> %</td>
                <td class="text-right">
                    <?php
                    echo ($expense_items['discounts_mode'] == '%') ?
                            " ( $expense_items[discounts]$expense_items[discounts_mode] ) " :
                            "" ;

                    echo monedaf($expense_items['totaldiscounts']) ;
                    ?>
                </td>
                <td class="text-right"><?php echo monedaf($expense_items['subtotal']) ; ?> </td>
                <td class="text-right"><?php echo monedaf($expense_items['totaltax']) ; ?> </td>                                
                <td class="text-right"><?php echo monedaf($expense_items["subtotal"] + $expense_items["totaltax"]) ; ?> </td>                                

                <td>

                    <?php include "modal_items_edit.php" ; ?>

                </td>

                <td class="text-right"> 
                    <div class="dropdown">
                        <button class="btn btn-default dropdown-toggle" 
                                type="button" 
                                id="dropdownMenu1" 
                                data-toggle="dropdown" 
                                aria-haspopup="true" aria-expanded="true">
                                    <?php _t("Actions") ; ?>
                            <span class="caret"></span>
                        </button>

                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">

                            <li role="separator" class="divider"></li>
                            <li>
                                <a 
                                    href="index.php?c=expenses&a=linesDeleteOk&id=<?php echo "$expense_items[id]" ; ?>"
                                    >
                                        <?php _t("Delete") ; ?>
                                </a>
                            </li>
                        </ul>
                    </div>
                </td>
                <td></td>
            </tr>                            
        <?php $i++; } ?>
        <tr>
            <td colspan="5" class="text-right"><?php _t("Totals") ; ?></td>                                                    
            <td class="text-right"><?php echo monedaf($total_totaldiscounts) ; ?></td>
            <td class="text-right"><?php echo monedaf($total_subtotal) ; ?></td>
            <td class="text-right"><?php echo monedaf($total_totaltax) ; ?></td>
            <td class="text-right"><?php echo monedaf($total_totaltvac) ; ?></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
    </tbody>

