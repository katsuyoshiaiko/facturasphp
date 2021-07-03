<?php include view("home" , "header") ; ?>  
<div class="row">
    <div class="col-lg-3">
        <?php include view("stats" , "izq") ; ?>
    </div>
    <div class="col-lg-9">
        <?php include view("stats" , "nav") ; ?>







        <form class="form-horizontal">
            
            
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label"><?php _t("Date")?></label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" id="inputEmail3" placeholder="Email">
                </div>
            </div>
            
            
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label"><?php _t("Client"); ?></label>
                <div class="col-sm-10">
                    <select class="form-control" name="client_id" id="client_id">
                        <option><?php _t("All"); ?></option>
                    </select>
                </div>
            </div>
            
            
            
            
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox"> Remember me
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-default">Sign in</button>
                </div>
            </div>
        </form>








    </div>
</div>
<?php include view("home" , "footer") ; ?> 

