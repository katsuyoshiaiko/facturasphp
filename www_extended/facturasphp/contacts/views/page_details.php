<?php include view("contacts" , "page_header") ; ?>  

<?php //include view("contacts" , "nav") ; ?>    


<h3>
    <?php _t("Details") ; ?> : 
    <?php echo contacts_formated($id) ; ?>    
</h3>


<?php include view("contacts" , "page_footer") ; ?>  