
<table class="table table-striped">
    <thead>
        <tr>         
            <th><?php _t("Invoice") ; ?></th>
            <th><?php _t("Budget") ; ?></th>
            <th><?php _t("Credit note") ; ?></th>
            <th><?php _t("Date registre") ; ?></th>                    
            <th><?php _t("Cliente") ; ?></th>                    
            <th class="text-right"><?php _t("Total") ; ?></th>
            <th class="text-right"><?php _t("Advance") ; ?></th>
            <th class="text-right"><?php _t("Solde") ; ?></th>                                        
            <th><?php _t("Reminders") ; ?></th>
            <th><?php _t("Status") ; ?></th>                    
            <th><?php _t("Details") ; ?></th>                                                                      
            <th><?php _t("Edit") ; ?></th>                                                                      
            <th><?php _t("Print") ; ?></th>                                                                     
        </tr>
    </thead>
    <tfoot>
        <tr>         
            <th><?php _t("Invoice") ; ?></th>
            <th><?php _t("Budget") ; ?></th>
            <th><?php _t("Credit note") ; ?></th>
            <th><?php _t("Date registre") ; ?></th>                    
            <th><?php _t("Cliente") ; ?></th>                    
            <th class="text-right"><?php _t("Total") ; ?></th>
            <th class="text-right"><?php _t("Advance") ; ?></th>
            <th class="text-right"><?php _t("Solde") ; ?></th>                                        
            <th><?php _t("Reminders") ; ?></th>
            <th><?php _t("Status") ; ?></th>                    
            <th><?php _t("Details") ; ?></th>                                                                      
            <th><?php _t("Edit") ; ?></th>                                                                      
            <th><?php _t("Print") ; ?></th>                                                                      
        </tr>
    </tfoot>    
    <tbody>
        <?php
        foreach ( invoices_search_by_client_id($id) as $invoices_search_by_client_id ) {


            $r1 = ($invoices_search_by_client_id['r1']) ? "<span class=\"glyphicon glyphicon-thumbs-down\"></span>" : "" ;
            $r2 = ($invoices_search_by_client_id['r2']) ? "<span class=\"glyphicon glyphicon-thumbs-down\"></span>" : "" ;
            $r3 = ($invoices_search_by_client_id['r3']) ? "<span class=\"glyphicon glyphicon-thumbs-down\"></span>" : "" ;
            ?>


            <tr>
                <td><?php echo invoices_numberf($invoices_search_by_client_id['id']) ; ?></td>
                <td><a href="index.php?c=budgets&a=details&id=<?php echo "$invoices_search_by_client_id[budget_id]" ; ?>"><?php echo "$invoices_search_by_client_id[budget_id]" ; ?></a></td>
                <td><?php echo "$invoices_search_by_client_id[credit_note_id]" ; ?></td>
                <td><?php echo "$invoices_search_by_client_id[date_registre]" ; ?></td>
                <td><a href="index.php?c=contacts&a=details&id=<?php echo "$invoices_search_by_client_id[client_id]" ; ?>"><?php echo contacts_formated($invoices_search_by_client_id['client_id']) ; ?></a></td>
                <td class="text-right"><?php echo monedaf($invoices_search_by_client_id['total'] + $invoices_search_by_client_id['tax']) ; ?></td>
                <td class="text-right"><?php echo monedaf($invoices_search_by_client_id['advance']) ; ?></td>
                <td class="text-right"><?php echo monedaf($invoices_search_by_client_id['total'] + $invoices_search_by_client_id['tax'] - $invoices_search_by_client_id['advance']) ; ?></td>


                <td><?php echo "$r1 $r2 $r3" ; ?></td>

                <td><?php echo invoice_status_by_status($invoices_search_by_client_id['status']) ; ?></td>
                <td>                     
                        <a class="btn btn-md btn-primary" href="index.php?c=invoices&a=details&id=<?php echo "$invoices_search_by_client_id[id]" ; ?>">
                            <span class="glyphicon glyphicon-file"></span> <?php _t("Details") ; ?>
                        </a>
                    </td>
                    <td>                     
                        <a class="btn btn-md btn-danger" href="index.php?c=invoices&a=edit&id=<?php echo "$invoices_search_by_client_id[id]" ; ?>">
                            <span class="glyphicon glyphicon-edit"></span> <?php _t("Edit") ; ?>
                        </a>
                    </td>
                    <td>                     
                        <a class="btn btn-md btn-default" href="index.php?c=invoices&a=export_pdf&id=<?php echo "$invoices_search_by_client_id[id]" ; ?>" target="print">
                            <span class="glyphicon glyphicon-print"></span> <?php _t("Print") ; ?>
                        </a>
                    </td>
                
              
                    
            </tr>




        <?php } ?>
    </tbody>  
</table>