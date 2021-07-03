<?php
function controller($c, $a) {         
    
    $v = false; 
    
    if (file_exists( WWW_E."/$c/controllers/$a.php")) {
        $v =  WWW_E ."/$c/controllers/$a.php";
    } else {
        $v =  WWW . "/$c/controllers/$a.php";
    }
    
    return $v;
}
