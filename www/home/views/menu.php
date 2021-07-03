<?php
/**
 * Si rol se muestra menu interno 
 * sino solo menu guest
 */
if( is_logued() ){
    include "menu_users.php"; 
}else {
   // include "menu_guest.php"; 
}

