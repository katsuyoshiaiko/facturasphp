<?php

if ( ! permissions_has_permission($u_rol , $c , "read") ) {
    header("Location: index.php?c=home&a=no_access") ;
    die("Error has permission ") ;
}



// https://nouvelle-techno.fr/actualites/mettre-en-place-une-pagination-en-php
// On détermine sur quelle page on se trouve
if ( isset($_GET['page']) && ! empty($_GET['page']) ) {
    $page = ( int ) strip_tags($_GET['page']) ;
} else {
    $page = 1 ;
}

// pagination('index.php?c=addresses' , $totalItems , $itemsByPage , $page)

$totalItems = count(_content_list()) ;

$itemsByPage = (_options_option("system_items_limit")) ? _options_option("system_items_limit") : 5 ;
//$totalPages = ceil($totalItems / $itemsByPage) * 10 ;
$limit = $itemsByPage ;
$start = ($page == 1 ) ? 0 : $page * $itemsByPage ;

$_content = _content_list($limit , $start) ;




include view("_content" , "index") ;
if ( $debug ) {
    include "www/_content/views/debug.php" ;
}