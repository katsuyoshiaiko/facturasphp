<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="magia">
    <input type="hidden" name="a" value="edit">
    <input type="hidden" name="id" value="<?php echo "$id"; ?>">



    <?php
    
    
    foreach (magia_db_list_campos_by_table($table) as $key => $tmp_value) {
       
        // generar camo segun 
        // tabla, campo, viewpage
        //
    }
    ?>



    <div class="form-group">
        <label class="control-label col-sm-2" for=""></label>
        <div class="col-sm-8">    
            <input class="btn btn-primary active" type ="submit" value ="<?php _t("Edit"); ?>">
        </div>      							
    </div>      							

</form>

