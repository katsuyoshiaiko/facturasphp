<?php
//$id = (isset($params['id'])) ? $params['id'] : $id;
//
//$date = (isset($params['date'])) ?
//        $params['date'] :
//        substr(magia_dates_add_day($params['date'], _options_option('config_invoices_expiration_days')), 0, 10)
//;
//$date = substr(magia_dates_add_day($invoices['date'], _options_option('config_invoices_expiration_days')), 0, 10);

//
//// magia_dates_add_day($params['date'], _options_option('config_invoices_expiration_days'))
?>


<form action="index.php" method="post" class="form-inline">
    <input type="hidden" name="c" value="invoices"> 
    <input type="hidden" name="a" value="ok_date_expiration_update"> 
    <input type="hidden" name="invoice_id" value="<?php echo "$id"; ?>"> 
    <input type="hidden" name="redi" value="1"> 


<?php # date   ?>
    <script>
        $(function () {
            $("#date_expiration").datepicker({
                // minDate: +0,
                // maxDate: "+12M +0D",
                dateFormat: "yy-mm-dd"

            });
        });
    </script> 

    <div class="form-group">
        

        <input 
            type="text"  
            name="date_expiration" 
            class="form-control" 
            id="date_expiration" 
            placeholder="<?php _t("Expiration date"); ?>"
            value="<?php echo $invoices['date_expiration']; ?>"
            readonly=""
            >

    </div>
<?php # /date   ?>






    <button type="submit" class="btn btn-primary"><?php _t("Change"); ?></button>


</form>





