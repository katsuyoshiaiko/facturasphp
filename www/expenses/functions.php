<?php
// plugin = expenses
// creation date : 
// 
// 
function expenses_field_id($field, $id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $field FROM expenses WHERE id= ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function expenses_search_by_unique($field, $FieldUnique, $valueUnique) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $field FROM expenses WHERE status = 1 AND  $FieldUnique = ?");
    $req->execute(array($valueUnique));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function expenses_list() {
    global $db;
    $limit = 999;

    $data = null;

    $req = $db->prepare("SELECT * FROM expenses ORDER BY id DESC LIMIT $limit  ");

    $req->execute(array(
        "limit" => $limit
    ));
    $data = $req->fetchall();
    return $data;
}

function expenses_details($id) {
    global $db;
    $req = $db->prepare("SELECT * FROM expenses WHERE id= ? ");
    $req->execute(array($id));
    $data = $req->fetch();
    return $data;
}

function expenses_delete($id) {
    global $db;
    $req = $db->prepare("DELETE FROM expenses WHERE id=? ");
    $req->execute(array($id));
}

function expenses_edit($id ,  $budget_id ,  $credit_note_id ,  $client_id ,  $seller_id ,  $date ,  $date_registre ,  $total ,  $tax ,  $advance ,  $balance ,  $comments ,  $comments_private ,  $r1 ,  $r2 ,  $r3 ,  $fc ,  $date_update ,  $days ,  $ce ,  $key ,  $status   ) {

    global $db;
    $req = $db->prepare(" UPDATE expenses SET "
            
            ."budget_id=:budget_id , "   
."credit_note_id=:credit_note_id , "   
."client_id=:client_id , "   
."seller_id=:seller_id , "   
."date=:date , "   
."date_registre=:date_registre , "   
."total=:total , "   
."tax=:tax , "   
."advance=:advance , "   
."balance=:balance , "   
."comments=:comments , "   
."comments_private=:comments_private , "   
."r1=:r1 , "   
."r2=:r2 , "   
."r3=:r3 , "   
."fc=:fc , "   
."date_update=:date_update , "   
."days=:days , "   
."ce=:ce , "   
."key=:key , "   
."status=:status  "   

            
                    
            
                    
            . " WHERE id=:id ");
    $req->execute(array(
 "id" =>$id ,   "budget_id" =>$budget_id ,   "credit_note_id" =>$credit_note_id ,   "client_id" =>$client_id ,   "seller_id" =>$seller_id ,   "date" =>$date ,   "date_registre" =>$date_registre ,   "total" =>$total ,   "tax" =>$tax ,   "advance" =>$advance ,   "balance" =>$balance ,   "comments" =>$comments ,   "comments_private" =>$comments_private ,   "r1" =>$r1 ,   "r2" =>$r2 ,   "r3" =>$r3 ,   "fc" =>$fc ,   "date_update" =>$date_update ,   "days" =>$days ,   "ce" =>$ce ,   "key" =>$key ,   "status" =>$status ,  
                

));
}

function expenses_add($budget_id ,  $credit_note_id ,  $client_id ,  $seller_id ,  $date ,  $date_registre ,  $total ,  $tax ,  $advance ,  $balance ,  $comments ,  $comments_private ,  $r1 ,  $r2 ,  $r3 ,  $fc ,  $date_update ,  $days ,  $ce ,  $key ,  $status   ) {
    global $db;
    $req = $db->prepare(" INSERT INTO `expenses` ( `id` ,   `budget_id` ,   `credit_note_id` ,   `client_id` ,   `seller_id` ,   `date` ,   `date_registre` ,   `total` ,   `tax` ,   `advance` ,   `balance` ,   `comments` ,   `comments_private` ,   `r1` ,   `r2` ,   `r3` ,   `fc` ,   `date_update` ,   `days` ,   `ce` ,   `key` ,   `status`   )
                                       VALUES  (:id ,  :budget_id ,  :credit_note_id ,  :client_id ,  :seller_id ,  :date ,  :date_registre ,  :total ,  :tax ,  :advance ,  :balance ,  :comments ,  :comments_private ,  :r1 ,  :r2 ,  :r3 ,  :fc ,  :date_update ,  :days ,  :ce ,  :key ,  :status   ) ");

    $req->execute(array(

 "id" => null ,  
 "budget_id" => $budget_id ,  
 "credit_note_id" => $credit_note_id ,  
 "client_id" => $client_id ,  
 "seller_id" => $seller_id ,  
 "date" => $date ,  
 "date_registre" => $date_registre ,  
 "total" => $total ,  
 "tax" => $tax ,  
 "advance" => $advance ,  
 "balance" => $balance ,  
 "comments" => $comments ,  
 "comments_private" => $comments_private ,  
 "r1" => $r1 ,  
 "r2" => $r2 ,  
 "r3" => $r3 ,  
 "fc" => $fc ,  
 "date_update" => $date_update ,  
 "days" => $days ,  
 "ce" => $ce ,  
 "key" => $key ,  
 "status" => $status   
                        
            )
    );
    
     return $db->lastInsertId();
}



function expenses_search($txt) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT * FROM expenses 
    
            WHERE id like :txt OR id like :txt
OR budget_id like :txt
OR credit_note_id like :txt
OR client_id like :txt
OR seller_id like :txt
OR date like :txt
OR date_registre like :txt
OR total like :txt
OR tax like :txt
OR advance like :txt
OR balance like :txt
OR comments like :txt
OR comments_private like :txt
OR r1 like :txt
OR r2 like :txt
OR r3 like :txt
OR fc like :txt
OR date_update like :txt
OR days like :txt
OR ce like :txt
OR key like :txt
OR status like :txt
                           
");
    $req->execute(array(
        "txt" => "%$txt%"
    ));
    $data = $req->fetchall();
    return $data;
}



function expenses_select($k, $v, $selected="", $disabled=array()) {    
    $c = "";    
    foreach (expenses_list() as $key => $value) {        
        $s = ($selected == $value[$k])?" selected  ":"";       
        $d = ( in_array($value[$k], $disabled )) ? " disabled ":"";                        
        $c .= "<option value=\"$value[$k]\" $s $d >". ucfirst($value[$v])."</option>" ;
    }    
    echo  $c;     
}
function expenses_is_id($id){
     return true;
}

function expenses_is_budget_id($budget_id){
     return true;
}

function expenses_is_credit_note_id($credit_note_id){
     return true;
}

function expenses_is_client_id($client_id){
     return true;
}

function expenses_is_seller_id($seller_id){
     return true;
}

function expenses_is_date($date){
     return true;
}

function expenses_is_date_registre($date_registre){
     return true;
}

function expenses_is_total($total){
     return true;
}

function expenses_is_tax($tax){
     return true;
}

function expenses_is_advance($advance){
     return true;
}

function expenses_is_balance($balance){
     return true;
}

function expenses_is_comments($comments){
     return true;
}

function expenses_is_comments_private($comments_private){
     return true;
}

function expenses_is_r1($r1){
     return true;
}

function expenses_is_r2($r2){
     return true;
}

function expenses_is_r3($r3){
     return true;
}

function expenses_is_fc($fc){
     return true;
}

function expenses_is_date_update($date_update){
     return true;
}

function expenses_is_days($days){
     return true;
}

function expenses_is_ce($ce){
     return true;
}

function expenses_is_key($key){
     return true;
}

function expenses_is_status($status){
     return true;
}



function expenses_add_by_client_id($client_id, $code, $status, $budget_id = null) {
    global $db;
    
    
    $req = $db->prepare(" INSERT INTO `expenses` ( `client_id`, `code`, `status`   )
                                       VALUES  (:client_id , :code,  :status  ) ");
    $req->execute(array(
        "client_id" => $client_id,
        "code"=>$code, 
        "status" => $status
            )
    );            
    return $db->lastInsertId();
}

function expenses_search_by_id($id) {
    global $db;
    $req = $db->prepare("SELECT * FROM expenses WHERE id= ? ");
    $req->execute(array($id));
    $data = $req->fetchall();
    return $data;
}
function expenses_search_by_code($code) {
    global $db;
    $req = $db->prepare("SELECT * FROM expenses WHERE status= ? ");
    $req->execute(array($code));
    $data = $req->fetchall();
    return $data;
}

function expenses_search_by_client_id($client_id) {
    global $db;
    $req = $db->prepare("SELECT * FROM expenses WHERE client_id= ? ");
    $req->execute(array($client_id));
    $data = $req->fetchall();
    return $data;
}
/**
 * Facturas en status registradas, segun cliente y typo
 * @global type $db
 * @param type $client_id
 * @param type $type [M, I]
 * @return type
 */
function expenses_search_registre_by_cliente_id_type($client_id, $type) {
    global $db;
    $req = $db->prepare("SELECT id FROM expenses WHERE type= :type AND ( client_id = :client_id AND :status = :status )");
    $req->execute(array(
        "client_id" => $client_id, 
        "type"=>$type,
        "status"=>10
    ));
    $data = $req->fetch();
    return (isset($data[0]))?$data[0]: false;
}

function expenses_search_by_client_id_type_status($client_id, $type, $status) {
    global $db;
    $req = $db->prepare("SELECT * FROM expenses WHERE type= :type AND ( client_id = :client_id AND :status = :status )");
    $req->execute(array(
        "client_id" => $client_id, 
        "type"=>$type,
        "status"=>$status
    ));
    $data = $req->fetchall();
    return (isset($data))?$data: false;
}



function expenses_comments_update($expense_id, $comments) {
    global $db;
    $req = $db->prepare(" UPDATE expenses SET comments=:comments WHERE id=:id  ");
    $req->execute(array(
        "id" => $expense_id,
        "comments" => $comments
            )
    );
    //return $db->lastInsertId();
}



function expenses_update_ce($expense_id, $ce) {
    global $db;
    $req = $db->prepare(" UPDATE expenses SET ce=:ce WHERE id=:id  ");
    $req->execute(array(
        "id" => $expense_id,
        "ce" => $ce
            )
    );
    //return $db->lastInsertId();
}
/**
 * Recalcula la suma de los items de una factura y los registra en la factura 
 * @global type $db
 * @param type $expense_id
 * @param type $ce
 */
function expenses_update_total_expense($expense_id) {
    global $db;
    $req = $db->prepare("UPDATE expenses SET total= (SELECT SUM(price) FROM expense_lines WHERE expense_id=:id ), tax =(SELECT SUM(price) FROM expense_lines WHERE expense_id=:id ) WHERE id=:id  ");
    $req->execute(array(
        "id" => $expense_id,        
            )
    );
    //return $db->lastInsertId();
}





function expenses_update_type($expense_id, $type) {
    global $db;
    $req = $db->prepare(" UPDATE expenses SET type=:type WHERE id=:id  ");
    $req->execute(array(
        "id" => $expense_id,
        "type" => $type
            )
    );
    //return $db->lastInsertId();
}

function expenses_update_credit_note_id($expense_id, $credit_note_id) {
    global $db;
    $req = $db->prepare(" UPDATE expenses SET credit_note_id=:credit_note_id WHERE id=:id  ");
    $req->execute(array(
        "id" => $expense_id,
        "credit_note_id" => $credit_note_id
            )
    );
    //return $db->lastInsertId();
}


function expenses_update_total_tax($id, $total, $tax) {
    global $db;
    $req = $db->prepare(" UPDATE expenses SET total=:total, tax=:tax WHERE id=:id  ");
    $req->execute(array(
        "total" => $total,
        "tax" => $tax,
        "id" => $id
            )
    );
    //return $db->lastInsertId();
}
function expenses_update_total_advance($id, $advance) {
    global $db;
    $req = $db->prepare(" UPDATE expenses SET advance=:advance WHERE id=:id  ");
    $req->execute(array(
        "advance" => $advance,        
        "id" => $id
            )
    );
    //return $db->lastInsertId();
}
function expenses_change_status_to($id, $status) {
    global $db;
    $req = $db->prepare(" UPDATE expenses SET status=:status WHERE id=:id  ");
    $req->execute(array(
        "status" => $status,        
        "id" => $id
            )
    );
    //return $db->lastInsertId();
}
function expenses_modal_reminder_send($r, $expense_id){
    include view("expenses","modal_reminder_send"); 
}


function expenses_total_by_status($status) {
    global $db;
    $req = $db->prepare(" SELECT COUNT(*)  FROM expenses  WHERE status=?  ");
    $req->execute(array($status));
    $data = $req->fetch();
    return $data[0];
    
}

function expenses_search_by_budget_id($budget_id) {
    global $db;
    $req = $db->prepare("SELECT * FROM expenses WHERE budget_id= ? ");
    $req->execute(array($budget_id));
    $data = $req->fetchall();
    return $data;
}

function expenses_total_expensed_budget_id($budget_id) {
    global $db;
    $req = $db->prepare("SELECT SUM(total + tax) as total FROM expenses WHERE budget_id= ? ");
    $req->execute(array($budget_id));
    $data = $req->fetchall();
    return doubleval($data[0][0]);
}

function expenses_update_billing_address($expense_id, $new_address_json) {
    global $db;
    $req = $db->prepare(" UPDATE expenses SET addresses_billing =:addresses_billing WHERE id=:id  ");
    $req->execute(array(
        "id" => $expense_id,
        "addresses_billing" => $new_address_json
            )
    );    
}

function expenses_update_delivery_address($expense_id, $new_address_json) {
    global $db;
    $req = $db->prepare(" UPDATE expenses SET addresses_delivery =:addresses_delivery WHERE id=:id  ");
    $req->execute(array(
        "id" => $expense_id,
        "addresses_delivery" => $new_address_json
            )
    );
    //return $db->lastInsertId();
}


function expense_status_list_e() {
    global $db;
    $limit = 999;

    $data = null;

    $req = $db->prepare("SELECT * FROM expense_status ORDER BY order_by  LIMIT $limit ");

    $req->execute(array(
        "limit" => $limit
    ));
    $data = $req->fetchall();
    return $data;
}

function expenses_field_code($field, $code) {
    global $db;
    
    $req = $db->prepare("SELECT $field FROM `expenses` WHERE `code`= ?");
    
    $req->execute(array(
        $code
    ));
    
    $data = $req->fetch();
    
    return (isset($data[0]))? $data[0] :  false;
}

function expenses_numberf($id){
    $type = ( expenses_field_id("type", $id) )?expenses_field_id("type", $id):"";; 
    
    echo ( $type == "M" || $type == "I")? "$id - $type" : $id; 
    
    
}

function expenses_search_advanced(
        $client_id, $status, $year, $month, $monthly
        ) {
    global $db;
/////////////
// no facturados unicamente
//    
    if( $monthly ){
        $req = $db->prepare(" SELECT * FROM expenses WHERE client_id =:client_id AND status = :status  AND (date_registre BETWEEN :start AND :end) AND type = :type order by date_registre DESC ");
            $req->execute(array(
                'client_id' => $client_id, 
                'status' => $status,                                
                'start'=>"$year-$month-01 00:00:00", 
                'end'=>"$year-$month-31 23:59:59", 
                'type' => 'M'
        ));
    }else{
        $req = $db->prepare("SELECT * FROM expenses WHERE client_id =:client_id AND status = :status  AND (date_registre BETWEEN :start AND :end) order by date_registre DESC");
            $req->execute(array(
                'client_id' => $client_id, 
                'status' => $status,                                
                'start'=>"$year-$month-01 00:00:00", 
                'end'=>"$year-$month-31 23:59:59"
        ));       
    }
//////////////    
    $data = $req->fetchall();
    return $data;
}




function expense_remove_items_by_budget_id($budget_id) {
    global $db;
    
    $req = $db->prepare(" DELETE  FROM `expense_lines` WHERE `budget_id` = :budget_id ");

    $req->execute(array(
        "budget_id" => $budget_id
    ));
    
    
    
}