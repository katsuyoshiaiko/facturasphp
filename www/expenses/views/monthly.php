<?php include view("home" , "header") ; ?> 

<div class="row">
    <div class="col-sm-8 col-md-8 col-lg-8">
        <div class="well text-center"><h1><?php _t("Expense") ; ?>: <?php echo $id ; ?></h1></div>

        <?php
        if ( $_REQUEST ) {
            foreach ( $error as $key => $value ) {
                message("info" , "$value") ;
            }
        }
        ?>


        <?php # SAVE ################## ?>
        <?php # SAVE ################## ?>
        <?php # SAVE ################## ?>
        <?php # SAVE ################## ?>
        <?php # SAVE ################## ?>

        <nav class="navbar navbar-default">
            <div class="container-fluid">

                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                    <form class="navbar-form navbar-right">
                        <input type="hidden" name="c" value="expenses"> 
                        <input type="hidden" name="a" value="details"> 
                        <input type="hidden" name="id" value="<?php echo "$id" ; ?>"> 
                        <div class="form-group">
                        </div>
                        <button type="submit" class="btn btn-danger"><span class="glyphicon glyphicon-floppy-disk"></span> <?php _t("Save") ; ?></button>
                    </form>

                </div>
            </div>
        </nav>








        <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-6">                                
                <?php include "part_details_billing_address.php" ; ?>                                
            </div>
            <div class="col-sm-12 col-md-6 col-lg-6">                
                <?php include "part_details_delivery_address.php" ; ?>                
            </div>
        </div>








        <div class="panel panel-default">
            <div class="panel-heading">
                
                <a name="items"><?php _t("items") ; ?></a>
                
            </div>
            <div class="panel-body">
                <table class="table table-striped">




                    <thead>
                        <tr>
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

                        foreach ( $items as $key => $expense_items ) {

                            $total_subtotal = $total_subtotal + $expense_items['subtotal'] ;
                            $total_totaltax = $total_totaltax + $expense_items['totaltax'] ;
                            $total_totaltvac = $total_totaltvac + ($expense_items["subtotal"] + $expense_items["totaltax"]) ;
                            $total_totaldiscounts = $total_totaldiscounts + ($expense_items["totaldiscounts"]) ;
                            ?>
                            <tr>                            
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

                        <?php } ?>



                        <tr>
                            <td colspan="4" class="text-right"><?php _t("Totals") ; ?></td>                                                    
                            <td class="text-right"><?php echo monedaf($total_totaldiscounts) ; ?></td>
                            <td class="text-right"><?php echo monedaf($total_subtotal) ; ?></td>
                            <td class="text-right"><?php echo monedaf($total_totaltax) ; ?></td>
                            <td class="text-right"><?php echo monedaf($total_totaltvac) ; ?></td>

                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>


                    </tbody>

                    
                    
                    <?php include "form_items_add.php" ; ?>
                    

                    <?php //include "modal_form_items_add.php" ; ?>

                    <?php # Tax items total ############################################  ?>
                    <?php foreach ( tax_list() as $key => $tax ) { ?>                        
                        <tr>
                            <td colspan="4"></td>
                            <td class="text-right"><?php
                                _t("Total tax") ;
                                echo " $tax[value] %" ;
                                ?></td>
                            <td class="text-right"><?php echo monedaf(expense_lines_total_by_tax($id , $tax['value'])) ; ?></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    <?php } ?>                    
                    <?php # Tax items total ############################################     ?>

                    <tr>
                        <td colspan="5"></td>
                        <td class="text-right" ><?php _t("Advance") ; ?></td>
                        <td class="text-right" colspan="2"><?php echo monedaf(expenses_field_id("advance" , $id)) ; ?></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>


                    <tr>
                        <td colspan="5"></td>
                        <td class="text-right"><?php _t("To pay") ; ?></td>                        
                        <td class="text-right" colspan="2"><?php echo monedaf($total_totaltvac - expenses_field_id("advance" , $id)) ; ?></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>




                </table>
                <a name="items_add"></a>

            </div>
        </div>









        <div class="panel panel-default">
            <div class="panel-heading"><?php _t("Comments") ; ?></div>
            <div class="panel-body">
                <?php echo $expenses['comments'] ; ?>
                <?php
                include "modal_form_comments_update.php" ;
                ?>
            </div>
        </div>




    </div>


    <div class="col-sm-4 col-md-4 col-lg-4">
        <?php include "der.php" ; ?> 
    </div>
</div>





<?php // include("www/home/views/footer.php");  ?>  
<?php include view("home" , "footer") ; ?>

