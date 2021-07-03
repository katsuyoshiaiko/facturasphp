<?php include view("contacts" , "page_header") ; ?>  

<?php include view("contacts" , "nav_offices") ; ?>       


<?php

$owner_id = contacts_field_id("owner_id" , $id) ;



if ( $id == $owner_id ) {
    include "table_contacts_offices.php" ;
} else {
    _t("This office belongs to") ;
    echo " : " ;
    echo '<a href="index.php?&c=contacts&a=details&id=' . $owner_id . '">' ;
    echo contacts_formated($owner_id) ;
    echo '</a>' ;
}
?>



<?php include view("contacts" , "page_footer") ; ?>  

