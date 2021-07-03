<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="_diccionario">
    <input type="hidden" name="a" value="edit">
    <input type="hidden" name="id" value="<?php echo "$id"; ?>">
    


    <?php # id ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Id"); ?></label>
        <div class="col-sm-8">                    
            <input type="id" name="id" class="form-control"  id="id" placeholder="id" value="<?php echo "$_diccionario[id]"; ?>" disabled="" >
        </div>	
    </div>
<?php # id ?>

<?php # content ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Content"); ?></label>
        <div class="col-sm-8">                    
            <input type="content" name="content" class="form-control"  id="content" placeholder="content" value="<?php echo "$_diccionario[content]"; ?>" disabled="" >
        </div>	
    </div>
<?php # content ?>

<?php # language ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Language"); ?></label>
        <div class="col-sm-8">                    
            <input type="language" name="language" class="form-control"  id="language" placeholder="language" value="<?php echo "$_diccionario[language]"; ?>" disabled="" >
        </div>	
    </div>
<?php # language ?>

<?php # translation ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Translation"); ?></label>
        <div class="col-sm-8">                    
            <input type="translation" name="translation" class="form-control"  id="translation" placeholder="translation" value="<?php echo "$_diccionario[translation]"; ?>" disabled="" >
        </div>	
    </div>
<?php # translation ?>

<?php # order_by ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Order_by"); ?></label>
        <div class="col-sm-8">                    
            <input type="order_by" name="order_by" class="form-control"  id="order_by" placeholder="order_by" value="<?php echo "$_diccionario[order_by]"; ?>" disabled="" >
        </div>	
    </div>
<?php # order_by ?>

<?php # status ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Status"); ?></label>
        <div class="col-sm-8">                    
            <input type="status" name="status" class="form-control"  id="status" placeholder="status" value="<?php echo "$_diccionario[status]"; ?>" disabled="" >
        </div>	
    </div>
<?php # status ?>





    <div class="form-group">
        <label class="control-label col-sm-2" for=""></label>
        <div class="col-sm-8">    
            <input class="btn btn-primary active" type ="submit" value ="<?php _t("Edit"); ?>">
        </div>      							
    </div>      							

</form>

