<form class="form-horizontal" method="post">

    <input type="hidden" name="c" value="expenses">
    <input type="hidden" name="a" value="ok_cancel">
    <input type="hidden" name="id" value="<?php echo "$id" ; ?>">


    <div class="form-group">
        <label for="id" class="col-sm-2 control-label"><?php _t("Expense") ; ?></label>
        <div class="col-sm-10">
            <p><?php echo $id ; ?></p>
        </div>
    </div>


    <div class="form-group">
        <label for="description" class="col-sm-2 control-label"><?php _t("Reason") ; ?></label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="description" id="description" placeholder="<?php _t("Reason for the cancellation") ; ?>">
        </div>
    </div>

    <?php
    // vardump(balance_list_by_expense($id)); 

    if ( balance_list_by_expense($id) ) {
        ?>                  

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <div class="checkbox">
                    <label>
                        <input 
                            type="checkbox" 
                            name="create_credit_note" 
                            checked=""
                            disabled=""> <?php _t("Create credit note for") ; ?>: 

                        <b><?php echo monedaf((expenses_field_id("advance" , $id))) ; ?></b>


                    </label>
                </div>
            </div>
        </div>
<?php } else { ?>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <div class="checkbox" >
                    <label>
                        <input 
                            type="checkbox"                              
                            name="create_credit_note"
                            disabled=""
                            > <?php _t("No payments have been registered, NO credit note will be created") ; ?>
                    </label>
                </div>
            </div>
        </div>
<?php } ?>

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default"><?php _t("Ok, cancel payement") ; ?></button>
        </div>
    </div>

</form>