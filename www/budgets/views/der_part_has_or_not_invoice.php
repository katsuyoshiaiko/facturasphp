<?php

/**
<h3>Aceptado y no factura</h3>
crear una factura <br>
crear una factura pacial<br>
Listo para ser agregado a la afactura mensual <br>
 *  * si tiene 100% facturado 
 * -- lista de facturas
 * 
 * < 100% 
 * -- lista de facturas
 * -- agregar otra factura
 * 
 * 
 * 0% 
 * -- escojer si parcial 
 * -- o individual
 * 
 * 
 * 
 * 0
 * > 0 && <100
 * 
 * 100
 */
$invoiced = budgets_invoices_search_invoice_by_budget_id($id); 

if ( $invoiced == 0 ) {
    // no se ha facturado nada
   // echo "es cero" ;
    include "der_part_create_invoice.php";   
    include "der_part_change_status.php"; 

    
    
} elseif ( $invoiced > 0 && $invoiced < 100 ) {
    // tiene facturas parciales
   // echo "esta entre 1 y 99 " ;
 //   include "der_part_invoices_related.php"; 
    include "der_part_create_partial_invoice.php";
  //  include "der_part_change_status.php"; 
} else {
    // 100% facturado
   // echo "es 100 o mas" ;
  //  include "der_part_invoices_related.php"; 
}
?>

<?php
//include "der_part_change_status.php"; 
//include "der_part_create_1_invoice.php" ;
//include "der_part_create_partial_invoice.php" ;
?>