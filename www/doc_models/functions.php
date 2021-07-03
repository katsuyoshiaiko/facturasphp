<?php

function doc_models_list() {

    $directory = "www/doc_models/views"; 
    $res = array(); 
    
    $scanned_directory = array_diff(scandir($directory), array('..', '.', '.*'));
    foreach ($scanned_directory as $archivo) {
        if (  is_dir("$directory/$archivo")) {
            //require "$directory/$archivo/_description.php";
            array_push($res, $archivo); 
            
        }
    }
    
    return $res;
    
}


