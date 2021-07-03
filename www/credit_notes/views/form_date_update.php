<form class="form-inline" method="post">
    <input type="hidden" name="c" value="credit_notes">
    <input type="hidden" name="a" value="ok_date_update">
    <input type="hidden" name="id" value="<?php echo $credit_notes['id']; ?>">
    <input type="hidden" name="redi" value="1">
    
    
    <?php /*https://jqueryui.com/datepicker/#dropdown-month-year*/?>
        <script>
        $(function () {
            $("#date").datepicker({
                // minDate: +0,
                // maxDate: "+12M +0D",
                dateFormat: "yy-mm-dd",
                changeMonth: true,
                changeYear: true,
                showButtonPanel: true

            });
        });
    </script> 
    
  <div class="form-group">
    <label 
        class="sr-only" 
        for="date">
        <?php _t("Date"); ?>
    </label>
    <input 
        type="text" 
        class="form-control" 
        id="date"
        name="date"
        placeholder=""
        value="<?php echo $credit_notes['date']; ?>"
        required=""
        readonly=""
        >
  </div>
    
  <button 
      type="submit" 
      class="btn btn-primary">
      <?php _t("Change"); ?>
  </button>
</form>