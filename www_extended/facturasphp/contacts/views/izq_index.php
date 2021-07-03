<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">
            <span class="glyphicon glyphicon-user"></span> 
            <?php echo contacts_formated($id) ?>
        </h3>
    </div>
    <div class="panel-body">

        <form class="form-horizontal" action ="index.php" method ="get" >

            <input type="hidden" name="c" value="contacts">
            <input type="hidden" name="a" value="edit">
            <input type="hidden" name="id" value="<?php echo $contact['id'] ?>">





            <div class="form-group">
                <label class="control-label col-sm-2" for="name"><?php _t("Id") ; ?></label>	
                <div class="col-sm-8">    		
                    <input  disabled="" class="form-control" type ="text " name ="type" id="type" value="<?php echo ($contact['id']) ?>"/>
                </div>
            </div>	


            <div class="form-group">
                <label class="control-label col-sm-2" for="name"><?php _t("Type") ; ?></label>	
                <div class="col-sm-8">    		
                    <input  disabled="" class="form-control" type ="text " name ="type" id="type" value="<?php echo contacts_type($contact['type']) ?>"/>
                </div>
            </div>	

        
            

            <div class="form-group">
                <label class="control-label col-sm-2" for="name"><?php _t("Name") ; ?></label>	
                <div class="col-sm-8">    		
                    <input  disabled="" class="form-control" type ="text " name ="name" id="name"value="<?php echo "$contact[name]" ; ?>"/>
                </div>
            </div>	

        
            
            <div class="form-group">
                <label class="control-label col-sm-2" for="name"><?php _t("Status") ; ?></label>	
                <div class="col-sm-8">    		
                    <input  disabled="" class="form-control" type ="text " name ="status" id="status" value="<?php echo contacts_status($contact['status']) ; ?>"/>
                </div>
            </div>	

            <div class="form-group">
                <label class="control-label col-sm-2" for="name"><?php //_t("") ; ?></label>	
                <div class="col-sm-8">    		
                    <input class="btn btn-primary active" type ="submit" value ="<?php _t("Edit") ; ?>">
                </div>
            </div>	


        </form>


    </div>
</div>


