<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="controllers">
    <input type="hidden" name="a" value="addOk">

<?php # controller ?>
     <div class="form-group">
        <label class="control-label col-sm-2" for="controller"><?php _t("Controller"); ?></label>
        <div class="col-sm-8">
            <input type="text"  name="controller" class="form-control" id="controller" placeholder="">
            <?php /*
         <select  name="controller" class="form-control" id="controller">                                
                <?php //_select("","", array(), array()); ?>                        
         </select>*/?>
       </div>	
    </div>
<?php # /controller ?>

<?php # title ?>
     <div class="form-group">
        <label class="control-label col-sm-2" for="title"><?php _t("Title"); ?></label>
        <div class="col-sm-8">
          <input type="text"  name="title" class="form-control" id="title" placeholder=" - defecto">
       </div>	
    </div>
<?php # /title ?>

<?php # description ?>
     <div class="form-group">
        <label class="control-label col-sm-2" for="description"><?php _t("Description"); ?></label>
        <div class="col-sm-8">
          <input type="text"  name="description" class="form-control" id="description" placeholder=" - defecto">
       </div>	
    </div>
<?php # /description ?>

  
    <div class="form-group">
        <label class="control-label col-sm-2" for=""></label>
        <div class="col-sm-8">    
            <input class="btn btn-primary active" type ="submit" value ="<?php _t("Save"); ?>">
        </div>      							
    </div>      							

</form>
