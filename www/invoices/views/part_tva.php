            <?php //include "modal_form_items_add.php" ;  ?>

            <?php # Tax items total ############################################   ?>
            <?php foreach (tax_list() as $key => $tax) { ?>                        
                <tr>
                    <?php if(modules_field_module('status', 'products')  ){?> <td></td> <?php } ?>                                    
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td class="text-right"><?php
                        _t("Total tax");
                        echo " $tax[value] %";
                        ?></td>
                    <td class="text-right"><?php echo monedaf(invoice_lines_total_by_tax($id, $tax['value'])); ?></td>
                    <td></td>
                    
                    
                    <td></td>
                    <td></td>
                </tr>
            <?php } ?>                    
            <?php # Tax items total ############################################      ?>

            <tr>
                <?php if(modules_field_module('status', 'products')  ){?> <td></td> <?php } ?>                                    
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td class="text-right" ><?php _t("Advance"); ?></td>
                <td class="text-right" ><?php echo monedaf(invoices_field_id("advance", $id)); ?></td>
                
                
                <td></td>
                <td></td>
            </tr>


            <tr>
                <?php if(modules_field_module('status', 'products')  ){?> <td></td> <?php } ?>                                    
                <td></td>
                <td></td>
                <td></td>                
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td class="text-right"><?php _t("To pay"); ?></td>                        
                <td class="text-right info"><b><?php echo monedaf( ($total_totaltvac + $transport_tvac )- invoices_field_id("advance", $id)); ?></b></td>                                                
                <td></td>
                <td></td>
            </tr>
