<?php
// plugin = schedule
// creation date : 
// 
// 
function schedule_field_id($field, $id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $field FROM schedule WHERE id= ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function schedule_search_by_unique($field, $FieldUnique, $valueUnique) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $field FROM banks WHERE $FieldUnique = ?");
    $req->execute(array($valueUnique));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function schedule_list() {
    global $db;
    $limit = 999;

    $data = null;

    $req = $db->prepare("SELECT * FROM schedule ORDER BY id DESC LIMIT $limit ");

    $req->execute(array(
        "limit" => $limit
    ));
    $data = $req->fetchall();
    return $data;
}

function schedule_details($id) {
    global $db;
    $req = $db->prepare("SELECT * FROM schedule WHERE id= ? ");
    $req->execute(array($id));
    $data = $req->fetch();
    return $data;
}

function schedule_delete($id) {
    global $db;
    $req = $db->prepare("DELETE FROM schedule WHERE id=? ");
    $req->execute(array($id));
}

function schedule_edit($id ,  $contact_id ,  $day ,  $am_start ,  $am_end ,  $pm_start ,  $pm_end ,  $order_by ,  $status   ) {

    global $db;
    $req = $db->prepare(" UPDATE schedule SET "
            
            ."contact_id=:contact_id , "   
."day=:day , "   
."am_start=:am_start , "   
."am_end=:am_end , "   
."pm_start=:pm_start , "   
."pm_end=:pm_end , "   
."order_by=:order_by , "   
."status=:status  "   

            
                    
            
                    
            . " WHERE id=:id ");
    $req->execute(array(
 "id" =>$id ,   "contact_id" =>$contact_id ,   "day" =>$day ,   "am_start" =>$am_start ,   "am_end" =>$am_end ,   "pm_start" =>$pm_start ,   "pm_end" =>$pm_end ,   "order_by" =>$order_by ,   "status" =>$status ,  
                

));
}

function schedule_add($contact_id ,  $day ,  $am_start ,  $am_end ,  $pm_start ,  $pm_end ,  $order_by ,  $status   ) {
    global $db;
    $req = $db->prepare(" INSERT INTO `schedule` ( `id` ,   `contact_id` ,   `day` ,   `am_start` ,   `am_end` ,   `pm_start` ,   `pm_end` ,   `order_by` ,   `status`   )
                                       VALUES  (:id ,  :contact_id ,  :day ,  :am_start ,  :am_end ,  :pm_start ,  :pm_end ,  :order_by ,  :status   ) ");

    $req->execute(array(

 "id" => null ,  
 "contact_id" => $contact_id ,  
 "day" => $day ,  
 "am_start" => $am_start ,  
 "am_end" => $am_end ,  
 "pm_start" => $pm_start ,  
 "pm_end" => $pm_end ,  
 "order_by" => $order_by ,  
 "status" => $status   
                        
            )
    );
    
     return $db->lastInsertId();
}



function schedule_search($txt) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT * FROM schedule 
    
            WHERE id like :txt OR id like :txt
OR contact_id like :txt
OR day like :txt
OR am_start like :txt
OR am_end like :txt
OR pm_start like :txt
OR pm_end like :txt
OR order_by like :txt
OR status like :txt
                           
");
    $req->execute(array(
        "txt" => "%$txt%"
    ));
    $data = $req->fetchall();
    return $data;
}



function schedule_select($k, $v, $selected="", $disabled=array()) {    
    $c = "";    
    foreach (schedule_list() as $key => $value) {        
        $s = ($selected == $value[$k])?" selected  ":"";       
        $d = ( in_array($value[$k], $disabled )) ? " disabled ":"";                        
        $c .= "<option value=\"$value[$k]\" $s $d >". ucfirst($value[$v])."</option>" ;
    }    
    echo  $c;     
}
function schedule_is_id($id){
     return true;
}

function schedule_is_contact_id($contact_id){
     return true;
}

function schedule_is_day($day){
     return true;
}

function schedule_is_am_start($am_start){
     return true;
}

function schedule_is_am_end($am_end){
     return true;
}

function schedule_is_pm_start($pm_start){
     return true;
}

function schedule_is_pm_end($pm_end){
     return true;
}

function schedule_is_order_by($order_by){
     return true;
}

function schedule_is_status($status){
     return true;
}

