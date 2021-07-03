<?php include view("home", "header"); ?> 

<?php include "nav_details.php"; ?>

<?php
if (
        modules_field_module('status', 'transport') &&
        count($code_transport_in_budgets) > 1) {
    message("atention", "This budget has more than one transport item registred");
}
?>



<?php
//vardump(modules_field_module('status', 'transport'));

if (
        modules_field_module('status', 'transport') &&
        count($code_transport_in_budgets) < 1
) {
    message("atention", "This budget has not transport item registred");
}
?>




<div class="row">
    <div class="col-sm-8 col-md-8 col-lg-8">



        <div class="well text-center">
            <h1>
                <?php
                _t("Budget");
                ?>: 
                <?php echo $id; ?>

            </h1>
        </div>


        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>





        <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-6">

                <?php
                /*
                  <div class="panel panel-primary">
                  <div class="panel-heading">
                  <h3 class="panel-title"><?php _t("Client") ; ?>: <?php echo budgets_field_id("client_id" , $id) ; ?></h3>
                  </div>

                  <div class="panel-body">
                  <ul class="list-group">
                  <li class="list-group-item"><b><?php _t("Company") ; ?>:</b> <a href="index.php?c=contacts&a=details&id=<?php echo $budgets['client_id'] ; ?>"><?php echo contacts_formated(budgets_field_id("client_id" , $id)) ; ?></a> </li>


                  <li class="list-group-item"><b><?php _t("Company Tva") ; ?>:</b> <?php echo (directory_list_by_contact_name(budgets_field_id("client_id" , $id) , "Tva")) ; ?> </li>
                  <li class="list-group-item"><b><?php _t("Company Tel fixe") ; ?>:</b> <?php echo (directory_list_by_contact_name(budgets_field_id("client_id" , $id) , "Tel fixe")) ; ?> </li>
                  <li class="list-group-item"><b><?php _t("Company GSM") ; ?>:</b> <?php echo (directory_list_by_contact_name(budgets_field_id("client_id" , $id) , "GSM")) ; ?> </li>


                  </ul>
                  </div>


                  </div>

                 */
                ?>

                <?php include "part_details_billing_address.php"; ?>

            </div>




            <div class="col-sm-12 col-md-6 col-lg-6">


                <?php include "part_details_delivery_address.php"; ?>

            </div>



        </div>




        <div class="panel panel-primary">
            <div class="panel-heading"><?php _t("Items"); ?></div>
            <div class="panel-body">



                <table class="table table-striped" >
                    <thead>

                        <tr>
                            <th>#</th>                                     
                            <th><?php _t("Quantity"); ?></th>                             
                            <th><?php _t("Description"); ?></th>                               
                            <th class="text-right"><?php _t("Price U."); ?></th>
                            <th class="text-right"><?php _t("Sub total"); ?></th>
                            <th class="text-right"><?php _t("Discounts"); ?></th>
                            <th class="text-right"><?php _t("Htva"); ?></th>
                            <th class="text-right"><?php _t("TVA"); ?></th>
                            <th class="text-right"><?php _t("Tvac"); ?></th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
//$items = budget_lines_list_by_budget_id($id);   
                        $subtotal = 0;
                        $tax = 0;
                        $tvac = 0;
                        $discounts = 0;
                        $class = "";
                        $separator = false;


                        $transport_subtotal = 0;
                        $transport_tax = 0;
                        $transport_tvac = 0;
                        $transport_discounts = 0;
                        $transport_class = "";
                        $transport_separator = false;
                        $i = 1;
                        $j = 2;
                        $q = 1;

                        $new_order = false;



                        foreach (budget_lines_list_by_budget_id_without_transport($id) as $key => $budget_items) {

                            if (stripos($budget_items['description'], "---") !== FALSE) {
                                $class = " success ";
                                $separator = true;
                            }

                            $class = ( strstr($budget_items['code'], "ORDER") ) ? "info" : $class; // en la posicion cero  
                            $class = ( strstr($budget_items['code'], "SIDE") ) ? "danger" : $class; // en la posicion cero  
                            //            //    
                            // No traduzco en caso que sea

                            if (
                                    $budget_items['code'] == 'ORDER' ||
                                    $budget_items['code'] == 'PAT' ||
                                    $budget_items['code'] == 'POST'
                            ) {
                                $description = $budget_items['description'];
                            } else {

                                $description = $budget_items['description'];
                            }


                            $new_order = ( $budget_items['code'] == 'ORDER' ) ? true : false;





                            $subtotal = $subtotal + $budget_items['subtotal'];
                            $tax = $tax + $budget_items['totaltax'];
                            $tvac = $tvac + ($budget_items["subtotal"] + $budget_items["totaltax"]);
                            $discounts = $discounts + ($budget_items["totaldiscounts"]);
                            ?>   



                            <?php
                            if ($new_order && $i > 1) {
                                $q = 1;
                                ?> 
                                <tr>
                                    <th>#</th>         
                                    <th><?php _t("Quantity"); ?></th>                                             
                                    <th><?php _t("Description"); ?></th>                               
                                    <th class="text-right"><?php _t("Price U."); ?></th>
                                    <th class="text-right"><?php _t("Sub total"); ?></th>
                                    <th class="text-right"><?php _t("Discounts"); ?></th>
                                    <th class="text-right"><?php _t("Htva"); ?></th>
                                    <th class="text-right"><?php _t("TVA"); ?></th>
                                    <th class="text-right"><?php _t("Tvac"); ?></th>
                                </tr>
                            <?php } ?>




                            <tr class="<?php echo $class; ?>">
                                <?php if (!$separator) { ?> 
                                    <td><?php echo $i++; ?></td>                                                                          
                                    <td><?php echo "$budget_items[quantity]"; ?></td>                    
                                    <?php if (modules_field_module('status', 'products')) { ?><td><?php echo "$budget_items[code]"; ?></td><?php } ?>
                                    <td><?php echo $description; ?></td>                    
                                    <td class="text-right"><?php echo moneda($budget_items['price']); ?> </td>
                                    <td class="text-right"><?php echo moneda($budget_items['quantity'] * $budget_items['price']); ?> </td>
                                    <td class="text-right">
                                        <?php
                                        echo ($budget_items['discounts_mode'] == '%') ?
                                                " ( $budget_items[discounts]$budget_items[discounts_mode] ) " : "";
                                        echo moneda($budget_items['totaldiscounts']);
                                        ?>
                                    </td>  


                                    <td class="text-right"><?php echo moneda($budget_items['subtotal']); ?> </td>
                                    <td class="text-right">(<?php echo "$budget_items[tax]"; ?> %) <?php echo moneda($budget_items['totaltax']); ?> </td>                                                                
                                    <td class="text-right"><?php echo moneda($budget_items['subtotal'] + $budget_items['totaltax']); ?> </td>
                                <?php } else { ?>


                                    <td colspan="9"><?php echo $description; ?></td>


                                    <?php if (modules_field_module('status', 'products')) { ?> <td></td> <?php } ?>
                                    



                                <?php } ?>
                            </tr>


                            <?php
                            $class = "";
                            $separator = false;
                        }
                        ?>
                    </tbody>

                    <tr>
                        <th>#</th>                        
                           
                        <th><?php _t("Quantity"); ?></th> 
                        <?php if (modules_field_module('status', 'products')) { ?> <th><?php _t("Code"); ?></th> <?php } ?>                            
                        <th><?php _t("Description"); ?></th>                               
                        <th class="text-right"><?php _t("Price U."); ?></th>
                        <th class="text-right"><?php _t("Sub total"); ?></th>
                        <th class="text-right"><?php _t("Discounts"); ?></th>
                        <th class="text-right"><?php _t("Htva"); ?></th>
                        <th class="text-right"><?php _t("TVA"); ?></th>
                        <th class="text-right"><?php _t("Tvac"); ?></th>
                    </tr>



                    <tr>
                        <?php if (modules_field_module('status', 'products')) { ?><td></td><?php } ?>
                        <td colspan="4" class="text-right"><?php _t("Totals"); ?></td>                                                    
                        <td class="text-right"><?php echo moneda($subtotal + $discounts); ?></td>
                        <td class="text-right"><?php echo moneda($discounts); ?></td>
                        <td class="text-right"><?php echo moneda($subtotal); ?></td>
                        <td class="text-right"><?php echo moneda($tax); ?></td>
                        <td class="text-right info"><b><?php echo moneda($tvac); ?></b></td>               
                    </tr>




                    <?php if (modules_field_module('status', 'transport') || budget_lines_list_transport_by_budget_id($id)) { ?>
                        <?php #####################################################################  ?>
                        <?php ### T R A N S P O R T ############################################### ?>    
                        <?php ##################################################################### ?>
                        <?php ##################################################################### ?>
                        <?php ##################################################################### ?>
                        <?php ##################################################################### ?>    
                        <tr>
                            <th colspan="8"><?php _t("Transport"); ?></th>                                                                    
                        </tr>    
                        <tr>
                            <th>#</th>        
                            
                            <th><?php _t("Quantity"); ?></th>    
                            <?php if (modules_field_module('status', 'products') ) { ?> <th><?php _t("Code"); ?></th> <?php } ?>        
                            <th><?php _t("Description"); ?></th>
                            <th class="text-right"><?php _t("Price U."); ?></th>
                            <th class="text-right"><?php _t("Sub total"); ?></th>        
                            <th class="text-right"><?php _t("Discounts"); ?></th>
                            <th class="text-right"><?php _t("Htva"); ?></th>
                            <th class="text-right"><?php _t("TVA"); ?></th>
                            <th class="text-right"><?php _t("Tvac"); ?></th>
                        </tr>        
                        <tr>
                            <?php
                            //$items = budget_lines_list_by_budget_id($id);   
//        $transport_subtotal = 0;
//        $transport_tax = 0;
//        $transport_tvac = 0;        
//        $transport_discounts = 0;
//        $transport_class = "";
//        $transport_separator = false;
                            $i = 1;

                            foreach (budget_lines_list_transport_by_budget_id($id) as $key => $transport_item) {
                                $transport_subtotal = $transport_subtotal + $transport_item['subtotal'];
                                $transport_tax = $transport_tax + $transport_item['totaltax'];
                                $transport_tvac = $transport_tvac + ($transport_item["subtotal"] + $transport_item["totaltax"]);
                                $transport_discounts = $transport_discounts + ($transport_item["totaldiscounts"]);
                                $transport_description = $transport_item['description'];
                                ?>   
                            <tr class="<?php echo $class; ?>">
                                
                                <td><?php echo $i++; ?></td>
                                <td><?php echo "$transport_item[quantity]"; ?></td>
                                <?php if (modules_field_module('status', 'products') ) { ?> <td><?php echo "$transport_item[code]"; ?></td> <?php } ?>  

                                <td><?php echo $transport_description; ?></td>
                                <td class="text-right"><?php echo moneda($transport_item['price']); ?> </td>
                                <td class="text-right"><?php echo moneda($transport_item['quantity'] * $transport_item['price']); ?> </td>
                                <td class="text-right">
                                    <?php
                                    echo ($transport_item['discounts_mode'] == '%') ?
                                            " ( $transport_item[discounts]$transport_item[discounts_mode] ) " : "";
                                    echo moneda($transport_item['totaldiscounts']);
                                    ?>
                                </td>  
                                <td class="text-right"><?php echo moneda($transport_item['subtotal']); ?> </td>
                                <td class="text-right">
                                    (<?php echo "$transport_item[tax]"; ?> %) <?php echo moneda($transport_item['totaltax']); ?> </td>                                                                
                                <td class="text-right"><?php echo moneda($transport_item['subtotal'] + $transport_item['totaltax']); ?> </td>                                
                            </tr>
                            <?php
                            $class = "";
                            $separator = false;
                        }
                        ?>
                        </tr>        
                        <tr>
                            <?php if (modules_field_module('status', 'products') ) { ?> <td></td> <?php } ?>  

                            <td></td>
                            <td></td>
                            <td></td>
                            <td class="text-right"><?php _t("Totals"); ?></td>                                                    
                            <td class="text-right"><?php echo moneda($transport_subtotal + $transport_discounts); ?></td>
                            <td class="text-right"><?php echo moneda($transport_discounts); ?></td>
                            <td class="text-right"><?php echo moneda($transport_subtotal); ?></td>
                            <td class="text-right"><?php echo moneda($transport_tax); ?></td>
                            <td class="text-right info"><b><?php echo moneda($transport_tvac); ?></b></td> 


                        </tr>    

                        <?php #####################################################################  ?>
                        <?php ###  // T R A N S P O R T ###########################################  ?>    
                        <?php ##################################################################### ?>
                        <?php ##################################################################### ?>
                        <?php ##################################################################### ?>
                    <?php } ?>    









                    <?php # Tax items total ############################################      ?>
                    <?php foreach (tax_list() as $key => $tax) { ?>                        
                        <tr>
                            <th></th>                                    
                            <?php if (modules_field_module('status', 'products')) { ?><th></th><?php } ?>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td colspan="2" class="text-right">
                                <?php
                                _t("Total tax");
                                echo " $tax[value] %";
                                ?>
                            </td>
                            <td class="text-right">
                                <?php echo moneda(budget_lines_total_by_tax($id, $tax['value'])); ?>
                            </td>
                            <td></td>
                        </tr>

                    <?php } ?>                    
                    <?php # Tax items total ############################################    ?>



                    <tr>
                        <?php if (modules_field_module('status', 'products') ) { ?> <td></td> <?php } ?>
                        
                        <td></td>   
                        <td></td>   
                        <td></td>   
                        <td></td>   
                        <td></td>   
                        <td></td>   


                        <td colspan="2" class="text-right"><b><?php _t("To pay"); ?></b></td>                        
                        <td class="text-right info"><b><?php echo moneda(($tvac + $transport_tvac) - budgets_field_id("advance", $id)); ?></b></td>


                    </tr>





                </table>











            </div>
        </div>

        <?php
        /*
          <div class="panel panel-default">
          <div class="panel-body">
          <?php _t("Comunication"); ?>:  <?php echo $budgets['ce']; ?>
          </div>
          </div>
         */
        ?>


        <div class="panel panel-primary">
            <div class="panel-heading"><?php _t("Comments"); ?></div>
            <div class="panel-body">
                <?php echo $budgets['comments']; ?>
            </div>
        </div>


        <hr>



    </div>
    <div class="col-sm-4 col-md-4 col-lg-4">
        <?php include "der.php"; ?> 
    </div>
</div>







<?php include view("home", "footer"); ?>