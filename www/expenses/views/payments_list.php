<table class="table table-striped">
    <thead>
        <tr>
            <th><?php _t("Id") ; ?></th>            
            <th><?php _t("Date") ; ?></th>
            <th><?php _t("Credit note") ; ?></th>
            <th><?php _t("Payment") ; ?></th>
            <th></th>
        </tr>
    </thead>
    <tbody>                     
        <?php
        $i = 1 ;
        $total = 0 ;
        foreach ( balance_list_by_expense($id) as $key => $balance_item ) {
            $total = $total + ($balance_item["sub_total"] + $balance_item["tax"]) ;
            $balance_total = $balance_item["sub_total"] + $balance_item["tax"] ;
            $class = ($balance_item['canceled_code'] ) ? " danger " : "" ;
            ?>
            <tr class="<?php echo $class ; ?>">
                <td>
                    <a href="index.php?c=balance&a=details&id=<?php echo $balance_item['id'] ; ?>">
                        <?php echo $balance_item['id'] ; ?>
                    </a>
                </td>


                <?php /* <td><?php echo $balance_item['account_number']; ?></td> */ ?>


                <td><?php echo $balance_item['date_registre'] ; ?> </td>
                <td>
                    <?php echo ($balance_item['credit_note_id']) ? '<a href="index.php?c=credit_notes&a=details&id=' . $balance_item['credit_note_id'] . '">' . $balance_item[credit_note_id] . '</a>' : "" ; ?> 
                </td>


                <td class="text-right"><?php echo moneda($balance_total) ; ?> </td>

                <td>    
                    <?php if ( expenses_field_id("status" , $id) > 0 && ! $balance_item['canceled_code'] ) { ?>
                        <?php include "modal_cancel_payments_list.php" ; ?>
                        <?php
                    } else {
                        echo "<a href=\"index.php?c=balance&a=search&w=cancelCode&txt=$balance_item[canceled_code]\" >$balance_item[canceled_code]</a>" ;
                    }
                    ?>
                </td>

            </tr>                
            <?php
            $i ++ ;
        }
        ?>                       
    </tbody>
    <tfoot>
        <tr>
            <td colspan="3" class="text-right"><?php _t("Total") ; ?></td>
            <td class="text-right"><?php echo moneda($total) ; ?></td>
            <td></td>
        </tr>
    </tfoot>
</table>
