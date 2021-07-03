<?php

echo "<h4>" . contacts_formated($addresses['contact_id']) . "</h4>";
echo "$addresses[number], $addresses[address]<br>";
echo "$addresses[postcode], $addresses[barrio]<br>";
echo "$addresses[city], " . countries_name($addresses['country']) . "<br>";
echo "<br>";

// Transporte
// si el modulo de transporte esta activo                         
if ($addresses['name'] !== "Billing" && modules_field_module('status', 'transport')) {
    echo _tr('Transport') . ": " . (addresses_transport_search_by_addresses_id($addresses['id']));
} else {
    echo "&nbsp";
}


//echo "$addresses[number], $addresses[address]<br>"; 
?>