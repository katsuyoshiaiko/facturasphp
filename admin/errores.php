<?php

function mostrar_valores($v = array()){
    echo "<table border>"; 
    $i = 0; 
    foreach ($v as $key => $value) {                
        echo "<t><td>1</td><td>$key</td><td>$value</td><td></td></tr>"; 
        $i++; 
    }
  
    
    
    
}