<?php 

//vardump(products_get_name_by_code("TYP10")); 

?>
<table class="table table-striped">
    <thead>
        <tr>         
            <th><?php _t("#") ; ?></th>
            <th><?php _t("Quantity") ; ?></th>
            <th><?php _t("Code") ; ?></th>            
            <th><?php _t("Item") ; ?></th>
            <th class="text-right"><?php _t("Sub total") ; ?></th>            
            <th class="text-right"><?php _t("Discount") ; ?></th>            
            <th class="text-right"><?php _t("Total") ; ?></th>                                                                      
        </tr>
    </thead>
 
    <tbody>
       <?php 
       $i=1; 
       $total_price = 0; 
       $total_discounts = 0; 
       $show = true; 
       foreach ( $stat as $key => $value ) {
           $total_price = $total_price + $value['sum_price'];  
           $total_discounts = $total_discounts + $value['discounts']; 

           $code = substr($value['code'], 0, 3);
           
           if( in_array($code, array("TYP") )){
               //$show = false; 
           }
           
           if( $show == true  ){ ?>
        <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $value['quantity']; ?></td>
            <td><?php echo $value['code']; ?></td>
            <td><?php echo products_get_name_by_code($value['code']); ?></td>
            
            <td class="text-right"><?php echo $value['subtotal']; ?></td>
            <td class="text-right"><?php echo $value['price']; ?></td>
            <td class="text-right"><?php echo $value['price']; ?></td>
            
        </tr>
       <?php 
       $i++; 
       $show = true; 
       }
       
      } ?>
        
        
    </tbody>
    <tr>         
            <th></th>
            <th></th>
            <th></th>
            <th></th>            
            <th class="text-right"><?php echo monedaf($total_price) ; ?></th>   
            <th class="text-right"><?php echo monedaf($total_discounts) ; ?></th>  
            <th class="text-right"><?php echo monedaf(0) ; ?></th>  
        </tr>
    
    
    
    
</table>

