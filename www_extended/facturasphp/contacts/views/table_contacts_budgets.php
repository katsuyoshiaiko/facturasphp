
<table class="table table-striped">
    <thead>
        <tr>         
            <?php # <th><input type="checkbox"></th>?>
            <th><?php _t("Id") ; ?></th>
            <th><?php _t("Invoice") ; ?></th>                                                            
            <th><?php _t("Date_registre") ; ?></th>                    
            <th><?php _t("Cliente_id") ; ?></th>                    
            <th class="text-right"><?php _t("Total") ; ?></th>                                                            
            <th><?php _t("Status") ; ?></th>                    
            <th><?php _t("Details") ; ?></th>                                                                      
            <th><?php _t("Edit") ; ?></th>                                                                      
            <th><?php _t("Print") ; ?></th>                                                                      
        </tr>
    </thead>
    <tfoot>
        <tr>         

            <th><?php _t("Id") ; ?></th>
            <th><?php _t("Invoice") ; ?></th>                                                            
            <th><?php _t("Date_registre") ; ?></th>                    
            <th><?php _t("Cliente_id") ; ?></th>                    
            <th class="text-right"><?php _t("Total") ; ?></th>                                                            
            <th><?php _t("Status") ; ?></th>                    
            <th><?php _t("Details") ; ?></th>                                                                      
            <th><?php _t("Edit") ; ?></th>                                                                      
            <th><?php _t("Print") ; ?></th>                                                                                                                                 
        </tr>
    </tfoot>
    <tbody>

        <?php
        if ( ! isset($budgets) ) {
            message("info" , "No items") ;
        } else {
            //foreach ($liste_info as $address) {
            foreach ( $budgets as $budget ) {
                ?>
                <tr>

                    <td><?php echo "$budget[id]" ; ?></td>

                    <td><a href="index.php?c=invoices&a=details&id=<?php echo "$budget[invoice_id]" ; ?>"><?php echo "$budget[invoice_id]" ; ?></a></td>                            
                    <td><?php echo "$budget[date_registre]" ; ?></td>
                    
                    <td>
                        <a 
                            href="index.php?c=contacts&a=details&id=<?php echo $budget['client_id'] ; ?>">
                                <?php echo contacts_formated($budget['client_id']) ; ?>
                        </a>
                    </td>
                    
                    <td class="text-right"><?php echo monedaf($budget['total'] + $budget['tax']) ; ?></td>
                    
                    <td><?php echo budget_status_by_status($budget['status']) ; ?></td>

                    
                    <td>
                        <a class="btn btn-primary" href="index.php?c=budgets&a=details&id=<?php echo "$budget[id]" ; ?>">
                            <span class="glyphicon glyphicon-file"></span>
                            <?php _t("Details") ; ?></a>                        
                    </td>
                    
                    <td>
                        <a class="btn btn-danger" href="index.php?c=budgets&a=edit&id=<?php echo "$budget[id]" ; ?>">
                            <span class="glyphicon glyphicon-edit"></span>
                            <?php _t("Edit") ; ?></a>                        
                    </td>
                    
                    
                    <td>
                        <a class="btn btn-default" href="index.php?c=budgets&a=export_pdf&id=<?php echo "$budget[id]" ; ?>">
                            <span class="glyphicon glyphicon-print"></span>
                            <?php _t("Print") ; ?></a>                      
                    </td>
                    
<?php 
/*                    
                    <td>
                        <div class="dropdown">
                            <button 
                                class="btn btn-default dropdown-toggle" 
                                type="button" 
                                id="dropdownMenu1" 
                                data-toggle="dropdown" 
                                aria-haspopup="true" 
                                aria-expanded="true">
                                
                                <?php _t("Actions") ; ?>
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                <li><a href="index.php?c=budgets&a=details&id=<?php echo "$budget[id]" ; ?>"><?php _t("Details") ; ?></a></li>
                                <li><a href="index.php?c=budgets&a=edit&id=<?php echo "$budget[id]" ; ?>"><?php _t("Edit") ; ?></a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="index.php?c=budgets&a=edit&id=<?php echo "$budget[id]" ; ?>"><?php _t("Pdf") ; ?></a></li>
                            </ul>
                        </div>
                    </td>
*/
?>


                </tr>

                <?php
            }
        }
        ?>	

    </tbody>


</table>


