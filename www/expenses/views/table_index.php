<table class="table table-striped" border>
    <thead>
        <tr>         
            <th><?php _t("Id") ; ?></th>            
            <th><?php _t("Max payment date") ; ?></th>                    
            <th><?php _t("Client") ; ?></th>                                                 
            <th class="text-right"><?php _t("Total") ; ?></th>
            <th class="text-right"><?php _t("Advance") ; ?></th>
            <th class="text-right"><?php _t("To pay") ; ?></th>                                                    
            <th><?php _t("Status") ; ?></th>                    
            <th><span class="glyphicon glyphicon-file"></span> <?php _t("Details") ; ?></th>                                                                      
            <th><span class="glyphicon glyphicon-edit"></span> <?php _t("Edit") ; ?></th>                                                                      
            <th><span class="glyphicon glyphicon-print"></span> <?php //_t("Print") ; ?></th>                                                                      
        </tr>
    </thead>
    <tfoot>
        <tr>         
            <th><?php _t("Id") ; ?></th>            
            <th><?php _t("Max payment date") ; ?></th>                    
            <th><?php _t("Client") ; ?></th>                                              
            <th class="text-right"><?php _t("Total") ; ?></th>
            <th class="text-right"><?php _t("Advance") ; ?></th>
            <th class="text-right"><?php _t("To pay") ; ?></th>                                                    
            <th><?php _t("Status") ; ?></th>                    
            <th><span class="glyphicon glyphicon-file"></span> <?php _t("Details") ; ?></th>                                                                      
            <th><span class="glyphicon glyphicon-edit"></span> <?php _t("Edit") ; ?></th>                                                                      
            <th><span class="glyphicon glyphicon-print"></span> <?php //_t("Print") ; ?></th>                                                                      
        </tr>
    </tfoot>
    <tbody>
        <?php
        if ( ! isset($expenses) ) {
            message("info" , "No items") ;
        } else {
            //foreach ($liste_info as $address) {
            
            $month_actual = null; 
            $month = null; 
            
            foreach ( $expenses as $expense ) {
                $r1 = ($expense['r1']) ? "<span class=\"glyphicon glyphicon-thumbs-down\"></span>" : "" ;
                $r2 = ($expense['r2']) ? "<span class=\"glyphicon glyphicon-thumbs-down\"></span>" : "" ;
                $r3 = ($expense['r3']) ? "<span class=\"glyphicon glyphicon-thumbs-down\"></span>" : "" ;
                $type = ($expense['type'] == "M" ) ? "M" : "" ;

                $class = ( $expense['type'] == "M" ) ? "warning" : "" ;
                
                $to_pay = $expense['total'] + $expense['tax'] - abs($expense['advance']); 

                // lista de budgets by expenses
               // $budgets_by_expense = budgets_expenses_list_budgets_by_expense_id($expense['id']) ;

//                switch ( count($budgets_by_expense) ) {
//
//                    case 0:
//                        $from_budget = "" ;
//                        break ;
//
//                    case 1:
//                        $from_budget = '<a href="index.php?c=budget&a=details&id=' . $budgets_by_expense[0]['id'] . '">' . $budgets_by_expense[0]['id'] . '</a>' ;
//                        break ;
//
//                    default:
//                        $from_budget = "+1" ;
//                        break ;
//                }
                
                $month_actual = magia_dates_get_month_from_date($expense['date_registre']);              
                ?>
                <?php if($month_actual != $month){                                         
                    $month = $month_actual; 
                    ?>            
                    <tr>
                        <td colspan="14"><b><?php echo _trc(magia_dates_month($month_actual)); ?></b></td>
                    </tr>
                <?php } ?>  
                    
                    

                <tr class="<?php echo $class ; ?>">
                    <td>
                        <?php echo expenses_numberf($expense['id']) ; ?>
                        
                    </td>
                    
                    <?php /* <td><?php //echo $from_budget ; ?></td>
                    <td><?php echo "$expense[credit_note_id]" ; ?></td>
                    
                     * 
                     */ ?>
                    <td><?php echo "$expense[date_registre]" ; ?></td>
                    <td>
                        <a href="index.php?c=contacts&a=details&id=<?php echo "$expense[client_id]" ; ?>">
                            <?php echo contacts_formated($expense['client_id']) ; ?>
                        </a>
                    </td>
                    
                    <td class="text-right"><?php echo moneda($expense['total'] + $expense['tax']) ; ?></td>
                    
                    <td class="text-right"><?php echo moneda($expense['advance']) ; ?></td>
                    <td class="text-right <?php echo ($to_pay)? 'danger' : '' ; ?>">
                        <?php echo moneda(($expense['total'] + $expense['tax']) - abs($expense['advance'])) ; ?>
                    </td>
                    <?php /**<td><?php echo "$r1 $r2 $r3" ; ?></td>*/ ?>
                    <td><?php echo (expense_status_by_status($expense['status'])); ; ?></td>
                    
                    <td>

                        <?php
                        /*                        <div class="dropdown">
                          <button
                          class="btn btn-default dropdown-toggle"
                          type="button"
                          id="dropdownMenu1"
                          data-toggle="dropdown"
                          aria-haspopup="true" aria-expanded="true">
                          <?php _t("Actions") ; ?>
                          <span class="caret"></span>
                          </button>
                          <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                          <li><a href="index.php?c=expenses&a=details&id=<?php echo "$expense[id]" ; ?>"><?php _t("Details") ; ?></a></li>
                          <li><a href="index.php?c=expenses&a=edit&id=<?php echo "$expense[id]" ; ?>"><?php _t("Edit") ; ?></a></li>
                          <li role="separator" class="divider"></li>
                          <li><a href="index.php?c=expenses&a=edit&id=<?php echo "$expense[id]" ; ?>"><?php _t("Pdf") ; ?></a></li>
                          </ul>

                          </div> */
                        ?>
                        <a 
                            class="btn btn-sm btn-primary" 
                            href="index.php?c=expenses&a=details&id=<?php echo "$expense[id]" ; ?>"
                            >
                            <span class="glyphicon glyphicon-file"></span>
                            <?php _t("Details") ; ?>
                        </a>

                    </td>
                    <td>                    
                        <a 
                            class="btn btn-sm btn-danger" 
                            href="index.php?c=expenses&a=edit&id=<?php echo "$expense[id]" ; ?>"
                            >
                            <span class="glyphicon glyphicon-edit"></span>
                                <?php _t("Edit") ; ?>
                        </a>

                    </td>
                    <td>                    
                        <a 
                            class="btn btn-sm btn-default" 
                            href="index.php?c=expenses&a=export_pdf&id=<?php echo "$expense[id]";?>"
                            >
                            <span class="glyphicon glyphicon-print"></span>
                            <?php // _t("Print") ; ?>
                        </a>

                    </td>
                </tr>
                <?php
            }
        }
        ?>	
    </tbody>
</table>

<p><?php echo _t("M = Monthly") ; ?></p>
