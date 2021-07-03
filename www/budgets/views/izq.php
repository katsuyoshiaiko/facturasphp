<?php 
/*
<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top" , "budgets") ; ?>
        <?php echo _t("Budgets") ; ?>
    </a>
    <a href="index.php?c=budgets" class="list-group-item"><?php _t("List") ; ?></a>

</div>

*/
?>



<div class="panel panel-primary">
    <div class="panel-heading">
        <?php _menu_icon("top" , "budgets") ; ?>
        <?php echo _t("Search") ; ?>
    </div>
    <div class="panel-body">
        <?php include "form_search_by_all.php" ; ?>
    </div>
</div>


<?php 
/*<div class="panel panel-primary">
    <div class="panel-heading">
        <?php _menu_icon("top" , "budgets") ; ?>
        <?php echo _t("Search") ; ?>
    </div>
    <div class="panel-body">
        <?php //include "form_search_by_office.php" ; ?>
    </div>
</div>*/
?>






<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top" , "budgets") ; ?>
        <?php echo _t("Budgets") ; ?>
    </a>
    <a href="index.php?c=budgets" class="list-group-item"><?php _t("All") ; ?></a>
    <?php foreach ( budget_status_list_extended() as $budget_status_list_extended ) { ?>
        <a href="index.php?c=budgets&a=search&w=byCode&code=<?php echo $budget_status_list_extended['code'] ?>" class="list-group-item"><?php _t($budget_status_list_extended['status']) ; ?> 
            <span class="badge"><?php echo (budgets_total_by_status($budget_status_list_extended['code'])) ? budgets_total_by_status($budget_status_list_extended['code']) : "" ; ?></span>
        </a>
    <?php } ?>
</div>



<?php
/*

  <div class="panel panel-primary">
  <div class="panel-heading">
  <span class="glyphicon glyphicon-search"></span>
  <?php echo _t("Search") ; ?>
  </div>
  <div class="panel-body">
  <?php include "form_search.php" ; ?>
  </div>
  </div>
 */
?>