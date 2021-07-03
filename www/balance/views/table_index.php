<table class="table table-striped" border>
    <thead>
        <tr>         
            <th><?php _t("Id") ; ?></th>
            <th><?php _t("Dates") ; ?></th>
            <th><?php _t("Details") ; ?></th>
            <th><?php _t("Acount") ; ?></th>
            <th><?php _t("Type") ; ?></th>
            <th><?php _t("Client") ; ?></th>                                
            <th><?php _t("Expense") ; ?></th>
            <th><?php _t("Invoice") ; ?></th>
            <th><?php _t("Credit note") ; ?></th>                                        
            <th class="text-right"><?php _t("Total") ; ?></th>              
            <th class="text-right"><?php _t("Total") ; ?></th>              
            <th><?php _t("Canceled code") ; ?></th>
            <th><?php _t("Action") ; ?></th>
        </tr>
    </thead>
    <tfoot>
      <tr>         
            <th><?php _t("Id") ; ?></th>
            <th><?php _t("Dates") ; ?></th>
            <th><?php _t("Details") ; ?></th>
            <th><?php _t("Acount") ; ?></th>
            <th><?php _t("Type") ; ?></th>
            <th><?php _t("Client") ; ?></th>                                
            <th><?php _t("Expense") ; ?></th>
            <th><?php _t("Invoice") ; ?></th>
            <th><?php _t("Credit note") ; ?></th>                                        
            <th class="text-right"><?php _t("Total") ; ?></th>              
            <th class="text-right"><?php _t("Total") ; ?></th>              
            <th><?php _t("Canceled code") ; ?></th>
            <th><?php _t("Action") ; ?></th>
        </tr>
    </tfoot>
    <tbody>

        <?php
        if ( ! $balance ) {
            message("info" , "No items") ;
        }


        //foreach ($liste_info as $address) {
        $month_actual = null; 
        $month = null; 
        
        foreach ( $balance as $balance_items ) {

            if ( $balance_items['client_id'] ) {
                $client_id = $balance_items['client_id'] ;
            } elseif ( $balance_items['invoice_id'] ) {
                $client_id = invoices_field_id("client_id" , $balance_items['invoice_id']) ;
            }
            
            $tvac = $balance_items['sub_total'] + $balance_items['tax']; 
            
            
            
            
            $month_actual = magia_dates_get_month_from_date($balance_items['date_registre']);              
                ?>
                <?php if($month_actual != $month){                                         
                    $month = $month_actual; 
                    ?>            
                    <tr>
                        <td colspan="14"><b><?php echo _trc(magia_dates_month($month_actual)); ?></b></td>
                    </tr>
                <?php } ?>  

            <tr>
                <td><?php echo $balance_items['id'] ; ?></td>

                <td>
                    <?php echo _t("Registre") . ": $balance_items[date_registre]" ; ?><br>
                    <?php echo _t("Date Valor") . ": $balance_items[date_registre]" ; ?>
                </td>

                <td>
                    <?php echo _t("Ref") . ": " . $balance_items['ref'] ; ?><br>
                    <?php echo _t("Description") . ": " . $balance_items['description'] ; ?><br>
                    <?php echo _t("c/e") . ": " . $balance_items['ce'] ; ?><br>


                </td>

                <td><?php echo $balance_items['account_number'] ; ?></td>

                <td><?php echo balance_type($balance_items['type']) ; ?></td>

                <td><?php echo contacts_formated($client_id) ?></td>

                
                 <td>
                    <a href="index.php?c=expenses&a=details&id=<?php echo $balance_items['expense_id'] ; ?>">
                        <?php echo $balance_items['expense_id'] ; ?>
                    </a> 
                </td>
                
                
                <td>
                    <a href="index.php?c=invoices&a=details&id=<?php echo $balance_items['invoice_id'] ; ?>">
                        <?php echo $balance_items['invoice_id'] ; ?>
                    </a> 
                </td>

               

                <td>
                    <a href="index.php?c=credit_notes&a=details&id=<?php echo $balance_items['credit_note_id'] ; ?>">
                        <?php echo $balance_items['credit_note_id'] ; ?>
                    </a> 
                </td>                                             

                <td class="text-right">
                    <?php
                        
                    if( $tvac < 0 ){
                        echo moneda($tvac);
                    }
                        
                    if( $tvac == 0 ){
                        echo moneda($tvac);
                    }
                    
                    
                    ?>
                </td>

                

                <td class="text-right">
                    <?php
                        
                    if( $tvac > 0 ){
                        echo "+".moneda($tvac);
                    }
                        
                    if( $tvac == 0 ){
                        echo moneda($tvac);
                    }
                    
                    
                    ?>
                </td>

                
                
                <td class="text-center">
                    <a href="index.php?c=balance&a=search&w=cancelCode&txt=<?php echo $balance_items['canceled_code'] ; ?>">
                        <?php echo $balance_items['canceled_code'] ; ?>
                    </a>
                </td>





                <td class="text-center">

                    <form action="index.php" method="get">
                        <input type="hidden" name="c" value="balance">
                        <input type="hidden" name="a" value="details">
                        <input type="hidden" name="id" value="<?php echo $balance_items['id'] ?>">
                        <button type="submit" class="btn btn-default"><?php _t("Details") ; ?></button>
                    </form>
                </td>




            </tr>
        <?php } ?>	

    </tbody>


</table>



