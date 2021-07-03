<table class="table table-striped">
    <thead>
        <tr>
            <th><?php _t("Name") ; ?></th>
            <th><?php _t("Data") ; ?></th>
            <th><?php _t("Action") ; ?></th>
        </tr>
    </thead>
    
    <tfoot>
        <tr>
            <th><?php _t("Name") ; ?></th>
            <th><?php _t("Data") ; ?></th>
            <th><?php _t("Action") ; ?></th>
        </tr>
    </tfoot>


    <tbody>
        <?php foreach ( directory_list_by_contact_id($id) as $directory_list_by_contact_id ) { ?>
            <tr>                                            
                <td><?php echo "$directory_list_by_contact_id[name]" ; ?></td>
                <td><?php echo "$directory_list_by_contact_id[data]" ; ?></td>                                                                            
                <td><!-- Button trigger modal -->
                    <?php
                    if ( permissions_has_permission($u_rol , "directory" , "update") ) {
                        include "modal_directory_edit.php" ;
                    }
                    ?>

                </td>                                                             
            </tr>
        <?php } ?>
    </tbody>  
</table>

