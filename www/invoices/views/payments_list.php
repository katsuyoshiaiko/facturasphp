<table class="table table-striped">
    <thead>
        <tr>
            <th><?php _t("Id") ; ?></th>            
            <th><?php _t("Date") ; ?></th>            
            <th><?php _t("Account") ; ?></th>
            <th><?php _t("Ref") ; ?></th>
            <th><?php _t("Payment") ; ?></th>
            <th><?php _t("Cancel code"); ?></th>
        </tr>
    </thead>
    <tbody>                     
        <?php
        $i = 1 ;
        $total = 0 ;
        foreach ( balance_list_by_invoice($id) as $key => $balance_item ) {
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




                <td>
                    <?php echo $balance_item['date'] ; ?> 
                </td>
    

                <td>
                    <?php echo $balance_item['account_number'] ; ?> 
                </td>
    

                <td>
                    <?php echo $balance_item['ref'] ; ?> 
                </td>
    
                
                                
    


                <td class="text-right"><?php echo moneda($balance_total) ; ?> </td>

                <td>    
                    <?php if ( invoices_field_id("status" , $id) > 0 && ! $balance_item['canceled_code'] ) { ?>
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
            <td colspan="4" class="text-right"><?php _t("Total") ; ?></td>
            <td class="text-right"><?php echo moneda($total) ; ?></td>
            <td></td>
        </tr>
    </tfoot>
</table>
