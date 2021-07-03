<nav class="navbar navbar-default">
    <div class="container-fluid">

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

            <form class="navbar-form navbar-right">
                <input type="hidden" name="c" value="expenses"> 
                <input type="hidden" name="a" value="details"> 
                <input type="hidden" name="id" value="<?php echo "$id" ; ?>"> 
                <div class="form-group">
                </div>
                <button type="submit" class="btn btn-danger"><span class="glyphicon glyphicon-floppy-disk"></span> <?php _t("Save") ; ?></button>
            </form>

        </div>
    </div>
</nav>




<div class="row">
    <div class="col-sm-12 col-md-4 col-lg-4">
        <?php include "part_details_company.php" ; ?>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <?php include "part_details_billing_address.php" ; ?>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
        <?php include "part_details_delivery_address.php" ; ?>
    </div>
</div>





<div class="panel panel-default">
    <div class="panel-heading">

        <a name="items"><?php _t("items") ; ?></a>

    </div>
    <div class="panel-body">



        <?php
//                    vardump($expenses['type']); 

        switch ( $expenses['type'] ) {
            case "I": // individual      
                //   echo vardump($expense['type']); 
                //   echo "<h1>Normal**</h1>"; 
                include "part_items_individual.php" ;
                break ;

            case "M": // Mensual
                //  echo vardump($expenses['type']) ;
                //  echo "<h1>Mensual</h1>" ;
                include "part_items_add_monthly.php" ;
                break ;


            default:
                //  echo "<h1>Defecto</h1>" ;
                include "part_items_add.php" ;
                break ;
        }
        ?>






        <table class="table table-striped">

            <?php //include "modal_form_items_add.php" ;  ?>

            <?php # Tax items total ############################################   ?>
            <?php foreach ( tax_list() as $key => $tax ) { ?>                        
                <tr>
                    <td colspan="4"></td>
                    <td colspan="2" class="text-right"><?php
                        _t("Total tax") ;
                        echo " $tax[value] %" ;
                        ?></td>
                    <td colspan="2" class="text-right"><?php echo monedaf(expense_lines_total_by_tax($id , $tax['value'])) ; ?></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            <?php } ?>                    
            <?php # Tax items total ############################################      ?>

            <tr>
                <td colspan="5"></td>
                <td colspan="2" class="text-right" ><?php _t("Advance") ; ?></td>
                <td colspan="2" class="text-right" colspan="2"><?php echo monedaf(expenses_field_id("advance" , $id)) ; ?></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>


            <tr>
                <td colspan="5"></td>
                <td colspan="2" class="text-right"><?php _t("To pay") ; ?></td>                        
                <td colspan="2" class="text-right" colspan="2"><?php echo monedaf($total_totaltvac - expenses_field_id("advance" , $id)) ; ?></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>




        </table>


        <a name="items_add"></a>

    </div>
</div>









<div class="panel panel-default">
    <div class="panel-heading"><?php _t("Communication") ; ?></div>
    <div class="panel-body">
        <?php echo $expenses['ce'] ; ?>
        <?php
        include "modal_form_ce_update.php" ;
        ?>
    </div>
</div>


<div class="panel panel-default">
    <div class="panel-heading"><?php _t("Comments") ; ?></div>
    <div class="panel-body">
        <?php echo $expenses['comments'] ; ?>
        <?php
        include "modal_form_comments_update.php" ;
        ?>
    </div>
</div>


