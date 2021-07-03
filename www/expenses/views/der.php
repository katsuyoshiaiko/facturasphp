<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title"><?php _t("Expenses") ; ?> </h3>
    </div>
    <div class="panel-body">
        <table class="table table-striped">
            <tr>
                <td><?php _t("Expense number") ; ?></td><td><?php expenses_numberf($id); ?></td>
            </tr>

            <tr>
                <td><?php _t("Date") ; ?></td><td><?php echo expenses_field_id("date_registre" , $id) ; ?></td>
            </tr>

            <tr>
                <td>
                    <?php _t("Status") ; ?></td><td><?php echo expense_status_by_status(expenses_field_id("status" , $id)) ; ?>
                    <?php //echo $expenses['status'] ; ?>
                </td>
            </tr>

          <?php 
          /*  <tr>
                <td><?php _t("Budget") ; ?></td>
                <td>
                    <a href="index.php?c=budgets&a=details&id=<?php echo expenses_field_id("budget_id" , $id) ; ?>">
                        <?php echo expenses_field_id("budget_id" , $id) ; ?>
                    </a>
                </td>
            </tr>

            <tr>
                <td><?php _t("Credit note") ; ?></td><td>
                    <a href="index.php?c=credit_notes&a=details&id=<?php echo $expenses['credit_note_id'] ; ?>">
                        <?php echo expenses_field_id("credit_note_id" , $id) ; ?>
                    </a>
                </td>
            </tr>
           * <tr>
                <td><?php _t("Seller") ; ?></td><td><?php echo contacts_formated(expenses_field_id("seller_id" , $id)) ; ?></td>
            </tr>
*/
          ?>
            

            <tr>
                <td>
                    <?php _t("Client") ; ?>
                </td>                
                <td>
                    <a href="index.php?c=contacts&a=details&id=<?php echo $expenses['client_id'] ; ?>">
                        <?php echo contacts_formated(expenses_field_id("client_id" , $id)) ; ?>
                    </a>
                </td>                    
            </tr>





        </table>
    </div>
</div>



<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title"><?php _t("Me in this company") ; ?> </h3>
    </div>
    <div class="panel-body">
        <table class="table table-striped">
            <tr>
                <td><?php _t("Client number") ; ?></td><td>524136</td>
            </tr>

            <tr>
                <td><?php _t("Reductions") ; ?></td><td><?php echo expenses_field_id("date_registre" , $id) ; ?></td>
            </tr>

            <tr>
                <td>
                    <?php _t("Last expense") ; ?></td><td>20201-01-2021
                    <?php //echo $expenses['status'] ; ?>
                </td>
            </tr>

            

            <tr>
                <td>
                    <?php _t("Last payement") ; ?>
                </td>                
                <td>
                    <a href="index.php?c=contacts&a=details&id=<?php echo $expenses['client_id'] ; ?>">
                        <?php moneda(250.60);?> 2020-101-21
                    </a>
                </td>                    
            </tr>





        </table>
    </div>
</div>








<?php
//vardump($expenses['status']);

switch ( $expenses['status'] ) {
    case 10:
    case 20:
       // include "der_part_reminders.php" ;
        include "der_part_payement_list.php" ;
        include "der_part_registre_payement.php" ;
        include "der_part_cancel.php" ;
       // include "der_part_send_by_email.php"; 
        break ;

    case 30:
        //include "der_part_reminders.php"; 
        include "der_part_payement_list.php" ;
        include "der_part_cancel.php" ;
        break ;

    case -10:
        
        include "der_part_payement_list.php" ;
        
        break ;

    case -20:
        
        include "der_part_payement_list.php" ;
        
        break ;

    default:
//        include "der_part_registre_file.php"; 
        break ;
}

include "der_part_registre_file.php"; 


?>



