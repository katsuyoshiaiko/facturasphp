
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title"><a name="reminders"></a><?php _t("Reminders") ; ?></h3>
    </div>
    <div class="panel-body">
        <table class="table table-striped">
            <tr>
                <td>
                    <span class="glyphicon glyphicon-send"></span>

                    <?php _t("1st reminder") ; ?>
                </td>

                <td>
                    <a href="index.php?c=expenses&a=export_pdf_r1&id=<?php echo $id; ?>"><span class="glyphicon glyphicon-print"></span></a>
                    <?php
                    // expenses_modal_reminder_send('10' , $id) ;
                    $r = 1 ;
                    if ( expenses_field_id("r1" , $id) == "" ) {
                        include "modal_reminder_send.php" ;
                    } else {
                        echo '<a href="index.php?c=expenses&a=pdf"><span class="glyphicon glyphicon-print"></span></a> ' ;
                        echo expenses_field_id("r1" , $id) ;
                    }
                    ?>
                </td>

            </tr>
            <tr>
                <td>
                    <span class="glyphicon glyphicon-send"></span>

                    <?php _t("2nd reminder") ; ?>
                </td>
                <td>
                    <a href="index.php?c=expenses&a=pdf"><span class="glyphicon glyphicon-print"></span></a>
                    <?php
                    //  expenses_modal_reminder_send('2' , $id) ;

                    $r = 2 ;
                    if ( expenses_field_id("r2" , $id) == "" ) {
                        include "modal_reminder_send.php" ;
                    } else {
                        echo '<a href="index.php?c=expenses&a=pdf"><span class="glyphicon glyphicon-print"></span></a> ' ;
                        echo expenses_field_id("r2" , $id) ;
                    }
                    ?>

                </td>
            </tr>
            <tr>
                <td>
                    <span class="glyphicon glyphicon-send"></span>


                    <?php _t("Appointment with lawyer") ; ?></td>
                <td>
                    <a href="index.php?c=expenses&a=pdf"><span class="glyphicon glyphicon-print"></span></a>
                        <?php
                        //   expenses_modal_reminder_send('3' , $id) ;

                        $r = 3 ;
                        if ( expenses_field_id("r3" , $id) == "" ) {
                            include "modal_reminder_send.php" ;
                        } else {
                            echo '<a href="index.php?c=expenses&a=pdf"><span class="glyphicon glyphicon-print"></span></a> ' ;
                            echo expenses_field_id("r3" , $id) ;
                        }
                        ?>

                </td>
            </tr>
        </table>

    </div>
</div>
