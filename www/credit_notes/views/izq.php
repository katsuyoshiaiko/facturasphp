
<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top" , "credit_notes") ; ?>
        <?php echo _t("Credit notes") ; ?>
    </a>
    <a href="index.php?c=credit_notes" class="list-group-item"><?php _t("List") ; ?></a>

</div>




<?php 
/*



<div class="panel panel-primary">
    <div class="panel-heading">
        <?php _menu_icon("top" , "credit_notes") ; ?>
        <?php echo _t("Search") ; ?>
    </div>
    <div class="panel-body">
        <?php //include "form_search_by_office.php" ; ?>
    </div>
</div>
*/
?>


<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top" , "credit_notes") ; ?>
        <?php echo _t("Credit notes") ; ?>
    </a>
    <a href="index.php?c=credit_notes" class="list-group-item"><?php _t("All") ; ?></a>
    <?php foreach (credit_notes_status_list() as $credit_note_status_list_extended ) { ?>
        <a href="index.php?c=credit_notes&a=search&w=byStatus&status=<?php echo $credit_note_status_list_extended['code'] ?>" class="list-group-item"><?php _t($credit_note_status_list_extended['status']) ; ?> 
            <span class="badge"><?php echo (credit_notes_total_by_status($credit_note_status_list_extended['code'])) ? credit_notes_total_by_status($credit_note_status_list_extended['code']) : "" ; ?></span>
        </a>
    <?php } ?>
</div>



