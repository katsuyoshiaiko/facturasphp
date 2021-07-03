<?php 
//vardump(stats_contacts_by_type()); 
?>

<table class="table table-striped">
    <thead>
        <tr>         
            <th><?php _t("#") ; ?></th>
            <th><?php _t("Office") ; ?></th>
            <th><?php _t("Total orders") ; ?></th> 
            <th><?php _t("Total remakes") ; ?></th> 
            <th><?php _t("% Total remakes") ; ?></th> 
        </tr>
    </thead>
 
    <tbody>
       <?php 
       $i=1; 
       $total_general_orders = 0; 
       $total_general_remakes = 0; 
              
       foreach ( stats_remakes_by_office($office_id) as $key => $value ) {
           $total_general_orders = $total_general_orders + $value['total_orders'];   
           $total_general_remakes = $total_general_remakes + $value['total_remakes'];   
           
        ?>
        <tr>
           <tr>         
            <td><?php echo $i ?></td>
            <td><?php echo $value['company_id'] ; ?> - <?php echo contacts_formated($value['company_id']) ; ?></td>
            <td><?php echo $value['total_orders']; ?></td> 
            <td><?php echo $value['total_remakes']; ?></td> 
            <td><?php echo number_format( ($value['total_remakes'] * 100 )/ $value['total_orders'] , 2); ?>%</td> 
        </tr>
        <?php 
       $i++;      
       }
       
       ?>                
    </tbody>  

    <tr>
        <td></td>
        <td><?php _t("Total general"); ?></td>
        <td><?php echo $total_general_orders; ?></td>
        <td><?php echo $total_general_remakes; ?></td>
        <td></td>
    </tr>
    
        
    
</table>

