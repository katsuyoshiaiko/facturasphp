
<table class="table table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th><?php _t("Role") ; ?></th>
            <th><?php _t("Controllers") ; ?></th>
            <th><?php _t("Create") ; ?></th>
            <th><?php _t("Read") ; ?></th>
            <th><?php _t("Update") ; ?></th>
            <th><?php _t("Delete") ; ?></th>            
        </tr>
    </thead>
    <tfoot>
         <tr>
            <th>#</th>
            <th><?php _t("Role") ; ?></th>
            <th><?php _t("Controllers") ; ?></th>
            <th><?php _t("Create") ; ?></th>
            <th><?php _t("Read") ; ?></th>
            <th><?php _t("Update") ; ?></th>
            <th><?php _t("Delete") ; ?></th>            
        </tr>
        </thead>
    <tbody>
        <?php            
        $i=1; 
        foreach ( permissions_search_by_rol(users_field_contact_id("rol", $id)) as $key => $value ) {?>
            <tr>                                            
                <td><?php echo $i++;  ?></td>
                <td><?php echo $value['rol'];  ?></td>
                <td><a href="index.php?c=<?php echo ($value['controller']) ; ?>"><?php  echo ($value['controller']) ; ?></a></td>
                
                <td><?php echo ($value['crud'][0])?"Yes":"-" ; ?></td>
                <td><?php echo ($value['crud'][1])?"Yes":"-" ; ?></td>
                <td><?php echo ($value['crud'][2])?"Yes":"-" ; ?></td>
                <td><?php echo ($value['crud'][3])?"Yes":"-" ; ?></td>                                                                                                        
            </tr>
        <?php $i++; } ?>
    </tbody>  
</table>