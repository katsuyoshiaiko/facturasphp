<nav class="navbar navbar-default">
    <div class="container-fluid">

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

            <form class="navbar-form navbar-right">
                <input type="hidden" name="c" value="invoices"> 
                <input type="hidden" name="a" value="details"> 
                <input type="hidden" name="id" value="<?php echo "$id"; ?>"> 
                <div class="form-group">
                </div>
                <button type="submit" class="btn btn-danger btn-md">
                    <span class="glyphicon glyphicon-floppy-disk"></span> 
                    <?php _t("Save invoice"); ?>
                </button>
            </form>

        </div>
    </div>
</nav>


<div class="row">

    <div class="col-sm-12 col-md-3 col-lg-3">
        <?php include "part_details_company.php"; ?>
    </div>
    
    <div class="col-sm-12 col-md-3 col-lg-3">
        <?php include "part_details_dates.php"; ?>
    </div>

    <div class="col-sm-12 col-md-3 col-lg-3">
        <?php include "part_details_billing_address.php"; ?>
    </div>

    <div class="col-sm-12 col-md-3 col-lg-3">
        <?php include "part_details_delivery_address.php"; ?>
    </div>



</div>



<?php
if (contacts_field_id('discounts', invoices_field_id("client_id", $id))) {
    message('info', "This customer has a registered default discount");
}
?>


<div class="panel panel-default">
    <div class="panel-heading">

        <a name="items"><?php _t("items"); ?></a>

    </div>
    <div class="panel-body">



            
            <?php
            switch ($invoices['type']) {
                case "I": // individual     
                    echo '<table class="table table-striped" >'; 
                    include "tabla_items_edit.php";
                    include "table_transport.php";
                    include "table_form_items_add_individual.php";
                    include "part_tva.php";
                    echo "</table>"; 
                    break;

                case "M": // Mensual
                    echo '<table class="table table-striped"  >'; 
                //    include "tabla_items_monthly_edit.php";
                //    include "table_transport_montly.php";
                    echo "</table>"; 
                    
                    include "table_form_items_monthly.php";
                   // include "part_tva.php";
                    
                    break;

                default:
                    
                    include "part_items_add.php";
                    break;
            }
            ?>






        <a name="items_add"></a>

    </div>
</div>









<div class="panel panel-default">
    <div class="panel-heading"><?php _t("Comments"); ?></div>
    <div class="panel-body">
        <p><?php echo $invoices['comments']; ?></p>



        <?php
        if ($invoices['comments']) {
            //Editar
            echo '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_form_comments_update">
    <span class="glyphicon glyphicon-edit"></span> ' . _tr("Edit comments") . '
</button>';
            include "modal_form_comments_update.php";
        } else {
            // Agregar
            echo '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_form_comments_update">
    <span class="glyphicon glyphicon-plus"></span> ' . _tr("Add comments") . '
</button>';
            include "modal_form_comments_update.php";
        }
        ?>
    </div>
</div>

<nav class="navbar navbar-default">
    <div class="container-fluid">

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

            <form class="navbar-form navbar-right">
                <input type="hidden" name="c" value="invoices"> 
                <input type="hidden" name="a" value="details"> 
                <input type="hidden" name="id" value="<?php echo "$id"; ?>"> 
                <div class="form-group">
                </div>
                <button type="submit" class="btn btn-danger btn-md">
                    <span class="glyphicon glyphicon-floppy-disk"></span> 
                    <?php _t("Save invoice"); ?>
                </button>
            </form>

        </div>
    </div>
</nav>


