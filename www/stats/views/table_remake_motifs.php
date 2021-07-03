<?php 
//vardump(stats_contacts_by_type()); 
?>

<table class="table table-striped">
    <thead>
        <tr>         
            <th><?php _t("#") ; ?></th>
            <th><?php _t("Motif") ; ?></th>
            <th><?php _t("Total") ; ?></th> 
        </tr>
    </thead>
 
    <tbody>
       <?php 
       $i=1; 
              
       foreach ( $stats as $key => $value ) {
           
        ?>
        <tr>
           <tr>         
            <td><?php echo $i ?></td>
            <td><?php echo remake_motifs_field_id('motif', $value['motif_id']); ?></td> 
            <td><?php echo $value['total']; ?></td>             
        </tr>
        <?php 
       $i++;      
       }
       
       ?>                
    </tbody>  

    
        
    
</table>

