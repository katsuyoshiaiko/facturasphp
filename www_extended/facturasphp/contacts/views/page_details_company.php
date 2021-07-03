<?php include view("contacts" , "page_header") ; ?>  

<?php include "nav_details_company.php" ; ?>    

<?php  include "form_details_company.php" ; ?>

<?php 
/*<h3><?php _t("Delete"); ?></h3>
Una empresa puede ser elimnada si no tiene nungun error en la siguiente lista

<table class="table tab-content">
    <thead>
        <tr>
            <th>Opcion</th>
            <th>Tiene</th>
            <th>Esperado</th>
            <th></th>
        </tr>
    </thead>
    
    <tbody>
        <tr>
            <td><?php echo _t('Status'); ?></td>
            <td><?php echo (users_field_code('status', users_field_contact_id('status', $id)))  ?></td>
            <td><?php echo  users_status(USER_WAITING) ?></td>
            <td><?php echo ( USER_WAITING === (users_field_contact_id('status', $id)) )? "ok" : '<span class="label label-danger">ERROR</span>';  ?></td>
        </tr>
        
         <tr>
            <td><?php echo _t('Contacts'); ?></td>            
            <td><?php echo count(contacts_list_according_company($id)); ?></td>
            <td>Max 2</td>
            <td><?php echo ( count(contacts_list_according_company($id)) > 1  )? '<span class="label label-danger">ERROR</span>' : "ok" ;  ?></td>
        </tr>
        
        
         <tr>
            <td><?php echo _t('Offices'); ?></td>            
            <td><?php echo count(offices_list_by_headoffice($id)); ?></td>
            <td>Max 1</td>
            <td><?php echo ( count(offices_list_by_headoffice($id)) >0  )? '<span class="label label-danger">ERROR</span>' : "ok" ;  ?></td>
        </tr>
        
         <tr>
            <td><?php echo _t('Address'); ?></td>            
            <td><?php echo count(addresses_list_by_contact_id($id)); ?></td>
            <td>Max 2</td>
            <td><?php echo ( count(addresses_list_by_contact_id($id)) > 2  )? '<span class="label label-danger">ERROR</span>' : "ok" ;  ?></td>
        </tr>
        
        <tr>
            <td><?php echo _t('Patients'); ?></td>            
            <td><?php echo count(patients_list_according_company($id)); ?></td>
            <td>0</td>
            <td><?php echo ( count(patients_list_according_company($id)) >0  )? '<span class="label label-danger">ERROR</span>' : "ok" ;  ?></td>
        </tr>
        
        
        
        
        <tr>
            <td><?php echo _t('Orders'); ?></td>
            <td><?php echo orders_total_by_company_id($id);  ?></td>
            <td>0</td>
            <td><?php echo ( orders_total_by_company_id($id) > 0 )? '<span class="label label-danger">ERROR</span>' : "ok" ;  ?></td>
        </tr>
        
        <tr>
            <td><?php echo _t('Budgets'); ?></td>            
            <td><?php echo count(budgets_search_by_client($id)); ?></td>
            <td>0</td>
            <td><?php echo ( count(budgets_search_by_client($id)) >0  )? '<span class="label label-danger">ERROR</span>' : "ok" ;  ?></td>
        </tr>
        
        
        <tr>
            <td><?php echo _t('Invoices'); ?></td>            
            <td><?php echo count(invoices_search_by_client_id($id)); ?></td>
            <td>0</td>
            <td><?php echo ( count(invoices_search_by_client_id($id)) >0  )? '<span class="label label-danger">ERROR</span>' : "ok" ;  ?></td>
        </tr>
        
       
        
        
    </tbody>
    
</table>
*/
?>

<?php include view("contacts" , "page_footer") ; ?>  

