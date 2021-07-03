
<table class="table table-striped">
    <thead>
        <tr>
            <th><?php _t("Id"); ?></th>
            <th><?php _t("Name"); ?></th>
            <th><?php _t("Lastname"); ?></th>           
            <th><?php _t("Employee"); ?></th>            
            <th><?php _t("rol"); ?></th>            
            <th><?php _t("Action"); ?></th>            
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th><?php _t("Id"); ?></th>
            <th><?php _t("Name"); ?></th>
            <th><?php _t("Lastname"); ?></th>  
            <th><?php _t("Employee"); ?></th>            
            <th><?php _t("Rol"); ?></th>            
            <th><?php _t("Action"); ?></th>            
        </tr>
    </tfoot>
    <tbody>
        <?php
        foreach (contacts_list_according_company($id)as $contacts_list_according_company) {





            $is_employee = (employees_by_company_contact($id, $contacts_list_according_company['id'])) ? employees_by_company_contact($id, $contacts_list_according_company['id'])[0]['cargo'] : false;




            $is_rol = (users_according_contact_id($contacts_list_according_company['id'])) ? "yes" : "-";
            ?>                     
            <?php if ($contacts_list_according_company['type'] == 0) { ?>
                <tr>                                            
                    <td><?php echo $contacts_list_according_company['id']; ?></td>
                    <td><?php echo $contacts_list_according_company['name']; ?></td>
                    <td><?php echo $contacts_list_according_company['lastname']; ?></td>







                    <td>

                        <?php
                        if ($is_employee) {
                            echo ($is_employee);
                        } else {
                            ?>

                            <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#myModal<?php echo $contacts_list_according_company['id']; ?>">
                                <?php _t("Add like employee"); ?>
                            </button>


                            <div class="modal fade" id="myModal<?php echo $contacts_list_according_company['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel">
                                                <?php echo contacts_formated($contacts_list_according_company['id']); ?>
                                            </h4>
                                        </div>
                                        <div class="modal-body">
                                            <?php include "form_add_like_employees.php"; ?>
                                        </div>


                                    </div>
                                </div>
                            </div>
                        <?php } ?></td>                          


                    <td><?php echo $is_rol; ?></td>                          
                    <td>
                        <a 
                            class="btn btn-sm btn-default" 
                            href="index.php?c=contacts&a=details&id=<?php echo $contacts_list_according_company['id']; ?>">
                                <?php _t("Details"); ?>
                        </a>
                    </td>
                </tr>
            <?php } ?>

        <?php } ?>
    </tbody>  
</table>



