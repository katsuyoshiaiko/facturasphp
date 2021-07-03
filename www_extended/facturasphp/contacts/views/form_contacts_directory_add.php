<form action="index.php" method="post">
    <input type="hidden" name="c" value="contacts">
    <input type="hidden" name="a" value="ok_directory_add">
    <input type="hidden" name="contact_id" value="<?php echo $id ; ?>">
    <input type="hidden" name="redi" value="1">
    


    <div class="form-group">
        <label for="name"><?php _t("Type") ; ?></label>
        <select class="form-control" name="name">
            <?php
            $i = 0 ;
            foreach ( directory_names_list() as $key => $value ) {
                if ( ! in_array($value['name'] , array_column(directory_list_by_contact_id($id) , 'name')) ) {

                    // si es headoffice    
                    if( strtolower($value['name']) == 'tva' && ! contacts_is_headoffice($id) ) {
                        echo '<option value="' . $value['name'] . '" disabled>' . $value['name'] . ' ( '._tr('Only headoffice').' )</option>' ;
                    }else{
                        echo '<option value="' . $value['name'] . '">' . $value['name'] . '</option>' ;
                    }
                }
                $i ++ ;
            }
            ?>                                                                                                
        </select>
    </div>

    <div class="form-group">
        <label for="data"><?php _t("Data") ; ?></label>
        <input type="text" name="data" class="form-control" id="data" placeholder="">
    </div>

    <button type="submit" class="btn btn-default"><?php _t("Add") ; ?></button>
</form>
