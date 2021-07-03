<?php
// plugin = balance
// creation date : 
// 
// 
function balance_field_id($field, $id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $field FROM balance WHERE id= ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}


function balance_field_code($field, $code) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $field FROM balance WHERE code= ?");
    $req->execute(array($code));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function balance_search_by_unique($field, $FieldUnique, $valueUnique) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $field FROM balance WHERE   $FieldUnique = ?");
    $req->execute(array($valueUnique));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

/**
 * Check the operation number $ref in this $account_number
 * @global type $db
 * @param type $account_number Account number where check the $ref
 * @param type $ref Operation number in the $account_number
 * @return Retourne array [id, canceled_code ]
 * // Error if exist
 * array_push($error , 'This reference already exists in this account number') ;
 */
function balance_search_by_account_ref($account_number, $ref) {
    global $db;
    $data = null;
    $req = $db->prepare(            
            "SELECT id, canceled_code             
            FROM balance 
            WHERE (account_number=:account_number and ref = :ref) AND  canceled_code is NULL"            
            );
    $req->execute(array(
        "account_number"=>$account_number, 
        "ref"=>$ref,
            ));
    $data = $req->fetchall();    
    return (isset($data))? $data :  false;
}



function balance_list() {
    global $db;
    $limit = 999;

    $data = null;

    $req = $db->prepare("SELECT * FROM balance  ORDER BY id DESC LIMIT $limit  ");

    $req->execute(array(
        "limit" => $limit
    ));
    $data = $req->fetchall();
    return $data;
}

function balance_details($id) {
    global $db;
    $req = $db->prepare("SELECT * FROM balance WHERE id= ? ");
    $req->execute(array($id));
    $data = $req->fetch();
    return $data;
}

function balance_delete($id) {
    global $db;
    $req = $db->prepare("DELETE FROM balance WHERE id=? ");
    $req->execute(array($id));
}

function balance_edit($id ,  $client_id ,  $invoice_id ,  $credit_note_id ,  $type ,  $account_number ,  $sub_total ,  $tax ,  $total ,  $ref ,  $description ,  $ce ,  $date ,  $date_registre ,  $code ,  $canceled ,  $canceled_code   ) {

    global $db;
    $req = $db->prepare(" UPDATE balance SET "
            
            ."client_id=:client_id , "   
."invoice_id=:invoice_id , "   
."credit_note_id=:credit_note_id , "   
."type=:type , "   
."account_number=:account_number , "   
."sub_total=:sub_total , "   
."tax=:tax , "   
."total=:total , "   
."ref=:ref , "   
."description=:description , "   
."ce=:ce , "   
."date=:date , "   
."date_registre=:date_registre , "   
."code=:code , "   
."canceled=:canceled , "   
."canceled_code=:canceled_code  "   

            
                    
            
                    
            . " WHERE id=:id ");
    $req->execute(array(
 "id" =>$id ,   "client_id" =>$client_id ,   "invoice_id" =>$invoice_id ,   "credit_note_id" =>$credit_note_id ,   "type" =>$type ,   "account_number" =>$account_number ,   "sub_total" =>$sub_total ,   "tax" =>$tax ,   "total" =>$total ,   "ref" =>$ref ,   "description" =>$description ,   "ce" =>$ce ,   "date" =>$date ,   "date_registre" =>$date_registre ,   "code" =>$code ,   "canceled" =>$canceled ,   "canceled_code" =>$canceled_code ,  
                

));
}

function balance_add($client_id , $expense_id,  $invoice_id ,  $credit_note_id ,  $type ,  $account_number ,  $sub_total ,  $tax ,  $total ,  $ref ,  $description ,  $ce ,  $date ,  $date_registre ,  $code ,  $canceled ,  $canceled_code   ) {
    global $db;
    $req = $db->prepare(" INSERT INTO `balance` ( `id` ,   `client_id` , `expense_id`,  `invoice_id` ,   `credit_note_id` ,   `type` ,   `account_number` ,   `sub_total` ,   `tax` ,   `total` ,   `ref` ,   `description` ,   `ce` ,   `date` ,   `date_registre` ,   `code` ,   `canceled` ,   `canceled_code`   )
                                       VALUES  (:id ,  :client_id , :expense_id,  :invoice_id ,  :credit_note_id ,  :type ,  :account_number ,  :sub_total ,  :tax ,  :total ,  :ref ,  :description ,  :ce ,  :date ,  :date_registre ,  :code ,  :canceled ,  :canceled_code   ) ");

    $req->execute(array(

 "id" => null ,  
 "client_id" => $client_id , 
 "expense_id"=>$expense_id, 
 "invoice_id" => $invoice_id ,  
 "credit_note_id" => $credit_note_id ,  
 "type" => $type ,  
 "account_number" => $account_number ,  
 "sub_total" => $sub_total ,  
 "tax" => $tax ,  
 "total" => $total ,  
 "ref" => $ref ,  
 "description" => $description ,  
 "ce" => $ce ,  
 "date" => $date ,  
 "date_registre" => $date_registre ,  
 "code" => $code ,  
 "canceled" => $canceled ,  
 "canceled_code" => $canceled_code   
                        
            )
    );
    
     return $db->lastInsertId();
}



function balance_search($txt) {
    global $db;
    $data = null;
    $req = $db->prepare(
            
            
"SELECT * FROM balance 
    
WHERE id like :txt
OR client_id like :txt
OR invoice_id like :txt
OR credit_note_id like :txt
OR type like :txt
OR account_number like :txt
OR sub_total like :txt
OR tax like :txt
OR total like :txt
OR ref like :txt
OR description like :txt
OR ce like :txt
OR date like :txt
OR date_registre like :txt
OR code like :txt
OR canceled like :txt
OR canceled_code like :txt ORDER BY id DESC



                           
");
    $req->execute(array(
        "txt" => "%$txt%"
    ));
    $data = $req->fetchall();
    return $data;
}



function balance_select($k, $v, $selected="", $disabled=array()) {    
    $c = "";    
    foreach (balance_list() as $key => $value) {        
        $s = ($selected == $value[$k])?" selected  ":"";       
        $d = ( in_array($value[$k], $disabled )) ? " disabled ":"";                        
        $c .= "<option value=\"$value[$k]\" $s $d >". ucfirst($value[$v])."</option>" ;
    }    
    echo  $c;     
}
function balance_is_id($id){
     return true;
}

function balance_is_client_id($client_id){
     return true;
}

function balance_is_invoice_id($invoice_id){
     return true;
}

function balance_is_credit_note_id($credit_note_id){
     return true;
}

function balance_is_type($type){
     return true;
}

function balance_is_account_number($account_number){
     return true;
}

function balance_is_sub_total($sub_total){
     return true;
}

function balance_is_tax($tax){
     return true;
}

function balance_is_total($total){
     return true;
}

function balance_is_ref($ref){
     return true;
}

function balance_is_description($description){
     return true;
}

function balance_is_ce($ce){
     return true;
}

function balance_is_date($date){
     return true;
}

function balance_is_date_registre($date_registre){
     return true;
}

function balance_is_code($code){
     return true;
}

function balance_is_canceled($canceled){
     return true;
}

function balance_is_canceled_code($canceled_code){
     return true;
}


function balance_list_by_invoice($invoice_id) {
    global $db;
    $limit = 999;

    $data = null;

    $req = $db->prepare("SELECT * FROM balance WHERE invoice_id = :invoice_id ORDER BY id  LIMIT $limit ");

    $req->execute(array(
        "invoice_id" => $invoice_id
    ));
    $data = $req->fetchall();
    return $data;
}

function balance_list_by_expense($expense_id) {
    global $db;
    $limit = 999;

    $data = null;

    $req = $db->prepare("SELECT * FROM balance WHERE expense_id = :expense_id ORDER BY id  LIMIT $limit ");

    $req->execute(array(
        "expense_id" => $expense_id
    ));
    $data = $req->fetchall();
    return $data;
}



function balance_list_by_credit_note($credit_note_id) {
    global $db;
    $limit = 999;

    $data = null;

    $req = $db->prepare("SELECT * FROM balance WHERE credit_note_id = :credit_note_id ORDER BY id  LIMIT $limit ");

    $req->execute(array(
        "credit_note_id" => $credit_note_id
    ));
    $data = $req->fetchall();
    return $data;
}

function balance_list_by_invoice_id($invoice_id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT * FROM balance WHERE invoice_id = :invoice_id ORDER BY id   ");
    $req->execute(array(
        "invoice_id" => $invoice_id
    ));
    $data = $req->fetchall();
    return $data;
}



function balance_e_add(
        $client_id, $invoice_id, $credit_note_id, $type, $account_number, $sub_total, $tax, $total, 
        $ref, $description, $ce, $date, $date_registre, $code, $canceled, $canceled_code
        
        ) {
    global $db;
    $req = $db->prepare(" INSERT INTO `balance` "
            . "(`id`, `client_id`, `invoice_id`, `credit_note_id`, `type`, `account_number`, `sub_total`, `tax`, `total`, `ref`, `description`, `ce`, `date`,`date_registre`, `code`, `canceled`, `canceled_code`) "
            . "VALUES (:id,  :client_id,  :invoice_id,  :credit_note_id,  :type,  :account_number,  :sub_total,  :tax,   :total,  :ref, :description,  :ce,  :date, :date_registre, :code,  :canceled, :canceled_code);");

    $req->execute(array(
        "id" => null,
        "client_id" => $client_id,
        "invoice_id" => $invoice_id,
        "credit_note_id" => $credit_note_id,
        "type" => $type,
        "account_number" => $account_number,
        "sub_total" => $sub_total,
        "tax" => $tax,
        "total" => $total,
        "ref" => $ref,
        "description" => $description,
        "ce" => $ce,
        "date" => $date,
        "date_registre" => $date_registre,
        
        "code"=>$code,
        "canceled" => $canceled,
        "canceled_code" => $canceled_code
            )
    );

    return $db->lastInsertId();
}

function balance_total_pay_by_invoice($invoice_id) {
    global $db;
    $req = $db->prepare(" SELECT SUM(sub_total + tax) as total FROM balance WHERE invoice_id = :invoice_id ");

    $req->execute(array(
        "invoice_id" => $invoice_id
            )
    );
    $data = $req->fetch();
    return $data[0];
}

/**
 * Copia la linea de labalanza y la pone en negativo
 * @global type $db
 * @param type $id
 * @param type $canceled_code
 * @return type
 */
function balance_cancel($id, $canceled_code) {
    global $db;
    $req = $db->prepare("  INSERT INTO `balance` (`client_id`,`expense_id`, `invoice_id`, `credit_note_id`, `type`, `account_number`, `sub_total`, `tax`, `total`, `ref`, `description`, `ce`, `date`, `canceled`, `canceled_code`) SELECT `client_id`, `expense_id`, `invoice_id`, `credit_note_id`, -`type`, `account_number`, -`sub_total`, -`tax`, -`total`, `ref`, `description`, `ce`, `date`, `canceled`, :canceled_code FROM balance WHERE id=:id  ");
    $req->execute(array(
        "id" => $id,
        "canceled_code" => $canceled_code
    ));
    return $db->lastInsertId();
}

function balance_next_cancel_code() {
    global $db;
    $req = $db->prepare("SELECT MAX(canceled_code) FROM `balance`  ");
    $req->execute();
    $data = $req->fetch();
    return $data[0] + 1;
}

function balance_set_cancel_code($id, $canceled_code) {
    global $db;
    $req = $db->prepare(" UPDATE `balance` SET canceled_code=:canceled_code WHERE id=:id ");
    $req->execute(array(
        "canceled_code" => $canceled_code,
        "id" => $id
    ));

    return $db->lastInsertId();
}

function balance_set_credit_note_id_by_invoice($credit_note_id, $invoice_id) {
    global $db;
    $req = $db->prepare(" UPDATE `balance` SET credit_note_id=:credit_note_id WHERE invoice_id=:invoice_id AND type = -1 ");
    $req->execute(array(
        "credit_note_id" => $credit_note_id,
        "invoice_id" => $invoice_id
    ));

    return $db->lastInsertId();
}

function balance_total_total_by_invoice($invoice_id) {
    global $db;
    $req = $db->prepare("SELECT SUM(total) FROM `balance` WHERE invoice_id=:invoice_id  ");
    $req->execute(array(
        "invoice_id" => $invoice_id
    ));
    $data = $req->fetch();
    return $data[0];
}
function balance_total_total_by_expense($expense_id) {
    global $db;
    $req = $db->prepare("SELECT SUM(total) FROM `balance` WHERE expense_id=:expense_id  ");
    $req->execute(array(
        "expense_id" => $expense_id
    ));
    $data = $req->fetch();
    return $data[0];
}
function balance_total_total_by_credit_note($credit_note_id) {
    global $db;
    $req = $db->prepare("SELECT SUM(total) FROM `balance` WHERE credit_note_id=:credit_note_id  ");
    $req->execute(array(
        "credit_note_id" => $credit_note_id
    ));
    $data = $req->fetch();
    return $data[0];
}


/**
 * El saldo del la cuenta
 * @global type $db
 * @param type $account_number
 * @return type
 */
function balance_total_by_account_number($account_number) {
    global $db;
    $req = $db->prepare("SELECT SUM(sub_total) + SUM(tax) as total  FROM `balance` WHERE account_number=:account_number  ");
    $req->execute(array(
        "account_number" => $account_number
    ));
    $data = $req->fetch();
    return $data[0];
}

################################################################################
################################################################################
################################################################################
################################################################################
################################################################################
function balance_list_by_budget($budget_id) {
    global $db;
    $limit = 999;

    $data = null;

    $req = $db->prepare("SELECT * FROM balance WHERE budget_id = :budget_id ORDER BY id DESC LIMIT $limit ");

    $req->execute(array(
        "budget_id" => $budget_id
    ));
    $data = $req->fetchall();
    return $data;
}

function balance_search_by_codeCancel($txt) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT * FROM balance WHERE canceled_code =:txt");
    $req->execute(array(
        "txt" => $txt
    ));
    $data = $req->fetchall();
    return $data;
}

function balance_type($type){
    if($type == 1){
        return _tr("Income");
    }
    
    if($type == - 1){
        return _tr("Expenses");
    }
    
    return _t("undefined");
    
}
