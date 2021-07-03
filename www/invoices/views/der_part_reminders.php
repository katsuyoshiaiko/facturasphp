<div class="panel panel-default">
    <div class="panel-heading">
        <span class="glyphicon glyphicon-thumbs-down"></span>
        <?php _t("Reminders"); ?>
    </div>
  <div class="panel-body">
    

                <table class="table table-striped">



                    <tr>
                        <td>
                            <span class="glyphicon glyphicon-thumbs-down"></span>

                            <?php _t("1st reminder"); ?>
                        </td>

                        <td>
                            <a href="index.php?c=invoices&a=export_pdf_r1&way=web&id=<?php echo $id; ?>" target="print">
                                <span class="glyphicon glyphicon-print"></span>
                            </a> 
                            <?php
                            // invoices_modal_reminder_send('10' , $id) ;
                            $r = 1;
                            if (invoices_field_id("r1", $id) == "") {
                                include "modal_r1_send.php";
                            } else {
                                // echo '<a href="index.php?c=invoices&a=pdf"><span class="glyphicon glyphicon-print"></span></a> ' ;
                                //echo '<span class="glyphicon glyphicon-thumbs-down"></span> '; 
                                echo invoices_field_id("r1", $id);
                            }
                            ?>
                        </td>

                    </tr>
                    <tr>
                        <td>
                            <span class="glyphicon glyphicon-thumbs-down"></span>
                            <span class="glyphicon glyphicon-thumbs-down"></span>

                            <?php _t("2nd reminder"); ?>
                        </td>

                        <td>
                            <a href="index.php?c=invoices&a=export_pdf_r2&way=web&id=<?php echo $id; ?>" target="print">
                                <span class="glyphicon glyphicon-print"></span>
                            </a> 
                            <?php
                            // invoices_modal_reminder_send('10' , $id) ;
                            $r = 2;
                            if (invoices_field_id("r2", $id) == "" && invoices_field_id("r1", $id)) {
                                include "modal_r2_send.php";
                            } else {
                                // echo '<a href="index.php?c=invoices&a=pdf"><span class="glyphicon glyphicon-print"></span></a> ' ;
                                //echo '<span class="glyphicon glyphicon-thumbs-down"></span> ';
                                echo invoices_field_id("r2", $id);
                            }
                            ?>
                        </td>
                    </tr>




                    <tr>
                        <td>
                            <span class="glyphicon glyphicon-thumbs-down"></span>
                            <span class="glyphicon glyphicon-thumbs-down"></span>
                            <span class="glyphicon glyphicon-thumbs-down"></span>
                            <?php _t("Appointment with lawyer"); ?>
                        </td>

                        <td>
                            <a href="index.php?c=invoices&a=export_pdf_r3&way=web&id=<?php echo $id; ?>" target="print">
                                <span class="glyphicon glyphicon-print"></span>
                            </a> 
                            <?php
                            // invoices_modal_reminder_send('10' , $id) ;
                            $r = 3;
                            if (invoices_field_id("r3", $id) == "" && invoices_field_id("r2", $id)) {
                                include "modal_r3_send.php";
                            } else {
                                // echo '<a href="index.php?c=invoices&a=pdf"><span class="glyphicon glyphicon-print"></span></a> ' ;
                                //echo '<span class="glyphicon glyphicon-thumbs-down"></span> ';
                                echo invoices_field_id("r3", $id);
                            }
                            ?>
                        </td>
                    </tr>
                </table>



  </div>
</div>







