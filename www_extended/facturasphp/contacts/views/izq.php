<?php 

switch ( contacts_field_id('type' , $id)  ) {
    case '0':
        include 'izq_details_contact.php' ;
        break ;

    case '1':
        include 'izq_details_company.php' ;
        break ;

    default:
        include 'izq_index.php' ;
        break ;
}
