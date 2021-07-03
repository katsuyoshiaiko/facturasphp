<table class="table table-striped">
    <thead>
        <tr>
            <th><?php _t("#"); ?></th>
            <th><?php _t("Id"); ?></th>
            <th><?php _t("Contact_id"); ?></th>
            <th><?php _t("Bank"); ?></th>
            <th><?php _t("Account_number"); ?></th>

            <th><?php _t("Bic"); ?></th>
            <th><?php _t("Iban"); ?></th>
            <th><?php _t("Status"); ?></th>
            <th class="text-right"><?php _t("Solde"); ?></th>

            <th><?php _t("Action"); ?></th>                  

        </tr>
    </thead>
    <tfoot>
        <tr>
            <th><?php _t("#"); ?></th>
            <th><?php _t("Id"); ?></th>
            <th><?php _t("Contact_id"); ?></th>
            <th><?php _t("Bank"); ?></th>
            <th><?php _t("Account_number"); ?></th>

            <th><?php _t("Bic"); ?></th>
            <th><?php _t("Iban"); ?></th>
            <th><?php _t("Status"); ?></th>
            <th class="text-right"><?php _t("Solde"); ?></th>

            <th><?php _t("Action"); ?></th>                  

        </tr>
    </tfoot>
    <tbody>
        <tr>
            <?php
            if (!$banks) {
                message("info", "No items");
            }

            $i = 1;
            foreach ($banks as $bank) {
                ?>




            <tr id="<?php echo "$bank[id]"; ?>"> 
                <td><?php echo "$i"; ?></td>
                <td><?php echo "$bank[id]"; ?></td>
                <td><?php echo contacts_formated($bank['contact_id']); ?></td>
                <td><?php echo "$bank[bank]"; ?></td>
                <td><?php echo "$bank[account_number]"; ?></td>

                <td><?php echo "$bank[bic]"; ?></td>
                <td><?php echo "$bank[iban]"; ?></td>


                <td><?php echo "$bank[status]"; ?></td>

                <td class="text-right">
    <?php echo monedaf(balance_total_by_account_number($bank['account_number'])); ?>
                </td>






                <td>
                    <div class="dropdown">
                        <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
    <?php _t("Action"); ?>
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                            <li><a href="index.php?c=banks&a=details&id=<?php echo "$bank[id]"; ?>"><?php _t("Details") ?></a></li>
                            <li><a href="index.php?c=banks&a=edit&id=<?php echo "$bank[id]"; ?>"><?php _t("Edit") ?></a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="index.php?c=banks&a=delete&id=<?php echo "$bank[id]"; ?>"><?php _t("Delete") ?></a></li>
                        </ul>
                    </div>
                </td>                           
            </tr>                            
    <?php $i++;
}
?>	
        </tr>
    </tbody>

</table>


