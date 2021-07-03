<?php include view("home" , "header") ; ?> 

<?php include "nav_details.php" ; ?>




<div class="row">
    <div class="col-sm-8 col-md-8 col-lg-8">

        <div class="well text-center">
            <h1>
                <?php _t("Expense") ; ?>: 
                <?php expenses_numberf($id) ; ?>    
            </h1>
        </div>


        <?php
        if ( $_REQUEST ) {
            foreach ( $error as $key => $value ) {
                message("info" , "$value") ;
            }
        }
        ?>






        <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-6">                                
                <?php include "part_details_billing_address.php" ; ?>                                
            </div>
            <div class="col-sm-12 col-md-6 col-lg-6">                
                <?php // include "part_details_delivery_address.php" ; ?>                
            </div>
        </div>





        <div class="panel panel-default">
            <div class="panel-heading"><?php _t("Items") ; ?></div>
            <div class="panel-body">
                <table class="table table-striped">




                    <thead>
                        <tr>
                            <th><?php _t("Quantity") ; ?></th>
                            <th><?php _t("Description") ; ?></th>
                            <th class="text-right"><?php _t("Price") ; ?></th>
                            <th class="text-right"><?php _t("Tax") ; ?></th>
                            <th class="text-right"><?php _t("Discounts") ; ?></th>
                            <th class="text-right"><?php _t("HTax") ; ?></th>
                            <th class="text-right"><?php _t("Tax") ; ?></th>
                            <th class="text-right"><?php _t("Taxc") ; ?></th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        //$items = expense_lines_list_by_expense_id($id);   
                        $subtotal = 0 ;
                        $tax = 0 ;
                        $tvac = 0 ;
                        $discounts = 0 ;


                        foreach ( expense_lines_list_by_expense_id($id) as $key => $expense_items ) {
                            $subtotal = $subtotal + $expense_items['subtotal'] ;
                            $tax = $tax + $expense_items['totaltax'] ;
                            $tvac = $tvac + ($expense_items["subtotal"] + $expense_items["totaltax"]) ;
                            $discounts = $discounts + ($expense_items["totaldiscounts"]) ;
                            $discounts_mode = ($expense_items['discounts_mode'] == '%') ? "( $expense_items[discounts]$expense_items[discounts_mode] )" : "" ;
                            ?>                        
                            <tr>
                                <td><?php echo "$expense_items[quantity]" ; ?></td>
                                <td><?php echo "$expense_items[description]" ; ?></td>
                                <td class="text-right"><?php echo moneda($expense_items['price']) ; ?> </td>
                                <td class="text-right"><?php echo "$expense_items[tax]" ; ?> %</td>
                                <td class="text-right"><?php
                                    echo "$discounts_mode" ;
                                    echo moneda($expense_items['totaldiscounts']) ;
                                    ?></td>                                
                                <td class="text-right"><?php echo moneda($expense_items['subtotal']) ; ?> </td>
                                <td class="text-right"><?php echo moneda($expense_items['totaltax']) ; ?> </td>                                                                
                                <td class="text-right"><?php echo moneda($expense_items['subtotal'] + $expense_items['totaltax']) ; ?> </td>

                            </tr>

                        <?php } ?>
                    </tbody>

                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>

                    <tr>
                        <td colspan="4" class="text-right"><?php _t("Totals") ; ?></td>                                                    
                        <td class="text-right"><?php echo moneda($discounts) ; ?></td>
                        <td class="text-right"><?php echo moneda($subtotal) ; ?></td>
                        <td class="text-right"><?php echo moneda($tax) ; ?></td>
                        <td class="text-right info"><b><?php echo moneda($tvac) ; ?></b></td>               
                    </tr>

                    <?php # Tax items total ############################################  ?>
                    <?php foreach ( tax_list() as $key => $tax ) { ?>                        
                        <tr>
                            <td colspan="3"></td>
                            <td colspan="2" class="text-right"><?php
                                _t("Total tva") ;
                                echo " $tax[value] %" ;
                                ?></td>
                            <td colspan="2" class="text-right"><?php echo moneda(expense_lines_total_by_tax($id , $tax['value'])) ; ?></td>
                            <td></td>
                        </tr>                        
                    <?php } ?>

                    <tr>
                        <td colspan="3"></td>
                        <td colspan="2" class="text-right"><?php _t("Total TVA") ?></td>
                        <td colspan="2" class="text-right"><?php echo moneda(expenses_field_id("tax" , $id)) ; ?></td>
                        <td></td>
                    </tr>


                    <?php # Tax items total ############################################      ?>

                    <tr>
                        <td colspan="4"></td>
                        <td colspan="3" class="text-right"><?php _t("Advance") ; ?></td>
                        <td colspan="1" class="text-right"><?php echo moneda(expenses_field_id("advance" , $id)) ; ?></td>



                    </tr>


                    <tr>
                        <td colspan="4"></td>
                        <td colspan="3" class="text-right"><?php _t("To pay") ; ?></td>                        
                        <td colspan="1" class="text-right info"><b><?php echo moneda($tvac - abs(expenses_field_id("advance" , $id))) ; ?></b></td>

                    </tr>





                </table>
            </div>
        </div>


        <div class="panel panel-default">
            <div class="panel-heading"><?php _t("Comunication") ; ?></div>
            <div class="panel-body">
                <?php echo $expenses['ce'] ; ?>
            </div>
        </div>


        <a name="comments"></a>
        <div class="panel panel-default">
            <div class="panel-heading"><?php _t("Comments") ; ?></div>
            <div class="panel-body">                
                <?php echo $expenses['comments'] ; ?></h3>
            </div>
        </div>



<?php
/*
echo "<h3>" . _t("Budgets on this expense") . "</h3>"; 
if ( $expenses['type'] == "M" ) {
    $budgets = budgets_expenses_search_budgets_by_expense_id($id); 
    include "table_budgets_in_expense.php" ;
}
//include "budgets_on_this_expense3.php" ;
// $budgets = budgets_expenses_search_budgets_by_expense_id($id); 
// include "table_budgets_in_expense.php"
 * 
 */
?>
        
        

        <embed 
            src="<?php echo $id; ?>.pdf" 
            type="application/pdf" 
            width="100%" 
            height="600px" />
        




    </div>
    <div class="col-sm-4 col-md-4 col-lg-4">
        <?php include "der.php" ; ?> 
    </div>
</div>







<?php include view("home" , "footer") ; ?>