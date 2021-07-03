<?php 
//vardump(stats_contacts_by_type()); 
?>

<table class="table table-striped">
    <thead>
        <tr>         
            <th><?php _t("#") ; ?></th>
            <th><?php _t("City") ; ?></th>
            <th><?php _t("Total") ; ?></th>                        
        </tr>
    </thead>
 
    <tbody>
       <?php 
       $i=1; 
       $total_general = 0; 
              
       foreach ( $stats as $key => $value ) {
           $total_general = $total_general + $value['total'];            
           
        ?>
        <tr>
           <tr>         
            <td><?php echo $i ?></td>
            <td><?php echo $value['city']; ?></td>
            <td><?php echo $value['total']; ?></td>                                               
        </tr>
        <?php 
       $i++;      
       }
       
       ?>                
    </tbody>  

    <tr>
        <td></td>
        <td><?php _t("Total general"); ?></td>
        <td><?php echo $total_general; ?></td>
    </tr>
    
        
    
</table>

1 empresas<br>
0 otros