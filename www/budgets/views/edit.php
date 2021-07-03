<?php
include view("home", "header");
//
//include "modal_items_edit.php";
?> 


<?php
/* <script type="text/javascript">
  $(".row_position").sortable({
  delay: 150,
  stop: function () {
  var selectedData = new Array();
  $('.row_position>tr').each(function () {
  selectedData.push($(this).attr("id"));
  });
  updateOrder(selectedData);
  }
  });
  function updateOrder(data) {
  $.ajax({
  url: "ajaxPro.php",
  type: 'post',
  data: {position: data},
  success: function () {
  alert('your change successfully saved');
  }
  })
  }
  </script>
 */
?>


<div class="row">
    <div class="col-sm-12 col-md-12 col-lg-12">

        <nav class="navbar navbar-default">
            <div class="container-fluid">

                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                    <form class="navbar-form navbar-right">
                        <input type="hidden" name="c" value="budgets"> 
                        <input type="hidden" name="a" value="details"> 
                        <input type="hidden" name="id" value="<?php echo "$id"; ?>"> 
                        <div class="form-group">
                        </div>
                        <button type="submit" class="btn btn-danger">
                            <span class="glyphicon glyphicon-floppy-disk"></span> 
                            <?php _t("Save"); ?>
                        </button>
                    </form>

                </div>
            </div>
        </nav>

        <div class="well text-center">
            <h1>
                <?php
                 _t("Budget");
                ?>: <?php echo $id; ?>
            </h1>
        </div>

        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>


        <?php # SAVE ################## ?>


        <div class="row">
            <div class="col-sm-12 col-md-4 col-lg-4">
                <?php include "part_details_company.php"; ?>
            </div>
            <div class="col-sm-12 col-md-4 col-lg-4">
                <?php include "part_details_billing_address.php"; ?>
            </div>
            <div class="col-sm-12 col-md-4 col-lg-4">
                <?php include "part_details_delivery_address.php"; ?>
            </div>
        </div>



        <?php
        if (contacts_field_id('discounts', budgets_field_id("client_id", $id))) {
            message('info', "This customer has a registered default discount");
        }
        ?>




        <div class="panel panel-primary">
            <div class="panel-heading">

                <a name="items_details"></a><?php _t("items"); ?>

            </div>
            <div class="panel-body">

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th><?php _t("#"); ?></th>
                            <th><?php _t("Quantity"); ?></th>
                            <?php if (modules_field_module('status', 'products') ) { ?> <th><?php _t("Code"); ?></th> <?php } ?>
                            <th><?php _t("Description"); ?></th>                            
                            <th class="text-right"><?php _t("Price"); ?></th>
                            <th class="text-right"><?php _t("Sub total"); ?></th>
                            <th class="text-right"><?php _t("Discounts"); ?></th>
                            <th class="text-right"><?php _t("Htva"); ?></th>
                            <th class="text-right"><?php _t("Tax"); ?></th>
                            <th class="text-right"><?php _t("Tvac"); ?></th>                            
                            <th class="text-right"><?php _t("Edit"); ?></th>
                            <th class="text-right"><?php _t("Delete"); ?></th>
                        </tr>
                    </thead>









                    <tbody class="">
                        <?php
                        // <tbody class="row_position">
                        $items = budget_lines_list_by_budget_id_without_transport($id);
                        //$items = budget_lines_list_by_budget_id($id);

                        $total_subtotal = 0;
                        $total_totaltax = 0;
                        $total_totaltvac = 0;
                        $total_totaldiscounts = 0;
                        //
                        //Transport
                        $transport_subtotal = 0; 
                        $transport_tax = 0; 
                        $transport_tvac = 0; 
                        $transport_discounts = 0; 
                        
                        
                        $i = 1;
                        $class = "";
                        $separator = false;

                        foreach ($items as $key => $item) {

                            $total_subtotal = $total_subtotal + $item['subtotal'];
                            $total_totaltax = $total_totaltax + $item['totaltax'];
                            $total_totaltvac = $total_totaltvac + ($item["subtotal"] + $item["totaltax"]);
                            $total_totaldiscounts = $total_totaldiscounts + ($item["totaldiscounts"]);


                            if (stripos($item['description'], "---") !== FALSE) {
                                $class = " success ";
                                $separator = true;
                            }


                            ## EDIT
                            include "tr_part_edit.php";


                            $class = "";
                            $separator = false;
                        }
                        ?>

                        <tr>
                            <th><?php _t("#"); ?></th>
                            <th><?php _t("Quantity"); ?></th>
                            <?php if (modules_field_module('status', 'products') ) { ?> <th><?php _t("Code"); ?></th> <?php } ?>
                            <th><?php _t("Description"); ?></th>                            
                            <th class="text-right"><?php _t("Price"); ?></th>
                            <th class="text-right"><?php _t("Sub total"); ?></th>
                            <th class="text-right"><?php _t("Discounts"); ?></th>
                            <th class="text-right"><?php _t("Htva"); ?></th>
                            <th class="text-right"><?php _t("Tax"); ?></th>
                            <th class="text-right"><?php _t("Tvac"); ?></th>                            
                            <th class="text-right"><?php _t("Edit"); ?></th>
                            <th class="text-right"><?php _t("Delete"); ?></th>
                        </tr>



                        <tr>

                            <td></td>                                                    
                            <td></td>                                                    
                            <?php if (modules_field_module('status', 'products') ) { ?> <td></td> <?php } ?>
                            <td></td>                                                    

                            <td class="text-right"><?php _t("Totals"); ?></td>                                                    
                            <td class="text-right"><?php echo moneda($total_subtotal); ?></td>
                            <td class="text-right"><?php echo moneda($total_totaldiscounts); ?></td>
                            <td class="text-right"><?php echo moneda($total_subtotal); ?></td>
                            <td class="text-right"><?php echo moneda($total_totaltax); ?></td>
                            <td class="text-right info"><b><?php echo moneda($total_totaltvac); ?></b></td>
                            <td></td>
                            <td></td>
                        </tr>



                        <?php
                        // mostramos solo si hay items transporte
                        if (modules_field_module('status', 'transport') || budget_lines_list_transport_by_budget_id($id)) {
                            //if( budget_lines_list_transport_by_budget_id($id)){ 
                            ?>
                            <?php ##################################################################### ?>
                            <?php ### T R A N S P O R T ############################################### ?>    
                            <?php ##################################################################### ?>
                            <?php ##################################################################### ?>
                            <?php ##################################################################### ?>
                            <?php ##################################################################### ?>    
                            <tr>
                                <th><?php _t("Transport"); ?></th>                    
                                <?php if ( modules_field_module('status', 'products')) { ?><th><?php _t("Code"); ?></th><?php } ?>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>         
                            </tr>    
                            <tr>                                
                                <th>#</th>                                        
                                <?php if (modules_field_module('status', 'products') ) { ?> <th><?php _t("Code"); ?></th> <?php } ?>   
                                <th><?php _t("Quantity"); ?></th>
                                <th><?php _t("Description"); ?></th>
                                <th class="text-right"><?php _t("Price U."); ?></th>
                                <th class="text-right"><?php _t("Sub total"); ?></th>        
                                <th class="text-right"><?php _t("Discounts"); ?></th>
                                <th class="text-right"><?php _t("Htva"); ?></th>
                                <th class="text-right"><?php _t("TVA"); ?></th>
                                <th class="text-right"><?php _t("Tvac"); ?></th>
                                <th class="text-right"><?php _t("Edit"); ?></th>
                                <th class="text-right"><?php _t("Delete"); ?></th>
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
                                    <?php if (  modules_field_module('status', 'products')) { ?><td><?php echo "$transport_item[code]"; ?></td><?php } ?>
                                    
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
                                    <td><?php // include "modal_items_edit.php";  ?></td>
                                    <td class="text-right">             
                                        <a class="btn btn-danger btn-md" href="index.php?c=budgets&a=linesDeleteOk&id=<?php echo "$transport_item[id]"; ?>&redi=1">
                                            <span class="glyphicon glyphicon-trash"></span>
                                            <?php _t("Delete"); ?>
                                        </a>            
                                    </td>                    
                                </tr>
                                <?php
                                $class = "";
                                $separator = false;
                            }
                            ?>
                            </tr>        
                            <tr>

                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td class="text-right"><?php _t("Totals"); ?></td>                                                    
                                <td class="text-right"><?php echo moneda($transport_subtotal + $transport_discounts); ?></td>
                                <td class="text-right"><?php echo moneda($transport_discounts); ?></td>
                                <td class="text-right"><?php echo moneda($transport_subtotal); ?></td>
                                <td class="text-right"><?php echo moneda($transport_tax); ?></td>
                                <td class="text-right info"><b><?php echo moneda($transport_tvac); ?></b></td> 
                                
                                <td></td>
                                <?php if( modules_field_module('status', 'products') ){?><td></td><?php } ?>   

                            </tr>    

                            <?php ##################################################################### ?>
                            <?php ###  // T R A N S P O R T ########################################### ?>    
                            <?php ##################################################################### ?>
                            <?php ##################################################################### ?>
                            <?php ##################################################################### ?>
                        <?php } ?>    







                    </tbody>










                    <a name="items_add"></a>


                    <?php  include "form_items_add.php"; ?>


                    <?php # Tax items total ############################################    ?>
                    <?php foreach (tax_list() as $key => $tax) { ?>                        
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>

                            <td></td>
                            <td class="text-right"><?php _t("Total tax"); ?> <?php echo $tax['value']; ?>%</td>
                            <td class="text-right"><?php echo moneda(budget_lines_total_by_tax($id, $tax['value'])); ?></td>                                                        
                            
                            
                            <td></td>
                            <?php if (modules_field_module('status', 'products') ) { ?><td></td><?php } ?>        
                            <?php if (modules_field_module('status', 'products') ) { ?><td></td><?php } ?>        
                        </tr>
                    <?php } ?>               

                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>

                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>

                        <td class="text-right"><b><?php _t("To pay"); ?></b></td>                                                
                        <td colspan="0"class="text-right info"  >
                            <b>
                                <?php echo moneda(($total_totaltvac + $transport_tvac ) - budgets_field_id("advance", $id)); ?>
                            </b>
                        </td>


                        
                        
                        <?php if (modules_field_module('status', 'products') ) { ?><td></td><?php } ?>        
                        <?php if (modules_field_module('status', 'products') ) { ?><td></td><?php } ?>  
                    </tr>




                </table>



            </div>
        </div>




        <a name="comments"></a>

        <div class="panel panel-primary">
            <div class="panel-heading"><?php _t("Comments"); ?></div>
            <div class="panel-body">

                <?php
                if ($budgets['comments']) {
                    echo "<p>" . $budgets['comments'] . "</p>";


                    echo '
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_form_comments_update">
    <span class="glyphicon glyphicon-edit"></span> ' . _tr("Edit comments") . '
</button>';
                    include "modal_form_comments_update.php";
                } else {

                    echo '
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_form_comments_update">
    <span class="glyphicon glyphicon-plus-sign"></span> ' . _tr("Add comments") . '
</button>';
                    include "modal_form_comments_update.php";
                }
                ?> 


            </div>
        </div>






    </div>



</div>


<?php
/*


  <form action="index.php" method="get" class="form-horizontal">
  <input type="hidden" name="c" value="budgets">
  <input type="hidden" name="a" value="details">
  <input type="hidden" name="id" value="<?php echo "$id"; ?>">

  <div class="form-group">
  <div class="col-sm-offset-2 col-sm-10">
  <button type="submit" class="btn btn-default"><?php _t("End"); ?></button>
  </div>
  </div>
  </form>

 */
?>



<?php // include("www/home/views/footer.php");      ?>  

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>



<?php include view("home", "footer"); ?>

