<?php

// plugin = rols
// creation date : 
// 
// 
function rols_field_id($field , $id) {
    global $db ;
    $data = null ;
    $req = $db->prepare("SELECT $field FROM rols WHERE id= ?") ;
    $req->execute(array( $id )) ;
    $data = $req->fetch() ;
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false ;
}

function rols_search_by_unique($field , $FieldUnique , $valueUnique) {
    global $db ;
    $data = null ;
    $req = $db->prepare("SELECT $field FROM banks WHERE $FieldUnique = ?") ;
    $req->execute(array( $valueUnique )) ;
    $data = $req->fetch() ;
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false ;
}

function rols_list() {
    global $db ;
    $limit = 999 ;

    $data = null ;

    $req = $db->prepare("SELECT * FROM rols ORDER BY rango DESC LIMIT $limit ") ;

    $req->execute(array(
        "limit" => $limit
    )) ;
    $data = $req->fetchall() ;
    return $data ;
}

function rols_details($id) {
    global $db ;
    $req = $db->prepare("SELECT * FROM rols WHERE id= ? ") ;
    $req->execute(array( $id )) ;
    $data = $req->fetch() ;
    return $data ;
}

function rols_delete($id) {
    global $db ;
    $req = $db->prepare("DELETE FROM rols WHERE id=? ") ;
    $req->execute(array( $id )) ;
}

function rols_edit($id , $rol , $rango , $order) {

    global $db ;
    $req = $db->prepare(" UPDATE `rols` SET `rol`=:rol , `rango`=:rango , `order`=:order  WHERE `id`=:id ") ;
    $req->execute(array(
        "id" => $id ,
        "rol" => $rol ,
        "rango" => $rango ,
        "order" => $order
    )) ;
}

function rols_add($rol , $rango , $order) {
    global $db ;
    $req = $db->prepare(" INSERT INTO `rols` ( `id` ,   `rol` ,   `rango` ,   `order`   )
                                       VALUES  (:id ,  :rol ,  :rango ,  :order   ) ") ;

    $req->execute(array(
        "id" => null ,
        "rol" => $rol ,
        "rango" => $rango ,
        "order" => $order
            )
    ) ;

    return $db->lastInsertId() ;
}

function rols_search($txt) {
    global $db ;
    $data = null ;
    $req = $db->prepare("SELECT * FROM rols 
    
            WHERE id like :txt OR id like :txt
OR rol like :txt
OR rango like :txt
OR order like :txt
                           
") ;
    $req->execute(array(
        "txt" => "%$txt%"
    )) ;
    $data = $req->fetchall() ;
    return $data ;
}

function rols_select($k , $v , $selected = "" , $disabled = array()) {
    $c = "" ;
    foreach ( rols_list() as $key => $value ) {
        $s = ($selected == $value[$k]) ? " selected  " : "" ;
        $d = ( in_array($value[$k] , $disabled)) ? " disabled " : "" ;
        $c .= "<option value=\"$value[$k]\" $s $d >" . ucfirst($value[$v]) . "</option>" ;
    }
    echo $c ;
}

function rols_is_id($id) {
    return true ;
}

function rols_is_rol($rol) {
    return true ;
}

function rols_is_rango($rango) {
    return true ;
}

function rols_is_order($order) {
    return true ;
}

function rols_list_order_by() {
    global $db;

    
    $limit = 999;

    $data = null;

    $req = $db->prepare("SELECT * FROM rols ORDER BY rango DESC");

    $req->execute(array(
        "limit" => $limit,

    ));
    $data = $req->fetchall();
    return $data;
}
