        <table class="table table-striped">
            <thead>
                <tr>
                    
                    <th><?php _t("Id"); ?></th>            
                    <th><?php _t("Employee Name"); ?></th>            
                    <th><?php _t("Employee Lastname"); ?></th>            
                    <th><?php _t("Position in company"); ?></th>
                    <th><?php _t("Rol"); ?></th>
                    <th><?php _t("Actions"); ?></th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                     <th><?php _t("Id"); ?></th>            
                    <th><?php _t("Employee Name"); ?></th>            
                    <th><?php _t("Employee Lastname"); ?></th>            
                    <th><?php _t("Position in company"); ?></th>
                    <th><?php _t("Rol"); ?></th>
                    <th><?php _t("Actions"); ?></th>
                </tr>
            </tfoot>            
            <?php //include "form_contacts_employees_add_sipmle.php"; ?>                        
            <tbody>
                <?php
                foreach (employees_list_by_company($id) as $employees_list_by_company) {
                    
                    $rol = users_field_contact_id("rol", $employees_list_by_company['contact_id']); 
                    
                    $icon = users_status_icon(users_field_contact_id('status', $employees_list_by_company['contact_id'])); 
  
                    
//                    $lock =  ( users_field_contact_id('status', $employees_list_by_company['contact_id']) == 0 ) 
//                            ? 
//                            '<span class="glyphicon glyphicon-ban-circle"></span> ' . _tr("Bloqued") 
//                            :
//                            "";
                    
                    
                    
                    
                    
                    ?>                 
                    <tr>
                        <td><?php echo ($employees_list_by_company["contact_id"]); ?></td>    
                        <td><?php echo contacts_field_id("name", $employees_list_by_company["contact_id"]); ?></td>    
                        <td><?php echo contacts_field_id("lastname", $employees_list_by_company["contact_id"]); ?></td>   
                        <td><?php echo employees_by_company_contact($employees_list_by_company['company_id'], $employees_list_by_company['contact_id'])[0]['cargo']; ?></td>
                        <td><?php echo ($rol)? "$icon $rol " : "$rol";  ?></td>
                        <td>
                            <a 
                                href="index.php?c=contacts&a=details&id=<?php echo $employees_list_by_company['contact_id']; ?>" 
                                class="btn btn-sm btn-primary">
                                <?php _t("Details"); ?>
                            </a>
                            
                            
                            
                            
                        </td>
            
                    </tr>
                <?php } ?>
            </tbody>  
        </table>