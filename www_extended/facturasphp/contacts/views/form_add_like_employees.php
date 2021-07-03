<form class="form-horizontal"  action ="index.php" method ="post" >

    <input type="hidden" name="c" value="contacts">
    <input type="hidden" name="a" value="ok_contacts_employees_add_cargo">    
    <input type="hidden" name="company_id" value="<?php echo $id; ?>">
    <input type="hidden" name="contact_id" value="<?php echo $contacts_list_according_company['id']; ?>">
    


    
    <div class="form-group">
        <label class="control-label col-sm-5" for="cargo"><?php _t("What position does he hold"); ?></label>        

        <div class="col-sm-7">    
            <input 
                type="text"  
                name="cargo" 
                class="form-control" 
                id="cargo"
                placeholder="Manager"
                required=""
                > 
        </div>
    </div>

    
    <div class="form-group">
        <label class="control-label col-sm-5" for="owner_ref"><?php _t("Reference"); ?></label>        

        <div class="col-sm-7">    
            <input 
                type="text"  
                name="owner_ref" 
                class="form-control" 
                id="owner_ref"
                placeholder="001"
                
                > 
        </div>
    </div>




    <div class="form-group">
        <label class="control-label col-sm-5" for=""></label>
        <div class="col-sm-7">    
            <input class="btn btn-primary active" type ="submit" value ="<?php _t("Save"); ?>">
        </div>      							
    </div>  






</form>


