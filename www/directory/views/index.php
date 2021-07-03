<?php include view("home" , "header") ; ?>  

<div class="row">
    <div class="col-lg-3">
        <?php include "izq.php" ; ?>
    </div>

    <div class="col-lg-9">
        <?php include view("directory" , "nav") ; ?>


        <?php
        if ( $_REQUEST ) {
            foreach ( $error as $key => $value ) {
                message("info" , "$value") ;
            }
        }
        ?>



        <?php
// https://api.jquery.com/prop/
        ?>


        <table class="table table-striped">
            <thead>
                <tr>
                    <th><?php _t("Id") ; ?></th>
                     
                    <th><?php _t("Contact") ; ?></th>  
                    <th><?php _t("Type") ; ?></th>
                    <th><?php _t("Data") ; ?></th>
                </tr>
            </thead>

            <tfoot>
                 <tr>
                    <th><?php _t("Id") ; ?></th>
                    
                    <th><?php _t("Contact") ; ?></th>  
                    <th><?php _t("Type") ; ?></th>
                    <th><?php _t("Data") ; ?></th>
                </tr>
            </tfoot>


            <tbody>
                <tr>
                    <?php
                    if ( ! $directory ) {
                        message("info" , "No items") ;
                    }


                    //foreach ($liste_info as $address) {
                    foreach ( $directory as $directory ) {


                        $menu = '<div class="dropdown">
                            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                              Actions
                              <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                              <li><a href="index.php?c=directory&a=details&id=' . $directory["id"] . '">' . _tr("Details") . '</a></li>
                              <li><a href="index.php?c=directory&a=edit&id=' . $directory["id"] . '">' . _tr("Edit") . '</a></li>
                              <li role="separator" class="divider"></li>
                              <li><a href="index.php?c=directory&a=delete&id=' . $directory["id"] . '">' . _tr("Delete") . '</a></li>
                            </ul>
                          </div>' ;


                        //   $photo = addresses_photos_principal($address["id"]);
                        //   $contact_name = contacts_field_id("name", $directory["contact_id"]);
                        //   $contact_lastname = contacts_field_id("lastname", $directory["contact_id"]);
                        echo "<tr id=\"$directory[id]\">" ;
                        echo "<td>$directory[id]</td>" ;
                       // echo "<td><a href=\"index.php?c=contacts&a=details&id=".contacts_field_id("owner_id", $directory['contact_id'])."\">" . contacts_formated(contacts_field_id("owner_id", $directory['contact_id'])) . "</a></td>" ;
                        echo "<td><a href=\"index.php?c=contacts&a=directory&id=$directory[contact_id]\">" . contacts_formated($directory['contact_id']) . "</a></td>" ;
                        //echo "<td>$directory[address_id]</td>" ;
                        echo "<td>$directory[name]</td>" ;
                        echo "<td>$directory[data]</td>" ;
                        //echo "<td>$directory[order_by]</td>" ;
                        //echo "<td>$directory[status]</td>" ;

                       // echo "<td>$menu</td>" ;

                        echo "</tr>" ;
                    }
                    ?>	



                </tr>
            </tbody>

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

