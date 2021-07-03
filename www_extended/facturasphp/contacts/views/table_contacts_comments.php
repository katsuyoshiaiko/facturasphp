
<table class="table table-striped">
    <thead>
        <tr>
            <th><?php _t("Date"); ?></th>
            <th><?php _t("Sender"); ?></th>
            <th><?php _t("Doc"); ?></th>
            <th><?php _t("doc_id"); ?></th>
            <th><?php _t("Comment"); ?></th>            
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th><?php _t("Date"); ?></th>
            <th><?php _t("Sender"); ?></th>
            <th><?php _t("Doc"); ?></th>
            <th><?php _t("doc_id"); ?></th>
            <th><?php _t("Comment"); ?></th>            
        </tr>
        </thead>
    <tbody>
        <?php
        // vardump(users_field_contact_id("rol", $id));
        //vardump($id);
        $date_actual = null; 
        $date_day = null;

        $i = 1;
        foreach (comments_search_by_sender_id($id) as $key => $value) {


            $date_day = date_parse_from_format('Y-m-d', $value['date'])['day'];
            $date_month = date_parse_from_format('Y-m-d', $value['date'])['month'];

            ?>
            <tr>                                            

            <?php
            if ($date_day != $date_actual) {
                echo "<tr><td colspan=5><b>" . _tr("Day") . ": $date_day  " . _tr(magia_dates_month($date_month)) . "</b></td></tr>";
            }
            ?>

                <td><?php echo ($value['date']); ?></td>
                <td><?php echo (contacts_formated($value['sender_id'])); ?></td>
                <td><?php echo "<a href=index.php?c=$value[doc]&a=details&id=$value[doc_id]>$value[doc]</a>"; ?></td>
                <td><?php echo ($value['doc_id']); ?></td>
                <td><?php echo ($value['status']) ? $value['comment'] : "<strike>" . $value['comment'] . "</strike>"; ?></td>



            </tr>
    <?php
    
                    
                $date_actual = $date_day; 
                
                
    $i++;
}
?>
    </tbody>  
</table>