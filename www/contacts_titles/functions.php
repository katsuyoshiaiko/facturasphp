<?php
// plugin = contacts_titles
// creation date : 
// 
// 
function contacts_titles_field_id($field, $id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $field FROM contacts_titles WHERE id= ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function contacts_titles_search_by_unique($field, $FieldUnique, $valueUnique) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $field FROM banks WHERE $FieldUnique = ?");
    $req->execute(array($valueUnique));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function contacts_titles_list() {
    global $db;
    $limit = 999;

    $data = null;

    $req = $db->prepare("SELECT * FROM contacts_titles ORDER BY order_by LIMIT $limit ");

    $req->execute(array(
        "limit" => $limit
    ));
    $data = $req->fetchall();
    return $data;
}

function contacts_titles_details($id) {
    global $db;
    $req = $db->prepare("SELECT * FROM contacts_titles WHERE id= ? ");
    $req->execute(array($id));
    $data = $req->fetch();
    return $data;
}

function contacts_titles_delete($id) {
    global $db;
    $req = $db->prepare("DELETE FROM contacts_titles WHERE id=? ");
    $req->execute(array($id));
}

function contacts_titles_edit($id ,  $title ,  $abbreviation ,  $order_by ,  $status   ) {

    global $db;
    $req = $db->prepare(" UPDATE contacts_titles SET "
            
            ."title=:title , "   
."abbreviation=:abbreviation , "   
."order_by=:order_by , "   
."status=:status  "   

            
                    
            
                    
            . " WHERE id=:id ");
    $req->execute(array(
 "id" =>$id ,   "title" =>$title ,   "abbreviation" =>$abbreviation ,   "order_by" =>$order_by ,   "status" =>$status ,  
                

));
}

function contacts_titles_add($title ,  $abbreviation ,  $order_by ,  $status   ) {
    global $db;
    $req = $db->prepare(" INSERT INTO `contacts_titles` ( `id` ,   `title` ,   `abbreviation` ,   `order_by` ,   `status`   )
                                       VALUES  (:id ,  :title ,  :abbreviation ,  :order_by ,  :status   ) ");

    $req->execute(array(

 "id" => null ,  
 "title" => $title ,  
 "abbreviation" => $abbreviation ,  
 "order_by" => $order_by ,  
 "status" => $status   
                        
            )
    );
    
     return $db->lastInsertId();
}



function contacts_titles_search($txt) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT * FROM contacts_titles 
    
            WHERE id like :txt OR id like :txt
OR title like :txt
OR abbreviation like :txt
OR order_by like :txt
OR status like :txt
                           
");
    $req->execute(array(
        "txt" => "%$txt%"
    ));
    $data = $req->fetchall();
    return $data;
}



function contacts_titles_select($k, $v, $selected="", $disabled=array()) {    
    $c = "";    
    foreach (contacts_titles_list() as $key => $value) {        
        $s = ($selected == $value[$k])?" selected  ":"";       
        $d = ( in_array($value[$k], $disabled )) ? " disabled ":"";                        
        $c .= "<option value=\"$value[$k]\" $s $d >". ucfirst($value[$v])."</option>" ;
    }    
    echo  $c;     
}
function contacts_titles_is_id($id){
     return true;
}

function contacts_titles_is_title($title){
     return true;
}

function contacts_titles_is_abbreviation($abbreviation){
     return true;
}

function contacts_titles_is_order_by($order_by){
     return true;
}

function contacts_titles_is_status($status){
     return true;
}

