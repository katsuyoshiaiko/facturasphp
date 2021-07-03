<table class="table table-striped">
    <thead>
        <tr>         

            <th><?php _t("Id"); ?></th>
            <th><?php _t("Invoice"); ?></th>               
            <th><?php _t("Date"); ?></th>                    
            <th><?php _t("Client"); ?></th>                    
            <th class="text-right"><?php _t("TVAC"); ?></th>                                                            
            <th><?php _t("Status"); ?></th>                    
            <th><?php _t("Details"); ?></th>                                                                      
            <?php if (permissions_has_permission($u_rol, "budgets", "update")) { ?><th><?php _t("Edit"); ?></th><?php } ?>                                                                              
            <th><span class="glyphicon glyphicon-print"></span> <?php // _t("Print");  ?></th>                                                                                                                                     
            <th><span class="glyphicon glyphicon-floppy-save"></span> <?php //_t("Save");  ?></th>                                                                                                                                     
        </tr>
    </thead>
    <tfoot>
        <tr>         

            <th><?php _t("Id"); ?></th>             
            <th><?php _t("Invoice"); ?></th>               
            <th><?php _t("Date"); ?></th>                    
            <th><?php _t("Cliente"); ?></th>                    
            <th class="text-right"><?php _t("TVAC"); ?></th>                                                            
            <th><?php _t("Status"); ?></th>                    
            <th><?php _t("Details"); ?></th>                                                                      
            <?php if (permissions_has_permission($u_rol, "budgets", "update")) { ?><th><?php _t("Edit"); ?></th><?php } ?>                                                                                 
            <th><span class="glyphicon glyphicon-print"></span> <?php // _t("Print");  ?></th>                                                                      
            <th><span class="glyphicon glyphicon-floppy-save"></span> <?php //_t("Save");  ?></th>                                                                      
        </tr>
    </tfoot>
    <tbody>





        <?php
        if (!isset($budgets)) {
            message("info", "No items");
        } else {
            //foreach ($liste_info as $address) {

            $sumaTotal = 0;
            $sumaTax = 0;
            $month_actual = null;
            $month = null;
            foreach ($budgets as $budget) {

                $sumaTotal = $sumaTotal + $budget['total'];
                $sumaTax = $sumaTax + $budget['tax'];




                $invoice_id = budgets_invoices_search_invoice_by_budget_id($budget['id']);

                $date = ($budget['date']) ? $budget['date'] : $budget['date_registre'];

                $month_actual = magia_dates_get_month_from_date($date);
                ?>
                <?php
                if ($month_actual != $month) {
                    $month = $month_actual;
                    ?>            
                    <tr>
                        <td colspan="14"><b><?php echo _tr(magia_dates_month($month_actual)); ?></b></td>
                    </tr>
        <?php } ?>  


                <tr>




                    <td><a href="index.php?c=budgets&a=details&id=<?php echo "$budget[id]"; ?>"><?php echo "$budget[id]"; ?></a></td>



                    <?php if ($invoice_id) { ?>    
                        <td><a href="index.php?c=invoices&a=details&id=<?php echo "$invoice_id"; ?>"><?php echo invoices_numberf($invoice_id); ?></a></td>
                    <?php } else { ?>
                        <td></td>
        <?php } ?>



                    <td><?php echo "$budget[date]"; ?></td>

                    <td>
                        <a href="index.php?c=contacts&a=details&id=<?php echo $budget['client_id']; ?>">
        <?php echo contacts_formated($budget['client_id']); ?>
                        </a>
                    </td>

                    <td class="text-right"><?php echo monedaf($budget['total'] + $budget['tax']); ?></td>

                    <td><?php echo _tr(budget_status_by_status(($budget['status']))); ?></td>


                    <td>
                        <a class="btn btn-primary btn-sm" href="index.php?c=budgets&a=details&id=<?php echo "$budget[id]"; ?>">
                            <span class="glyphicon glyphicon-file"></span> <?php _t("Details"); ?>
                        </a>
                    </td>

        <?php if (permissions_has_permission($u_rol, "budgets", "update")) { ?>
                        <td>
                            <a 
                                class="btn btn-danger btn-sm" 
            <?php echo (!budgets_can_be_edit($budget['id'])) ? " disabled " : ""; ?>
                                href="index.php?c=budgets&a=edit&id=<?php echo "$budget[id]"; ?>">
                                <span class="glyphicon glyphicon-edit"></span> 
            <?php _t("Edit"); ?>
                            </a>
                        </td>

        <?php } ?>


                    <td>
                        <a class="btn btn-sm btn-default" href="index.php?c=budgets&a=export_pdf&id=<?php echo "$budget[id]"; ?>" target="print"><span class="glyphicon glyphicon-print"></span> <?php //_t("Print");  ?></a>                                                
                    </td> 

                    <td>
                        <a class="btn btn-sm btn-default" href="index.php?c=budgets&a=export_pdf&way=pdf&id=<?php echo "$budget[id]"; ?>" target="print"><span class="glyphicon glyphicon-floppy-save"></span> <?php // _t("Save");  ?></a>
                    </td>










                </tr>

                <?php
            }
        }
        ?>	



    </tbody>


</table>