<?php include view("home" , "header") ; ?> 

<?php include "nav_details.php" ; ?>


<div class="row">
    <div class="col-sm-8 col-md-8 col-lg-8">



        <div class="well text-center">
            <h1><?php _t("Credit note") ; ?>: <?php echo $id ; ?></h1>
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
                <?php include "part_details_delivery_address.php" ; ?>
            </div>



        </div>




        <div class="panel panel-primary">
            <div class="panel-heading"><?php _t("Items") ; ?></div>
            <div class="panel-body">
                <table class="table table-striped">



                    <thead>
                       <tr>
                            <th><?php _t("#") ; ?></th>
                            <th><?php _t("Quantity") ; ?></th>
                            <th><?php _t("Description") ; ?></th>
                            <th class="text-right"><?php _t("Value") ; ?></th>
                            <th class="text-right"><?php _t("Sub total") ; ?></th>
                            <th class="text-right"><?php _t("Tva") ; ?></th>
                            <th class="text-right"><?php _t("Tvac") ; ?></th>
                        </tr>
                    </thead>


                    <tbody>
                        <?php
                        $i = 1;                         
                        $subtotal = 0 ;
                        $totaltax = 0 ;
                        $totaltaxc = 0; 
                        foreach (credit_note_lines_list_by_credit_note_id($id) as $key => $items ) {



                            $class = ( strstr($items['description'] , "ORDER") ) ? "info" : "" ; // en la posicion cero   

                            $subtotal = $subtotal + $items['value'] ;
                            $totaltax = $totaltax + $items['totaltax'] ;
                            $totaltaxc = $totaltaxc + $items['totaltaxc'] ;
                            
                            ?>   
                        
                        
                        
                            <tr class="<?php echo $class ; ?>">
                                <td><?php echo $i++ ; ?></td>                                
                                <td><?php echo "$items[quantity]" ; ?></td>                                
                                <td><?php echo "$items[description]" ; ?></td>
                                <td class="text-right"><?php echo moneda($items['value']) ; ?> </td>
                                <td class="text-right"><?php echo moneda($items['subtotal']) ; ?> </td>
                                <td class="text-right">(<?php echo ($items['tax']) ; ?> %) <?php echo moneda($items['totaltax']); ?></td>
                                <td class="text-right"><?php echo moneda($items['totaltaxc'] ) ; ?> </td>
                            </tr>

                        <?php } ?>
                    </tbody>

                 
                    

                    <tr>
                        <td colspan="3" class="text-right"><?php _t("Totals") ; ?></td>                                                    
                        <td class="text-right"><?php // echo moneda($discounts) ; ?></td>
                        <td class="text-right"><?php echo moneda($subtotal) ; ?></td>
                        <td class="text-right"><?php echo moneda($totaltax) ; ?></td>
                        <td class="text-right info"><b><?php echo moneda($totaltaxc ) ; ?></b></td>               
                    </tr>

                    
                    
<?php 
/*                    
                    <?php # Tax items total ############################################    ?>
                    <?php foreach ( tax_list() as $key => $tax ) { ?>                        
                        <tr>
                            <td colspan="5"></td>
                            <td colspan="2" class="text-right"><?php
                                _t("Total tax") ;
                                echo " $tax[value] %" ;
                                ?></td>
                            <td class="text-right"><?php // echo moneda(credit_note_lines_total_by_tax($id , $tax['value'])) ; ?></td>



                            <td></td>
                        </tr>
                    <?php } ?>                    
                    <?php # Tax items total ############################################  ?>
                        
                        */
?>
                        
                        
                    <?php
                    /*
                      <tr>
                      <td colspan="6"></td>
                      <td class="text-right"><?php _t("Advance"); ?></td>
                      <td class="text-right"><?php echo moneda(credit_notes_field_id("advance", $id)); ?></td>



                      </tr> */
                    ?>


                    
                    

                    <tr>
                        <td colspan="6" class="text-right"><?php _t("Paid") ; ?></td>                        
                        <td class="text-right"><?php echo moneda(credit_notes_field_id("returned", $id)) ; ?></td>
                    </tr>
                    
                    

                    <tr>
                        <td colspan="6" class="text-right"><?php _t("To pay") ; ?></td>                        
                        <td class="text-right"><?php echo moneda($totaltaxc - credit_notes_field_id("returned", $id)) ; ?></td>
                    </tr>





                </table>
            </div>
        </div>

        <?php
        /*
          <div class="panel panel-default">
          <div class="panel-body">
          <?php _t("Comunication"); ?>:  <?php echo $credit_notes['ce']; ?>
          </div>
          </div>
         */
        ?>

        <div class="panel panel-primary">
            <div class="panel-heading"><?php _t("Comments") ; ?></div>
            <div class="panel-body">
                <?php echo $credit_notes['comments'] ; ?>
            </div>
        </div>


        <hr>



    </div>
    <div class="col-sm-4 col-md-4 col-lg-4">
        <?php include "der.php" ; ?> 
    </div>
</div>



<?php include view("home" , "footer") ; ?>