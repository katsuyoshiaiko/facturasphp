
<table class="table table-striped">
    <thead>
        <tr>
            <th><?php _t("#") ; ?></th>
            <th><?php _t("Id") ; ?></th>
            <th><?php _t("Office name") ; ?></th>
            <th><?php _t("Status") ; ?></th>
            <th><?php _t("Actions") ; ?></th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th><?php _t("#") ; ?></th>
            <th><?php _t("Id") ; ?></th>
            <th><?php _t("Office name") ; ?></th>
            <th><?php _t("Status") ; ?></th>
            <th><?php _t("Actions") ; ?></th>
        </tr>
    </tfoot>
    <tbody>
        <?php
        
        $i=1; 
        foreach ( $offices as $office ) {
            ?>                   

            <tr>                                            
                <td><?php echo $i ; ?></td>
                <td><?php echo $office['id'] ; ?></td>
                <td>
                    <a href="index.php?c=contacts&a=details&id=<?php echo $office['id'] ; ?>">
                        <?php echo $office['name'] ; ?>
                    </a>
                    <br>
                    <?php if( offices_is_headoffice($office['id']) ){echo _t("Headoffice"); }?>
                    
                </td>
                
                <?php //<td>echo $office['birthdate'] ; </td> ?>
                <td><?php echo offices_status($office['status']); ?></td>
                

                <td>
                    <a 
                        class="btn btn-sm btn-default" 
                        href="index.php?c=contacts&a=details&id=<?php echo $office['id'] ; ?>">
                        <?php _t("Details") ; ?>
                    </a>
                </td>
            </tr>


                        <?php $i++; } ?>
    </tbody>  
</table>
