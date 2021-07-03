<?php
// plugin = banks
// creation date : 
// 
// 
function banks_field_id($field, $id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $field FROM banks WHERE id= ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function banks_search_by_unique($field, $FieldUnique, $valueUnique) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $field FROM banks WHERE $FieldUnique = ?");
    $req->execute(array($valueUnique));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function banks_list() {
    global $db;
    $limit = 999;

    $data = null;

    $req = $db->prepare("SELECT * FROM banks ORDER BY id DESC LIMIT $limit ");

    $req->execute(array(
        "limit" => $limit
    ));
    $data = $req->fetchall();
    return $data;
}

function banks_details($id) {
    global $db;
    $req = $db->prepare("SELECT * FROM banks WHERE id= ? ");
    $req->execute(array($id));
    $data = $req->fetch();
    return $data;
}

function banks_delete($id) {
    global $db;
    $req = $db->prepare("DELETE FROM banks WHERE id=? ");
    $req->execute(array($id));
}

function banks_edit($id ,  $contact_id ,  $bank ,  $account_number ,  $bic ,  $iban ,  $status   ) {

    global $db;
    $req = $db->prepare(" UPDATE banks SET "
            
            ."contact_id=:contact_id , "   
."bank=:bank , "   
."account_number=:account_number , "   
."bic=:bic , "   
."iban=:iban , "   
."status=:status  "   

            
                    
            
                    
            . " WHERE id=:id ");
    $req->execute(array(
 "id" =>$id ,   "contact_id" =>$contact_id ,   "bank" =>$bank ,   "account_number" =>$account_number ,   "bic" =>$bic ,   "iban" =>$iban ,   "status" =>$status ,  
                

));
}

function banks_add($contact_id ,  $bank ,  $account_number ,  $bic ,  $iban , $code,  $status   ) {
    global $db;
    $req = $db->prepare(" INSERT INTO `banks` ( `id` ,   `contact_id` ,   `bank` ,   `account_number` ,   `bic` ,   `iban` , `code`, `invoices`, `status`   )
                                       VALUES  (:id ,  :contact_id ,  :bank ,  :account_number ,  :bic ,  :iban , :code, :invoices, :status   ) ");

    $req->execute(array(

 "id" => null ,  
 "contact_id" => $contact_id ,  
 "bank" => $bank ,  
 "account_number" => $account_number ,  
 "bic" => $bic ,  
 "iban" => $iban ,
 "code"=>$code, 
 "invoices"=>0,       
 "status" => $status   
                        
            )
    );
    
     return $db->lastInsertId();
}



function banks_search($txt) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT * FROM banks 
    
            WHERE id like :txt OR id like :txt
OR contact_id like :txt
OR bank like :txt
OR account_number like :txt
OR bic like :txt
OR iban like :txt
OR status like :txt
                           
");
    $req->execute(array(
        "txt" => "%$txt%"
    ));
    $data = $req->fetchall();
    return $data;
}


function banks_search_by_account($txt) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT * FROM banks WHERE account_number = :txt ");
    $req->execute(array(
        "txt" => $txt
    ));
    $data = $req->fetchall();
    return $data;
}


function banks_select($k, $v, $selected="", $disabled=array()) {    
    $c = "";    
    foreach (banks_list() as $key => $value) {        
        $s = ($selected == $value[$k])?" selected  ":"";       
        $d = ( in_array($value[$k], $disabled )) ? " disabled ":"";                        
        $c .= "<option value=\"$value[$k]\" $s $d >". ucfirst($value[$v])."</option>" ;
    }    
    echo  $c;     
}
function banks_is_id($id){
     return true;
}

function banks_is_contact_id($contact_id){
     return true;
}

function banks_is_bank($bank){
     return true;
}

function banks_is_account_number($account_number){
     return true;
}

function banks_is_bic($bic){
     return true;
}

function banks_is_iban($iban){
     return true;
}

function banks_is_status($status){
     return true;
}

## EXTENDIDO
function banks_field_code($field, $code) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $field FROM banks WHERE code= ?");
    $req->execute(array(
        $code
    ));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function banks_field_account_number($field, $account_number) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $field FROM banks WHERE account_number= ?");
    $req->execute(array(
        $account_number
            ));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}



function banks_list_by_contact_id($contact_id) {
    global $db ;
    $req = $db->prepare('SELECT * FROM banks WHERE contact_id = ? ORDER BY id DESC') ;
    $req->execute(array( $contact_id )) ;
    $data = $req->fetchall() ;
    return $data ;
}

function banks_set_for_invoices($account_number) {
    global $db ;
    $req = $db->prepare('UPDATE `banks` SET `invoices` =:invoices  WHERE `account_number` = :account_number ') ;

    $req->execute(array(
        'account_number' => $account_number ,
        'invoices' => 1
            )
    ) ;
}

function banks_unset_for_invoices($account_number) {
    global $db ;
    $req = $db->prepare('UPDATE `banks` SET `invoices` =:invoices  WHERE `account_number` = :account_number ') ;

    $req->execute(array(
        'account_number' => $account_number ,
        'invoices' => 0
            )
    ) ;
}

function banks_check_is_invoices($account_number) {
    global $db ;
    $req = $db->prepare('SELECT invoices FROM banks WHERE account_number = ? ') ;
    $req->execute(array(
        $account_number
    )) ;
    $data = $req->fetch(PDO::FETCH_COLUMN , 0) ;
    return $data ;
}

function banks_get_account_number_for_invoices($contact_id) {
    global $db ;
    $req = $db->prepare('SELECT account_number FROM banks WHERE contact_id = :contact_id AND invoices = :invoices ') ;
    $req->execute(array(
        "contact_id" => $contact_id ,
        "invoices" => 1
    )) ;
    $data = $req->fetch(PDO::FETCH_COLUMN , 0) ;
    return $data ;
}
