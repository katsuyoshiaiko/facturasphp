<?php 
//  vardump($invoice_json);
vardump($invoice_json);
?>


<?php 
foreach ($invoice as $key => $value) {
    if(!  is_numeric($key) ){
        echo "\$invoice_json['$key'] = \$invoice['$key'];<br>"; 
        
        if($key == 'addresses_billing' || $key == 'addresses_delivery'){
          //  echo "\$invoice_json['$key'] = '----';<br>"; 
        }else{
          //  echo "\$invoice_json['$key'] = \$invoice['$key'];<br>"; 
        }
        
        
    }
}
?>

