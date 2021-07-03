<?php

// plugin = contacts
// creation date : 
// 
// 
function contacts_field_id($field , $id) {
    global $db ;
    $data = null ;
    $req = $db->prepare("SELECT `$field` FROM `contacts` WHERE `id`= ?") ;
    $req->execute(array( $id )) ;
    $data = $req->fetch() ;
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false ;
}

function contacts_search_by_unique($field , $FieldUnique , $valueUnique) {
    global $db ;
    $data = null ;
    $req = $db->prepare("SELECT $field FROM banks WHERE $FieldUnique = ?") ;
    $req->execute(array( $valueUnique )) ;
    $data = $req->fetch() ;
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false ;
}

function contacts_list($limit=null, $start=0) {
    global $db ;

    if( $limit ){
        $sql = "SELECT * FROM `contacts` ORDER BY id DESC Limit :limit OFFSET :start  ";  
    }else{
        $sql = "SELECT * FROM `contacts` ORDER BY id  DESC   ";  
    }
        
    $query = $db->prepare($sql);
    
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    
    $query->execute(); 
    
    $data = $query->fetchall();
    
    return $data;
    
}

function contacts_details($id) {
    global $db ;
    $req = $db->prepare("SELECT * FROM contacts WHERE id= ? ") ;
    $req->execute(array( $id )) ;
    $data = $req->fetch() ;
    return $data ;
}

function contacts_delete($id) {
    global $db ;
    $req = $db->prepare("DELETE FROM contacts WHERE id=? ") ;
    $req->execute(array( $id )) ;
}

function contacts_edit($id , $owner_id , $type , $title , $name , $lastname , $birthdate , $tva , $order_by , $status) {

    global $db ;
    $req = $db->prepare(" UPDATE contacts SET "
            . "owner_id=:owner_id , "
            . "type=:type , "
            . "title=:title , "
            . "name=:name , "
            . "lastname=:lastname , "
            ."birthdate=:birthdate , "   
            . "tva=:tva , "
            . "order_by=:order_by , "
            . "status=:status  "
            . " WHERE id=:id ") ;

    $req->execute(array(
        "id" => $id ,
        "owner_id" => $owner_id ,
        "type" => $type ,
        "title" => $title ,
        "name" => $name ,
        "lastname" => $lastname ,
        "birthdate" => $birthdate ,
        "tva" => $tva ,
        "order_by" => $order_by ,
        "status" => $status ,
    )) ;
}

function contacts_edit_short($id, $title , $name , $lastname ) {
    global $db ;
    $req = $db->prepare(" UPDATE contacts SET title=:title , name=:name , lastname=:lastname WHERE id=:id ") ;

    $req->execute(array(
        "id" => $id ,                
        "title" => $title ,
        "name" => $name ,
        "lastname" => $lastname ,        
    )) ;
}


function contacts_add(
        $owner_id , $type , $title , $name , $lastname , $birthdate , $tva , $code, $order_by , $status
        ) {
    global $db ;
    
    
    $req = $db->prepare(" INSERT INTO `contacts` 
        ( `id` ,   `owner_id` , `type`,   `title` ,   `name` ,   `lastname` ,   `birthdate` ,   `tva` ,  
        `code`,  `order_by` ,   `status`   )
                                       VALUES  
        (:id ,     :owner_id ,  :type,   :title ,    :name ,      :lastname ,    :birthdate ,    :tva , 
        :code,   :order_by ,   :status   ) ") ;

    $req->execute(array(
        "id" => null ,
        "owner_id" => $owner_id ,
        "type" => $type ,
        "title" => $title ,
        "name" => $name ,
        "lastname" => $lastname ,
        "birthdate" => $birthdate ,
        "tva" => $tva ,
        "code"=>$code,
        "order_by" => $order_by ,
        "status" => $status
            )
    ) ;


    return  $req->errorCode();
    
    
    
    
}

function contacts_search($txt, $order_by = 'name') {
    global $db ;
    $data = null ;
    $req = $db->prepare("SELECT * FROM contacts 
    
            WHERE id like :txt
OR owner_id like :txt
OR type like :txt
OR title like :txt
OR name like :txt
OR lastname like :txt
OR birthdate like :txt
OR tva like :txt
OR order_by like :txt
OR status like :txt
ORDER BY :order_by DESC
                           
") ;
    $req->execute(array(
        "txt" => "%$txt%", 
        "order_by"=> $order_by
    )) ;
    $data = $req->fetchall() ;
    return $data ;
}

function contacts_select($k , $v , $selected = "" , $disabled = array()) {
    $c = "" ;
    foreach ( contacts_list() as $key => $value ) {
        $s = ($selected == $value[$k]) ? " selected  " : "" ;
        $d = ( in_array($value[$k] , $disabled)) ? " disabled " : "" ;
        $c .= "<option value=\"$value[$k]\" $s $d >" . ucfirst($value[$v]) . "</option>" ;
    }
    echo $c ;
}

function contacts_is_id($id) {
    return true ;
}

function contacts_is_owner_id($owner_id) {
    return true ;
}

function contacts_is_type($type) {
    return true ;
}

function contacts_is_title($title) {
    return true ;
}

function contacts_is_name($name) {
    return true ;
}

function contacts_is_lastname($lastname) {
    return true ;
}

function contacts_is_birthdate($birthdate) {
    return true ;
}

function contacts_is_tva($tva) {
    return true ;
}

function contacts_is_order_by($order_by) {
    return true ;
}

function contacts_is_status($status) {
    return true ;
}

function contacts_is_ok_for_new_account(){
    /**
     * debe tener: 
     * nombre:
     * tva:
     * email:
     * 
     */
    
}