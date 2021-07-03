<table class="table table-striped">
    <thead>
        <tr>
            <th><?php _t("Id") ; ?></th>            
            <th><?php _t("Date") ; ?></th>  
            <th><?php _t("Who") ; ?></th>  
            <th><?php _t("What did") ; ?></th>
        </tr>
    </thead>
    
    <tbody>
        <tr>
            <?php
            if ( ! $logs ) {
                message("info" , "No items") ;
            }
                $logs_date_actual = null;
                $logs_date_day = null;

            //foreach ($liste_info as $address) {
            foreach ( $logs as $logs ) {


                $menu = '<div class="dropdown">
                            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                              Actions
                              <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                              <li><a href="index.php?c=logs&a=details&id=' . $logs["id"] . '">' . _tr("Details") . '</a></li>
                              <li><a href="index.php?c=logs&a=edit&id=' . $logs["id"] . '">' . _tr("Edit") . '</a></li>
                              <li role="separator" class="divider"></li>
                              <li><a href="index.php?c=logs&a=delete&id=' . $logs["id"] . '">' . _tr("Delete") . '</a></li>
                            </ul>
                          </div>' ;
                

                $logs_date_day = date_parse_from_format('Y-m-d', $logs['date'])['day'];
                $logs_date_month = date_parse_from_format('Y-m-d', $logs['date'])['month'];
                
                
                
                //   $photo = addresses_photos_principal($address["id"]);
                //   $contact_name = contacts_field_id("name", $logs["contact_id"]);
                //   $contact_lastname = contacts_field_id("lastname", $logs["contact_id"]);
                echo "<tr id=\"$logs[id]\">" ;
                
                
                if($logs_date_actual != $logs_date_day){
                    echo "<tr><td colspan=5><b>"._tr("Day").": $logs_date_day  ". _tr(magia_dates_month($logs_date_month))."</b></td></tr>";
                }
                
                

                echo "<td>$logs[id]</td>" ;
                //   echo "<td>$logs[level]</td>" ;
                echo "<td>$logs[date]</td>" ;
                echo "<td>" . contacts_formated($logs['u_id']) . "</td>" ;
                //   echo "<td>$logs[u_rol]</td>" ;
                //   echo "<td>$logs[c]</td>" ;
                //   echo "<td>$logs[a]</td>" ;
                //   echo "<td>$logs[w]</td>" ;
                echo "<td>$logs[description]</td>" ;
                //    echo "<td>$logs[doc_id]</td>" ;
                //   echo "<td>$logs[crud]</td>" ;
                //   echo "<td>$logs[error]</td>" ;
                // echo "<td>$menu</td>" ;

                echo "</tr>" ;
                
                $logs_date_actual = $logs_date_day; 
                
                
                
            }
            ?>	
        </tr>
    </tbody>



</table>