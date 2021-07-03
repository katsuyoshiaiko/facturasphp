<table class="table table-striped">
    <thead>
        <tr>         
            <th><?php _t("Id"); ?></th>
            <th><?php _t("Budget"); ?></th>
            <th><?php _t("Credit note"); ?></th>
            <th><?php _t("Date"); ?></th>                    
            <th><?php _t("Client"); ?></th>                    
            <th class="text-right"><?php _t("Total"); ?></th>
            <th class="text-right"><?php _t("Advance"); ?></th>
            <th class="text-right"><?php _t("Solde"); ?></th>                                        
            <th><?php _t("Reminders"); ?></th>
            <th><?php _t("Status"); ?></th>                    
            <th><?php _t("Details"); ?></th>                    
            <?php if (permissions_has_permission($u_rol, "invoices", "update")) { ?><th><?php _t("Edit"); ?></th><?php } ?>                               
            <th><span class="glyphicon glyphicon-print"></span> <?php // _t("Print"); ?></th>                                                                      
            <th><span class="glyphicon glyphicon-floppy-save"></span> <?php //_t("Save"); ?></th>                                                                      
        </tr>
    </thead>
    <tfoot>
        <tr>         
            <th><?php _t("Id"); ?></th>
            <th><?php _t("Budget"); ?></th>
            <th><?php _t("Credit note"); ?></th>
            <th><?php _t("Date"); ?></th>                    
            <th><?php _t("Client"); ?></th>                    
            <th class="text-right"><?php _t("Total"); ?></th>
            <th class="text-right"><?php _t("Advance"); ?></th>
            <th class="text-right"><?php _t("Solde"); ?></th>                                        
            <th><?php _t("Reminders"); ?></th>
            <th><?php _t("Estatus"); ?></th>                    
            <th><?php _t("Details"); ?></th>                    
            <?php if (permissions_has_permission($u_rol, "invoices", "update")) { ?><th><?php _t("Edit"); ?></th><?php } ?>                  
            <th><span class="glyphicon glyphicon-print"></span> <?php //_t("Print"); ?></th>   
            <th><span class="glyphicon glyphicon-floppy-save"></span> <?php //_t("Save"); ?></th>   
        </tr>
    </tfoot>
    <tbody>
        <?php
        if (!isset($invoices)) {
            message("info", "No items");
        } else {
            //foreach ($liste_info as $address) {
            
            $month = null; 
            $month_actual = null; 
            
            foreach ($invoices as $invoice) {                                                
                $r1 = ($invoice['r1']) ? "<span class=\"glyphicon glyphicon-thumbs-down\"></span>" : "";
                $r2 = ($invoice['r2']) ? "<span class=\"glyphicon glyphicon-thumbs-down\"></span>" : "";
                $r3 = ($invoice['r3']) ? "<span class=\"glyphicon glyphicon-thumbs-down\"></span>" : "";
                $type = ($invoice['type'] == "M" ) ? "M" : "";

                $class = ( $invoice['type'] == "M" ) ? "warning" : "";

                // lista de budgets by invoices
                $budgets_by_invoice = budgets_invoices_list_budgets_by_invoice_id($invoice['id']);

                switch (count($budgets_by_invoice)) {

                    case 0:
                        $from_budget = "";
                        break;

                    case 1:
                        $from_budget = '<a href="index.php?c=budgets&a=details&id=' . $budgets_by_invoice[0]['id'] . '">' . $budgets_by_invoice[0]['id'] . '</a>';
                        break;

                    default:
                        $from_budget = "+1";
                        break;
                }
                
                // si no hay fecha, cojemos la fecha de registro 
                $date = ($invoice['date'])?$invoice['date']:$invoice['date_registre']; 
                
                $month_actual = magia_dates_get_month_from_date($date);              
                ?>
                <?php if($month_actual != $month){                                         
                    $month = $month_actual; 
                    ?>            
                    <tr>
                        <td colspan="14"><b>
                            <?php echo _tr(magia_dates_month($month_actual)); ?></b></td>
                    </tr>
                <?php } ?>

                <tr class="<?php echo $class; ?>">                                                                                
                    <td>
                        <?php echo invoices_numberf($invoice['id']); ?>
                        <?php // echo $type ; ?>
                    </td>
                    
                    <td><?php echo $from_budget; ?></td>
                    <td><?php echo "$invoice[credit_note_id]"; ?></td>
                    <td><?php echo "$invoice[date]"; ?></td>
                    <td>
                        <a href="index.php?c=contacts&a=details&id=<?php echo "$invoice[client_id]"; ?>">
                            <?php echo contacts_formated($invoice['client_id']); ?>
                        </a>
                        
                        <p><?php echo $invoice['title']; ?></p>
                        
                    </td>
                    <td class="text-right"><?php echo moneda($invoice['total'] + $invoice['tax']); ?></td>
                    <td class="text-right"><?php echo moneda($invoice['advance']); ?></td>
                    <td class="text-right"><?php echo moneda($invoice['total'] + $invoice['tax'] - $invoice['advance']); ?></td>
                    
                    <td><?php echo "$r1 $r2 $r3"; ?></td>
                    
                    <td><?php echo _t(invoice_status_by_status($invoice['status'])); ?></td>

                    
                    
                    <td>                     
                        <a class="btn btn-sm btn-primary" href="index.php?c=invoices&a=details&id=<?php echo "$invoice[id]"; ?>">
                            <span class="glyphicon glyphicon-file"></span> <?php _t("Details"); ?>
                        </a>
                    </td>
                    
                    
                        <?php if (permissions_has_permission($u_rol, "invoices", "update")) { ?>
                        <td>                     
                            <a 
                                class="btn btn-sm btn-danger" 
                                href="index.php?c=invoices&a=edit&id=<?php echo "$invoice[id]"; ?>"
                                <?php echo ( ! invoices_can_be_edit($invoice["id"]))? " disabled " : "" ; ?>
                                >
                                <span class="glyphicon glyphicon-edit"></span> <?php _t("Edit"); ?>
                            </a>
                        </td>
                    <?php } ?>


                        
                        
                    <td>                     
                        <a class="btn btn-sm btn-default " href="index.php?c=invoices&a=export_pdf&id=<?php echo "$invoice[id]"; ?>" target="print">
                            <span class="glyphicon glyphicon-print"></span> <?php //_t("Print"); ?>
                        </a>
                    </td>
                    
                    

                    <td>                     
                        <a class="btn btn-sm btn-default" href="index.php?c=invoices&a=export_pdf&way=pdf&id=<?php echo "$invoice[id]"; ?>" target="print">
                            <span class="glyphicon glyphicon-floppy-save"></span> <?php //_t("Save"); ?>
                        </a>
                    </td>
                    
                    
                    
                </tr>
                <?php
                 
            }
        }
        ?>	
    </tbody>
</table>

<p><?php echo _t("M = Monthly"); ?></p>
