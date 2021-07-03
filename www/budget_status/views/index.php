<?php include view("home" , "header") ; ?>  

<div class="row">
    <div class="col-lg-3">
        <?php include view("budget_status" , "izq") ; ?>
    </div>

    <div class="col-lg-9">
        <?php include view("budget_status" , "nav") ; ?>


        <?php
        if ( $_REQUEST ) {
            foreach ( $error as $key => $value ) {
                message("info" , "$value") ;
            }
        }
        ?>


        <table class="table table-striped">
            <thead>
                <tr>
                    <th><?php _t("Id") ; ?></th>
                    <th><?php _t("Code") ; ?></th>
                    <th><?php _t("Status") ; ?></th>
                    <th><?php _t("Action") ; ?></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php
                    if ( ! $budget_status ) {
                        message("info" , "No items") ;
                    }


                    //foreach ($liste_info as $address) {
                    foreach ( $budget_status as $budget_status ) {


                        $menu = '<div class="dropdown">
                            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                              Actions
                              <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                              <li><a href="index.php?c=budget_status&a=details&id=' . $budget_status["id"] . '">' . _tr("Details") . '</a></li>
                              <li><a href="index.php?c=budget_status&a=edit&id=' . $budget_status["id"] . '">' . _tr("Edit") . '</a></li>
                              <li role="separator" class="divider"></li>
                              <li><a href="index.php?c=budget_status&a=delete&id=' . $budget_status["id"] . '">' . _tr("Delete") . '</a></li>
                            </ul>
                          </div>' ;
                        //   $photo = addresses_photos_principal($address["id"]);
                        //   $contact_name = contacts_field_id("name", $budget_status["contact_id"]);
                        //   $contact_lastname = contacts_field_id("lastname", $budget_status["contact_id"]);
                        echo "<tr id=\"$budget_status[id]\">" ;
                        echo "<td>$budget_status[id]</td>" ;
                        echo "<td>$budget_status[code]</td>" ;
                        echo "<td>$budget_status[status]</td>" ;

                        echo "<td>$menu</td>" ;

                        echo "</tr>" ;
                    }
                    ?>	
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <th><?php _t("Id") ; ?></th>
                    <th><?php _t("Code") ; ?></th>
                    <th><?php _t("Status") ; ?></th>

                    <th><?php _t("Action") ; ?></th>                                                                      
                </tr>
            </tfoot>
        </table>




<?php
/*
  Export:
  <a href="index.php?c=addresses&a=export_json">JSON</a>
  <a href="index.php?c=addresses&a=export_pdf">pdf</a>
 */
?>


    </div>
</div>

<?php include view("home" , "footer") ; ?> 

