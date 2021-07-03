<?php include view("home" , "header") ; ?> 

<?php include view("expenses" , "nav_details") ; ?>




<div class="row">
    <div class="col-sm-12 col-md-12 col-lg-12">
        <?php
        if ( $_REQUEST ) {
            foreach ( $error as $key => $value ) {
                message("info" , "$value") ;
            }
        }
        ?>





        <div class="panel panel-default">
            <div class="panel-body">
                <h1><?php _t("Export") ; ?></h1>
            </div>
        </div>


        <div class="panel panel-default">
            <div class="panel-body">




                <form class="form-inline">




                    <div class="form-group">
                        <label class="sr-only" for="exampleInputPassword3">Password</label>
                        <select class="form-control" name="type">
                            <option value="json">JSON</option>
                            <option value="xml">XML</option>
                        </select>
                    </div>


                    <div class="checkbox">
                        <label>
                            <input type="checkbox"> <?php _t("Save file") ; ?>
                        </label>
                    </div>


                    <button type="submit" class="btn btn-default">Sign in</button>
                </form>


                <br>
                <br>
                <br>
                <br>

                
                
                <?php 
                vardump($all);
                    echo "<hr>"; 
                ?>

                <table class="table table-primary" border>
                    <tr>
                        <td>a</td>
                        <td>b</td>                            
                    </tr>    
                    <?php
                    foreach ( $expense as $key => $value ) {
                        echo '<tr>' ;
                        echo '<td>' . $key . '</td>' ;
                        echo '<td>' . $value . '</td>' ;
                        echo '</tr>' ;
                    }
                    ?>
                </table>
                
                <?php 
                
                
                    vardump(contacts_details(50320));
                    echo "<hr>"; 
                
                    
                    
                    vardump(addresses_details(159));
                    echo "<hr>"; 
                
                    
                    
                    vardump($expense); 
                ?>
                
                
                
                 <table class="table table-primary" border>
                    <tr>
                        <td>a</td>
                        <td>b</td>                            
                    </tr>    
                    <?php
                    foreach ( $lineas as $key => $value ) {
                        echo '<tr>' ;
                        echo '<td>' . $key . '</td>' ;
                        echo '<td>' . $value . '</td>' ;
                        echo '</tr>' ;
                    }
                    ?>
                </table>

                
                
                
                <?php 
                    vardump($lineas);
                ?>
                
                
                
                
                
                    <?php
//                
//                foreach ($expense as $key => $value) {
//                    if($key == 22) {
//                        $i=0;
//                        foreach ($value[1] as $k => $v) {
//                            echo "-- $i -- $k - $v<br>";
//                            $i++;
//                        }
//                    } else {
//                        echo "- $key - $value<br>";
//                    }
//                }
                    //  echo vardump($expense);
                    //echo json_encode($expense);
                    ?>




            </div>
        </div>



        <div class="panel panel-default">
            <div class="panel-body">                
                <h3><?php _t("Comments") ; ?>: <?php // echo $expenses['comments'];   ?></h3>
            </div>
        </div>

    </div>
    <div class="col-sm-4 col-md-4 col-lg-4">
<?php // include view("expenses", "der");  ?> 
    </div>
</div>
<?php include view("home" , "footer") ; ?>