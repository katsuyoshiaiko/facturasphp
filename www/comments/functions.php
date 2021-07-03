<?php
// plugin = comments
// creation date : 
// 
// 
function comments_field_id($field, $id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $field FROM comments WHERE id= ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function comments_search_by_unique($field, $FieldUnique, $valueUnique) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $field FROM banks WHERE $FieldUnique = ?");
    $req->execute(array($valueUnique));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function comments_list() {
    global $db;
    $limit = 999;

    $data = null;

    $req = $db->prepare("SELECT * FROM comments ORDER BY id DESC LIMIT $limit ");

    $req->execute(array(
        "limit" => $limit
    ));
    $data = $req->fetchall();
    return $data;
}

function comments_details($id) {
    global $db;
    $req = $db->prepare("SELECT * FROM comments WHERE id= ? ");
    $req->execute(array($id));
    $data = $req->fetch();
    return $data;
}

function comments_delete($id) {
    global $db;
    $req = $db->prepare("DELETE FROM comments WHERE id=? ");
    $req->execute(array($id));
}

function comments_edit($id ,  $date ,  $sender_id ,  $doc ,  $doc_id ,  $comment ,  $order_by ,  $status   ) {

    global $db;
    $req = $db->prepare(" UPDATE comments SET "
            
            ."date=:date , "   
."sender_id=:sender_id , "   
."doc=:doc , "   
."doc_id=:doc_id , "   
."comment=:comment , "   
."order_by=:order_by , "   
."status=:status  "   

            
                    
            
                    
            . " WHERE id=:id ");
    $req->execute(array(
 "id" =>$id ,   "date" =>$date ,   "sender_id" =>$sender_id ,   "doc" =>$doc ,   "doc_id" =>$doc_id ,   "comment" =>$comment ,   "order_by" =>$order_by ,   "status" =>$status ,  
                

));
}

function comments_add($date ,  $sender_id ,  $doc ,  $doc_id ,  $comment ,  $order_by ,  $status   ) {
    global $db;
    $req = $db->prepare(" INSERT INTO `comments` ( `id` ,   `date` ,   `sender_id` ,   `doc` ,   `doc_id` ,   `comment` ,   `order_by` ,   `status`   )
                                       VALUES  (:id ,  :date ,  :sender_id ,  :doc ,  :doc_id ,  :comment ,  :order_by ,  :status   ) ");

    $req->execute(array(

 "id" => null ,  
 "date" => $date ,  
 "sender_id" => $sender_id ,  
 "doc" => $doc ,  
 "doc_id" => $doc_id ,  
 "comment" => $comment ,  
 "order_by" => $order_by ,  
 "status" => $status   
                        
            )
    );
    
     return $db->lastInsertId();
}



function comments_search($txt) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT * FROM comments 
    
            WHERE id like :txt OR id like :txt
OR date like :txt
OR sender_id like :txt
OR doc like :txt
OR doc_id like :txt
OR comment like :txt
OR order_by like :txt
OR status like :txt
                           
");
    $req->execute(array(
        "txt" => "%$txt%"
    ));
    $data = $req->fetchall();
    return $data;
}



function comments_select($k, $v, $selected="", $disabled=array()) {    
    $c = "";    
    foreach (comments_list() as $key => $value) {        
        $s = ($selected == $value[$k])?" selected  ":"";       
        $d = ( in_array($value[$k], $disabled )) ? " disabled ":"";                        
        $c .= "<option value=\"$value[$k]\" $s $d >". ucfirst($value[$v])."</option>" ;
    }    
    echo  $c;     
}
function comments_is_id($id){
     return true;
}

function comments_is_date($date){
     return true;
}

function comments_is_sender_id($sender_id){
     return true;
}

function comments_is_doc($doc){
     return true;
}

function comments_is_doc_id($doc_id){
     return true;
}

function comments_is_comment($comment){
     return true;
}

function comments_is_order_by($order_by){
     return true;
}

function comments_is_status($status){
     return true;
}

function comments_search_by_controller_id($doc , $doc_id) {
    global $db ;
    $data = null ;
    $req = $db->prepare("SELECT * FROM comments WHERE  doc =:doc AND doc_id = :doc_id AND status = 1") ;
    $req->execute(array( 
        "doc"=>$doc,
        "doc_id"=>$doc_id 
        
        )) ;
    $data = $req->fetchall() ;
    
    return $data; 
}


function comments_search_by_sender_id($contact_id) {
    global $db ;
    $data = null ;
    $req = $db->prepare("SELECT * FROM comments WHERE  sender_id =:sender_id AND status = 1 ORDER BY id desc LIMIT 10 ") ;
    $req->execute(array( 
        
        "sender_id"=>$contact_id 
        
        )) ;
    $data = $req->fetchall() ;
    
    return $data; 
}


function comments_change_status($id, $new_status) {

    if ($id) {
        global $db;
        $req = $db->prepare('UPDATE comments SET status=:new_status WHERE id=:id');
        $req->execute(array(
            'new_status' => $new_status,
            'id' => $id));
    }
}

function comments_total_by_order($order_id) {
    global $db ;

    $data = 0 ;

    $req = $db->prepare('SELECT COUNT(*) FROM comments WHERE `doc` = "orders" AND `doc_id` = ? AND `status` = 1 ') ;
    
    $req->execute(array( $order_id )) ;
    $data = $req->fetchall() ;

    return $data[0][0] ;
    //return $order_id ;
}
