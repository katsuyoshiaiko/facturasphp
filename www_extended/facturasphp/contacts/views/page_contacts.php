<?php include view("contacts" , "page_header") ; ?>  

<?php  include view("contacts" , "nav_contacts") ; ?>       


<ul class="nav nav-pills" role="tablist">

    <?php if ( permissions_has_permission($u_rol , "contacts" , "read")  ) { ?>
        <li role="presentation" class="active"><a href="index.php?c=contacts&a=contacts&id=<?php echo $id ; ?>"><?php _t("Contacts") ; ?></a></li>
        <?php } ?>




    <?php if ( permissions_has_permission($u_rol , "employees" , "read") ) { ?>
        <li role="presentation" class=""><a href="index.php?c=contacts&a=employees&id=<?php echo $id ; ?>"><?php _t("Employees") ; ?></a></li>  
    <?php } ?>

</ul>



<?php  include "table_contacts_contacts.php" ; ?>


<?php include view("contacts" , "page_footer") ; ?>  

