<?php
// plugin = logs
// creation date : 
// 
// 
function logs_field_id($field, $id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $field FROM logs WHERE id= ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function logs_search_by_unique($field, $FieldUnique, $valueUnique) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $field FROM banks WHERE $FieldUnique = ?");
    $req->execute(array($valueUnique));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function logs_list() {
    global $db;
    $limit = 999;

    $data = null;

    $req = $db->prepare("SELECT * FROM logs ORDER BY id DESC LIMIT $limit ");

    $req->execute(array(
        "limit" => $limit
    ));
    $data = $req->fetchall();
    return $data;
}

function logs_details($id) {
    global $db;
    $req = $db->prepare("SELECT * FROM logs WHERE id= ? ");
    $req->execute(array($id));
    $data = $req->fetch();
    return $data;
}

function logs_delete($id) {
    global $db;
    $req = $db->prepare("DELETE FROM logs WHERE id=? ");
    $req->execute(array($id));
}

function logs_edit($id ,  $level ,  $date ,  $u_id ,  $u_rol ,  $c ,  $a ,  $w ,  $description ,  $doc_id ,  $crud ,  $error ,  $val_get ,  $val_post ,  $val_request ,  $ip4 ,  $ip6 ,  $broswer   ) {

    global $db;
    $req = $db->prepare(" UPDATE logs SET "
            
            ."level=:level , "   
."date=:date , "   
."u_id=:u_id , "   
."u_rol=:u_rol , "   
."c=:c , "   
."a=:a , "   
."w=:w , "   
."description=:description , "   
."doc_id=:doc_id , "   
."crud=:crud , "   
."error=:error , "   
."val_get=:val_get , "   
."val_post=:val_post , "   
."val_request=:val_request , "   
."ip4=:ip4 , "   
."ip6=:ip6 , "   
."broswer=:broswer  "   

            
                    
            
                    
            . " WHERE id=:id ");
    $req->execute(array(
 "id" =>$id ,   "level" =>$level ,   "date" =>$date ,   "u_id" =>$u_id ,   "u_rol" =>$u_rol ,   "c" =>$c ,   "a" =>$a ,   "w" =>$w ,   "description" =>$description ,   "doc_id" =>$doc_id ,   "crud" =>$crud ,   "error" =>$error ,   "val_get" =>$val_get ,   "val_post" =>$val_post ,   "val_request" =>$val_request ,   "ip4" =>$ip4 ,   "ip6" =>$ip6 ,   "broswer" =>$broswer ,  
                

));
}

function logs_add(
        $level ,  $date ,  $u_id ,  $u_rol ,  $c ,  $a ,  $w ,  
        $description ,  $doc_id ,  $crud ,  $error ,  
        $val_get ,  $val_post ,  $val_request ,  $ip4 ,  $ip6 ,  $broswer   
        ) {
    global $db;
    
    
    
    $sql = "INSERT INTO `logs` (`id`, `level`, `date`, `u_id`, `u_rol`, `c`, `a`, `w`, `description`, `doc_id`, `crud`, `error`, `val_get`, `val_post`, `val_request`, `ip4`, `ip6`, `broswer`) VALUES (:id ,  :level ,  :date ,  :u_id ,  :u_rol ,  :c ,  :a ,  :w ,  :description ,  :doc_id ,  :crud ,  :error ,  :val_get ,  :val_post ,  :val_request ,  :ip4 ,  :ip6 ,  :broswer ); "; 
    
    
    
    
//    $req = $db->prepare(" INSERT INTO `logs` ( `id` ,   `level` ,   `date` ,   `u_id` ,   `u_rol` ,   `c` ,   `a` ,   `w` ,   `description` ,   `doc_id` ,   `crud` ,   `error` ,   `val_get` ,   `val_post` ,   `val_request` ,   `ip4` ,   `ip6` ,   `broswer`   )
//                                       VALUES  (:id ,  :level ,  :date ,  :u_id ,  :u_rol ,  :c ,  :a ,  :w ,  :description ,  :doc_id ,  :crud ,  :error ,  :val_get ,  :val_post ,  :val_request ,  :ip4 ,  :ip6 ,  :broswer   ) ");

    $req = $db->prepare($sql);
    
    
    $req->execute(array(

 "id" => null ,  
 "level" => $level ,  
 "date" => $date ,  
 "u_id" => $u_id ,  
 "u_rol" => $u_rol ,  
 "c" => $c ,  
 "a" => $a ,  
 "w" => $w ,  
 "description" => $description ,  
 "doc_id" => $doc_id ,  
 "crud" => $crud ,  
 "error" => $error ,  
 "val_get" => $val_get ,  
 "val_post" => $val_post ,  
 "val_request" => $val_request ,  
 "ip4" => $ip4 ,  
 "ip6" => $ip6 ,  
 "broswer" => $broswer   
                        
            )
    );
    
     return $db->lastInsertId();
}



function logs_search($txt) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT * FROM logs 
    
            WHERE id like :txt OR id like :txt
OR level like :txt
OR date like :txt
OR u_id like :txt
OR u_rol like :txt
OR c like :txt
OR a like :txt
OR w like :txt
OR description like :txt
OR doc_id like :txt
OR crud like :txt
OR error like :txt
OR val_get like :txt
OR val_post like :txt
OR val_request like :txt
OR ip4 like :txt
OR ip6 like :txt
OR broswer like :txt
                           
");
    $req->execute(array(
        "txt" => "%$txt%"
    ));
    $data = $req->fetchall();
    return $data;
}



function logs_select($k, $v, $selected="", $disabled=array()) {    
    $c = "";    
    foreach (logs_list() as $key => $value) {        
        $s = ($selected == $value[$k])?" selected  ":"";       
        $d = ( in_array($value[$k], $disabled )) ? " disabled ":"";                        
        $c .= "<option value=\"$value[$k]\" $s $d >". ucfirst($value[$v])."</option>" ;
    }    
    echo  $c;     
}
function logs_is_id($id){
     return true;
}

function logs_is_level($level){
     return true;
}

function logs_is_date($date){
     return true;
}

function logs_is_u_id($u_id){
     return true;
}

function logs_is_u_rol($u_rol){
     return true;
}

function logs_is_c($c){
     return true;
}

function logs_is_a($a){
     return true;
}

function logs_is_w($w){
     return true;
}

function logs_is_description($description){
     return true;
}

function logs_is_doc_id($doc_id){
     return true;
}

function logs_is_crud($crud){
     return true;
}

function logs_is_error($error){
     return true;
}

function logs_is_val_get($val_get){
     return true;
}

function logs_is_val_post($val_post){
     return true;
}

function logs_is_val_request($val_request){
     return true;
}

function logs_is_ip4($ip4){
     return true;
}

function logs_is_ip6($ip6){
     return true;
}

function logs_is_broswer($broswer){
     return true;
}

function logs_list_by_controller_and_doc_id($c , $doc_id) {
    global $db ;
    $data = null ;
    $req = $db->prepare("SELECT * FROM logs WHERE c=:c AND doc_id=:doc_id ORDER BY id DESC") ;
    $req->execute(array(
        "c" => $c ,
        "doc_id" => $doc_id ,
    )) ;
    $data = $req->fetchall() ;
    return $data;
    //return (isset($data[0])) ? $data[0] : false ;
}


function logs_list_by_types_modeles_formes() {
    global $db ;
    $data = null ;
    $req = $db->prepare("SELECT * FROM logs WHERE c=:c  ORDER BY id DESC") ;
    $req->execute(array(
        "c" => '_types_modeles_formes' ,
        //"doc_id" => $doc_id ,
    )) ;
    $data = $req->fetchall() ;
    return $data;
    //return (isset($data[0])) ? $data[0] : false ;
}



function logs_list_distinct_a() {
    global $db ;
    $data = null ;
    $req = $db->prepare("SELECT distinct(a) FROM logs ") ;
    $req->execute(array(
       // "c" => '_types_modeles_formes' ,
       // "col" => $col ,
    )) ;
    $data = $req->fetchall() ;
    return $data;
    //return (isset($data[0])) ? $data[0] : false ;
}

function logs_list_distinct_c() {
    global $db ;
    $data = null ;
    $req = $db->prepare("SELECT distinct(c) FROM logs ") ;
    $req->execute(array(
       // "c" => '_types_modeles_formes' ,
       // "col" => $col ,
    )) ;
    $data = $req->fetchall() ;
    return $data;
    //return (isset($data[0])) ? $data[0] : false ;
}


function logs_list_by_controller_action_user($c , $a, $id) {
    global $db ;
    $data = null ;
    $req = $db->prepare(
            "SELECT * 
            FROM logs         
            WHERE c=:c AND a=:a AND u_id=:u_id         
            ORDER BY id DESC ") ;
    
    $req->execute(array(
        "c" => $c ,
        "a" => $a ,        
        "u_id" => $id ,
    )) ;
    $data = $req->fetchall() ;
    return $data;
    //return (isset($data[0])) ? $data[0] : false ;
}

