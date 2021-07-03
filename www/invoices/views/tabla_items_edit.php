
    <thead>
        <tr>
            <th><?php _t("#"); ?></th>
            <th><?php _t("Quantity"); ?></th>            
            <?php if(modules_field_module('status', 'products')  ){?> <th><?php _t("code"); ?></th> <?php } ?>                                    
            <th><?php _t("Description"); ?></th>                            
            <th class="text-right"><?php _t("Price"); ?></th>
            <th class="text-right"><?php _t("Total"); ?></th>
            <th class="text-right"><?php _t("Discounts"); ?></th>
            <th class="text-right"><?php _t("Htva"); ?></th>
            <th class="text-right"><?php _t("Tva"); ?></th>
            <th class="text-right"><?php _t("Tvac"); ?></th>                            
            <th class="text-right"><?php _t("Edit"); ?></th>
            <th class=""><?php _t("Delete"); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php
       // $items = invoice_lines_list_by_invoice_id($id);
        $total_subtotal = 0;
        $total_totaltax = 0;
        $total_totaltvac = 0;
        $total_totaldiscounts = 0;
        $i = 1;
        $separator = false;
        foreach (invoice_lines_list_without_transport_by_invoice_id($id) as $key => $invoice_items) {

            $total_subtotal = $total_subtotal + $invoice_items['subtotal'];
            $total_totaltax = $total_totaltax + $invoice_items['totaltax'];
            $total_totaltvac = $total_totaltvac + ($invoice_items["subtotal"] + $invoice_items["totaltax"]);
            $total_totaldiscounts = $total_totaldiscounts + ($invoice_items["totaldiscounts"]);

            $class = ( strstr($invoice_items['description'], "ORDER") ) ? "info" : ""; // en la posicion cero


            if (stripos($invoice_items['description'], "---") !== FALSE) {
                $class = " success ";
                $separator = true;
            }

            include "tr_part_edit.php";
            
            $i++;
            $class = "";
            $separator = false;
        }
        ?>
        <tr>
            <td></td>
            <?php if(modules_field_module('status', 'products') ){?> <th></th> <?php } ?>                                    
            <td></td>
            <td></td>
            <td></td>
            <td class="text-right"><?php _t("Totals"); ?></td>                                                    
            <td class="text-right"><?php echo monedaf($total_totaldiscounts); ?></td>
            <td class="text-right"><?php echo monedaf($total_subtotal); ?></td>
            <td class="text-right"><?php echo monedaf($total_totaltax); ?></td>
            <td class="text-right info"><b><?php echo monedaf($total_totaltvac); ?></b></td>
            
            <td></td>
            <td></td>
        </tr>

        

