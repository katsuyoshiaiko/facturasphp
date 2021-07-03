<table class="table table-striped">
            <thead>
                <tr>
                    <th><?php _t("date"); ?></th>
                    <th><?php _t("Price"); ?></th>
                    <th><?php _t("Status"); ?></th>
                </tr>
            </thead>
            <tbody>


                <?php
                foreach (comments_list_by_contact_id($id) as $value) {
                    echo " <tr>                                            
                      <td>$value[date]</td>
                      <td>$value[comment]</td>
                      
                  </tr>";
                }
                ?>


            </tbody>  
        </table>