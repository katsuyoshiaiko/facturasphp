<!DOCTYPE html>

<html 
    lang="<?php echo substr(users_field_contact_id('language', $u_id), 0, 2) ?>"
    dir="<?php echo (substr(users_field_contact_id('language', $u_id), 0, 2) == "ar") ? "rtl" : "ltr"; ?>"    
>    
    
    <head>
        <?php include view("home", "head"); ?>    
    </head>

    <body>
        
        <div class="container">
            
            <p>&nbsp;</p>  
            <?php logo(20); ?>
            <?php include view("home", 'menu'); ?>    
        </div>
        
        <div class="container">


