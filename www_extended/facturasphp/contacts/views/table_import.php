<h1>Import</h1>


<table class="table table-bordered">
    <thead>
        <tr>
            <th>id</th>
            <th>owner_id</th>
            <th>type</th>
            <th>title</th>
            <th>name</th>
            <th>lastname</th>
            <th>birthdate</th>
            <th>tva</th>
            <th>discounts</th>
            <th>code</th>
            <th>order_by</th>
            <th>status</th>
        </tr>
    </thead>

    <tbody>

        <?php
        $linea = 0;
//Abrimos nuestro archivo
        $archivo = fopen("c.csv", "r");
//Lo recorremos
        while (($datos = fgetcsv($archivo, ",")) == true) {
            $num = count($datos);
            $linea++;
            //Recorremos las columnas de esa linea
            for ($columna = 0; $columna < $num; $columna++) {
                //echo "<tr><td>" . $datos[$columna] . "</td></tr>";
            }
        }
//Cerramos el archivo
        fclose($archivo);




        $fp = fopen("tmp/clientes.csv", "r");

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
            $discounts = 0; 
            $code = uniqid(); 
            $order_by = 1; 
            $status = 1; 

            
            
            print "";
            echo"<tr>"; 
            echo "<td>". ($id) . "</td>"; //id                        
            echo "<td>". ($owner_id) . "</td>"; //id                        
            echo "<td>". ($type) . "</td>"; //id                        
            echo "<td>". ($title) . "</td>"; //id                        
            echo "<td>". ($name) . "</td>"; //id                        
            echo "<td>". ($lastname) . "</td>"; //id                        
            echo "<td>". ($birthdate) . "</td>"; //id                        
            echo "<td>". ($tva) . "</td>"; //id                        
            echo "<td>". ($discounts) . "</td>"; //id                        
            echo "<td>". ($code) . "</td>"; //id                        
            echo "<td>". ($order_by) . "</td>"; //id                        
            echo "<td>". ($status) . "</td>"; //id                        
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
        
        fclose ($fp);
        ?>
    </tbody>


</table>