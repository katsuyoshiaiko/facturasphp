<form action="index.php" method="get">
    <input type="hidden" name="c" value="expenses">
    <input type="hidden" name="a" value="search">
    <input type="hidden" name="w" value="byClient">


    <div class="form-group">
        <label for="client_id"><?php _t("Providers") ; ?></label>
        <select class="form-control selectpicker" data-live-search="true" name="client_id">
            <?php //foreach ( contacts_list_by_type(1) as $key => $contacts_list ) { ?>
            
            <?php foreach ( providers_list() as $key => $headoffice ) { ?>
                
            <optgroup label="<?php echo contacts_formated($headoffice['id']) ; ?>">                    
                    <?php foreach ( contacts_list_according_company_and_type($headoffice['id'] , 1) as $key => $contacts_list ) { ?>                        
                        <option 
                            value="<?php echo "$contacts_list[id]" ; ?>"
                            >
                                <?php echo $contacts_list['id'] . ",  " . contacts_formated($contacts_list['id']) ; ?>
                        </option>                        
                    <?php } ?>                    
                </optgroup>                    
            <?php } ?>
        </select>
    </div>








    <div class="form-group">
        <label for="status"><?php _t("Status") ; ?></label>
        <select class="form-control selectpicker" data-live-search="true" name="status">     
            <option value="all"><?php _t("All"); ?></option>
            <?php foreach ( expense_status_list_e() as $key => $expense_status ) { 
               // $selected = ($expense_status[code] == 30)? " selected ":"";
                ?>
                <option 
                    value="<?php echo "$expense_status[code]" ; ?>" <?php echo $selected; ?>>
                        <?php echo _t($expense_status['status']) ; ?>
                </option>
            <?php } ?>
        </select>
    </div>



    <div class="form-group">
        <label for="status"><?php _t("Year") ; ?></label>
        <select class="form-control selectpicker" data-live-search="true" name="year">            
            <option value="all"><?php _t("All"); ?></option>
            <?php
            for ( $i = budgets_get_year_1_budget() ; $i <= date("Y") ; $i ++ ) {
                $selected = ($i == date("Y") ) ? " selected " : "" ;
                ?>
                <option value="<?php echo $i ; ?>" <?php echo $selected ; ?>><?php echo $i ; ?></option>
            <?php } ?>
        </select>
    </div>



    <div class="form-group">
        <label for="status"><?php _t("Month") ; ?></label>
        <select class="form-control selectpicker" data-live-search="true" name="month">            
            <option value="all"><?php _t("All"); ?></option>
            <?php
            for ( $i = 1 ; $i <= 12 ; $i ++ ) {
                $selected = ($i == date("n") ) ? " selected " : "" ;
                ?>
                <option value="<?php echo $i ; ?>" <?php echo $selected ; ?>><?php echo $i ; ?> <?php echo _t(magia_dates_month($i)) ; ?></option>
            <?php } ?>
        </select>
    </div>



    <div class="form-group">
        <label for="status"><?php _t("Type") ; ?>?</label>
        <div class="checkbox">
            <label>
                <input type="checkbox" name="monthly"> <?php _t("Monthly only"); ?>
            </label>
        </div>
    </div>



    <button type="submit" class="btn btn-default"><?php _t("Search") ; ?></button>
</form>