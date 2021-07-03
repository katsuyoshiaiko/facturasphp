<?php
// plugin = addresses_transport
// creation date : 
// 
// 
function addresses_transport_field_id($field, $id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $field FROM addresses_transport WHERE id= ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}


function addresses_transport_field_code($field, $code) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $field FROM addresses_transport WHERE code= ?");
    $req->execute(array($code));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function addresses_transport_search_by_unique($field, $FieldUnique, $valueUnique) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $field FROM addresses_transport WHERE   $FieldUnique = ?");
    $req->execute(array($valueUnique));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function addresses_transport_list() {
    global $db;
    $limit = 999;

    $data = null;

    $req = $db->prepare("SELECT * FROM addresses_transport  ORDER BY id DESC LIMIT $limit  ");

    $req->execute(array(
        "limit" => $limit
    ));
    $data = $req->fetchall();
    return $data;
}

function addresses_transport_details($id) {
    global $db;
    $req = $db->prepare("SELECT * FROM addresses_transport WHERE id= ? ");
    $req->execute(array($id));
    $data = $req->fetch();
    return $data;
}

function addresses_transport_delete($id) {
    global $db;
    $req = $db->prepare("DELETE FROM addresses_transport WHERE id=? ");
    $req->execute(array($id));
}

function addresses_transport_edit($id ,  $addresses_id ,  $transport_code   ) {

    global $db;
    $req = $db->prepare(" UPDATE addresses_transport SET "
            
   ."addresses_id=:addresses_id , "   
    ."transport_code=:transport_code  "   

            
                    
            
                    
            . " WHERE id=:id ");
    $req->execute(array(
 "id" =>$id ,   "addresses_id" =>$addresses_id ,   "transport_code" =>$transport_code ,  
                

));
}

function addresses_transport_add($addresses_id ,  $transport_code   ) {
    global $db;
    $req = $db->prepare(" INSERT INTO `addresses_transport` ( `id` ,   `addresses_id` ,   `transport_code`   )
                                       VALUES  (:id ,  :addresses_id ,  :transport_code   ) ");

    $req->execute(array(

 "id" => null ,  
 "addresses_id" => $addresses_id ,  
 "transport_code" => $transport_code   
                        
            )
    );
    
     return $db->lastInsertId();
}



function addresses_transport_search($txt) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT * FROM addresses_transport 
    
            WHERE id like :txt OR id like :txt
OR addresses_id like :txt
OR transport_code like :txt
                           
");
    $req->execute(array(
        "txt" => "%$txt%"
    ));
    $data = $req->fetchall();
    return $data;
}



function addresses_transport_select($k, $v, $selected="", $disabled=array()) {    
    $c = "";    
    foreach (addresses_transport_list() as $key => $value) {        
        $s = ($selected == $value[$k])?" selected  ":"";       
        $d = ( in_array($value[$k], $disabled )) ? " disabled ":"";                        
        $c .= "<option value=\"$value[$k]\" $s $d >". ucfirst($value[$v])."</option>" ;
    }    
    echo  $c;     
}
function addresses_transport_is_id($id){
     return true;
}

function addresses_transport_is_addresses_id($addresses_id){
     return true;
}

function addresses_transport_is_transport_code($transport_code){
     return true;
}



function addresses_transport_search_by_addresses_id($addresses_id) {
    global $db ;
    $data = null ;
    $req = $db->prepare("SELECT transport_code FROM addresses_transport WHERE addresses_id = :addresses_id ") ;
    $req->execute(array(
        "addresses_id" => $addresses_id
    )) ;
    $data = $req->fetch(PDO::FETCH_COLUMN , 0) ;

    return (isset($data)) ? $data : false ;
}

function addresses_transport_update($addresses_id , $transport_code) {

    global $db ;
    $req = $db->prepare(" UPDATE `addresses_transport` SET `transport_code` =:transport_code  WHERE `addresses_id` =:addresses_id ") ;
    $req->execute(array(
        "addresses_id" => $addresses_id , 
        "transport_code" => $transport_code 
    )) ;
}
/**
 * Regresa una lista de direcciones segun el trasporte usado
 * @global type $db
 * @param type $transport_code
 * @return type
 */
function addresses_transport_search_by_transport_code($transport_code) {
    global $db ;
    $data = null ;
    $req = $db->prepare("SELECT addresses_id FROM addresses_transport WHERE transport_code = :transport_code ") ;
    $req->execute(array(
        "transport_code" => $transport_code
    )) ;
    $data = $req->fetchall();
    return $data;
}


