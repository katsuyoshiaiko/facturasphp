<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-lg-3">
        <?php // include view("contacts", "izq"); ?>
    </div>

    <div class="col-lg-12">
       <?php //include view("contacts", "nav"); ?>


        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>



<?php 
// https://api.jquery.com/prop/
?>

<h1>Import</h1>


<a href="index.php?c=contacts&a=import_address">import_address</a> | 
<a href="index.php?c=contacts&a=import_directory">import_directory</a> | 
<a href="index.php?c=contacts&a=import_email">Email</a> | 
<a href="index.php?c=contacts&a=import_invoices">Invoices</a> | 
<a href="index.php?c=contacts&a=import_invoice">Invoice</a> | 
<a href="index.php?c=contacts&a=import_notasc">notas c</a> | 
<a href="index.php?c=contacts&a=import_notac">nota</a> | 

<table class="table table-bordered">
    <thead>
        <tr>
            <th>id</th>
            <th>contact_id</th>
            <th>name</th>
            <th>address</th>
            <th>number</th>
            <th>postcode</th>
            <th>barrio</th>
            <th>city</th>
            <th>region</th>
            <th>country</th>
            <th>code</th>
            <th>Status</th>
        </tr>
    </thead>

    <tbody>

        <?php




        $fp = fopen("tmp/syb/clientes.csv", "r");

        while ($data = fgetcsv($fp, 999999, ",", '"')) {
            $num = count($data);
            
            
            
            $id = $data[0];
            $owner_id = "1022";
            
            $type = ($data[5] && $data[5] != 'NULL')?"1":"";            
            
            $title = $data[1];
            $name = $data[2];
            $lastname = $data[2];
            $birthdate = "1900-01-01";
            
            $tva  = ($type == 1)? $data[4] . $data[5] : ""; 
            
            
            
            
            
            
            $address = $data[8];
            $number_array = explode(' ', $data[8]);
            
            foreach ($number_array as $key) {
                //$number = ( is_numeric(($key))     || preg_match("/([^0-9\s])/",$key) )?"$key":"";
                $number = ( is_numeric(($key))      )?"$key":"";
            }
            
            
            $postcode = $data[9];
            $barrio = $data[10];
            $city = $data[10];
            $region = null;
            $country = $data[12];
            $code = uniqid();
            $status = 1; 
            $lastname = $data[2];
            $discounts = 0; 
            $code = uniqid(); 
            $order_by = 1; 
            $status = 1; 

            
            
           // print "";
            echo"<tr>"; 
            echo "<td>Null</td>"; //id                        
            echo "<td>". ($id) . "</td>"; //id                        
            echo "<td>Delivery</td>"; //id                        
            echo "<td>". ($number) . "</td>"; //id                        
            echo "<td>". ucfirst(($address)) . "</td>"; //id                        
            echo "<td>". ($postcode) . "</td>"; //id                        
            echo "<td>". ucfirst(strtolower($barrio)) . "</td>"; //id                        
            echo "<td>". ucfirst(strtolower($city)) . "</td>"; //id                        
            echo "<td>". ucfirst($region) . "</td>"; //id                        
            echo "<td>". ucfirst($country) . "</td>"; //id                        
            echo "<td>". ($code) . "</td>"; //id                        
            echo "<td>". ($status) . "</td>"; //id     
            //
            //                   
            //                                      
            //                                                         
            //                                                                            
            //                                                                                                           
//            print 'INSERT INTO `contacts` (`id`, `owner_id`, `type`, `title`, `name`, `lastname`, `birthdate`, `tva`, `discounts`, `code`, `order_by`, `status`) VALUES (NULL, '50723', '0', 'Mr.', 'Rob', 'in son', '1970-01-01', NULL, NULL, '604cc295ss49024', '1', '1'); ';
//            
//            echo 'INSERT INTO `contacts` (`id`, `owner_id`, `type`, `title`, `name`, `lastname`, `birthdate`, `tva`, `discounts`, `code`, `order_by`, `status`) VALUES '
//            . '(NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);'; 
//            
//            

            //                   
            //                                      
            //                                                                            
            //echo "<td>". ($status) . "</td>"; //id                        
//            echo "<td>". ($data[0]) . "</td>"; //id                        
//            echo "<td>". ($data[1]) . "</td>"; 
//            echo "<td>". ($data[2]) . "</td>"; 
//            echo "<td>". ($data[3]) . "</td>"; 
//            echo "<td>". ($data[4]) . "</td>"; 
//            echo "<td>". ($data[5]) . "</td>"; 
//            echo "<td>". ($data[6]) . "</td>"; 
//            echo "<td>". ($data[7]) . "</td>"; 
//            echo "<td>". ($data[8]) . "</td>"; 
//            echo "<td>". ($data[9]) . "</td>"; 
//            echo "<td>". ($data[10]) . "</td>"; 
//            echo "<td>". ($data[11]) . "</td>"; 
//            echo "<td>". ($data[12]) . "</td>"; 
//            echo "<td>". ($data[13]) . "</td>"; 
//            echo "<td>". ($data[14]) . "</td>"; 
//            echo "<td>". ($data[15]) . "</td>"; 
//            echo "<td>". ($data[16]) . "</td>"; 
//            echo "<td>". ($data[17]) . "</td>"; 
//            echo "<td>". ($data[18]) . "</td>"; 
//            echo "<td>". ($data[19]) . "</td>"; 
//            echo "<td>". ($data[20]) . "</td>"; 
//            echo "<td>". ($data[21]) . "</td>"; 
//            echo "<td>". ($data[22]) . "</td>"; 
//            echo "<td>". ($data[23]) . "</td>"; 
//            echo "<td>". ($data[24]) . "</td>"; 
//            echo "<td>". ($data[25]) . "</td>"; 
//            echo "<td>". ($data[26]) . "</td>"; 
            
            
            
//            for($i=0; $i< $num; $i++){
//                echo "<td>". ($data[$i]) . "</td>"; 
//            }
//            
            
            
            echo '</tr>';

            
            
            
        }


            
            echo "    </tbody>


</table>"; 
            

            //        
                                echo""; 
            echo "". ($id) . ", "; //id                        
            echo "". ($id) . ", "; //id                        
            echo " 'Delivery',"; //id                        
            echo "'". ($number) . "',"; //id                        
            echo "'". ucfirst(($address)) . "',"; //id                        
            echo "'". ($postcode) . "',"; //id                        
            echo "'". ucfirst(strtolower($barrio)) . "',"; //id                        
            echo "'". ucfirst(strtolower($city)) . "',"; //id                        
            echo "'". ucfirst($region) . "',"; //id                        
            echo "'". ucfirst($country) . "',"; //id                        
            echo "'". ($code) . "',"; //id                        
            echo "". ($status) . "',"; //id  
            echo ""; 
        
        fclose ($fp);
        ?>




<?php
/*        
        Export:
        <a href="index.php?c=addresses&a=export_json">JSON</a>
        <a href="index.php?c=addresses&a=export_pdf">pdf</a>
*/
?>


    </div>
</div>

<?php include view("home", "footer"); ?> 

