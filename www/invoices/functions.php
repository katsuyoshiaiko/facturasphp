<?php
// plugin = invoices
// creation date : 
// 
// 
function invoices_field_id($field, $id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $field FROM invoices WHERE id= ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function invoices_search_by_unique($field, $FieldUnique, $valueUnique) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $field FROM banks WHERE $FieldUnique = ?");
    $req->execute(array($valueUnique));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function invoices_list($limit=null, $start=0) {
    global $db ;

    if( $limit ){
        $sql = "SELECT * FROM `invoices` ORDER BY date DESC, id DESC  Limit :limit OFFSET :start  ";  
    }else{
        $sql = "SELECT * FROM `invoices` ORDER BY date DESC, id DESC   ";  
    }
        
    $query = $db->prepare($sql);
    
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    
    $query->execute(); 
    
    $data = $query->fetchall();
    
    return $data;
    
}
/**
 * 
 * @global type $db
 * @param type $limit
 * @param type $start
 * @return type
 */
function invoices_receivable_by_client($client_id, $limit=null, $start=0) {

    global $db;
    $req = $db->prepare("SELECT * FROM `invoices` WHERE `client_id` = :client_id AND status = 10 OR status = 20 ");
    $req->execute(array(
        "client_id" => $client_id, 
    ));
    $data = $req->fetchall();
    return $data;
    
}

function invoices_stat($limit=null, $start=0) {
    global $db ;

    if( $limit ){
        $sql = "SELECT client_id, SUM(total) as total, SUM(tax) as tva FROM `invoices` GROUP BY client_id ORDER BY id  Limit :limit OFFSET :start  ";  
    }else{
        $sql = "SELECT client_id, SUM(total) as total, SUM(tax) as tva FROM `invoices` GROUP BY client_id    ";  
    }
        
    $query = $db->prepare($sql);
    
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    
    $query->execute(); 
    
    $data = $query->fetchall();
    
    return $data;
    
}

function invoices_details($id) {
    global $db;
    $req = $db->prepare("SELECT * FROM invoices WHERE id= ? ");
    $req->execute(array($id));
    $data = $req->fetch();
    return $data;
}

function invoices_delete($id) {
    global $db;
    $req = $db->prepare("DELETE FROM invoices WHERE id=? ");
    $req->execute(array($id));
}

function invoices_edit($id ,  $budget_id ,  $credit_note_id ,  $client_id ,  $seller_id ,  $date ,  $date_registre ,  $total ,  $tax ,  $advance ,  $balance ,  $comments ,  $comments_private ,  $r1 ,  $r2 ,  $r3 ,  $fc ,  $date_update ,  $days ,  $ce ,  $key ,  $status   ) {

    global $db;
    $req = $db->prepare(" UPDATE invoices SET "
            
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

function invoices_add(
        $budget_id ,  
        $credit_note_id ,  
        $client_id ,  
        $seller_id ,  
        $date ,  $date_registre ,  $total ,  $tax ,  $advance ,  $balance ,  $comments ,  $comments_private ,  $r1 ,  $r2 ,  $r3 ,  $fc ,  $date_update ,  $days ,  $ce ,  $key ,  $status   ) {
    global $db;
    $req = $db->prepare(" INSERT INTO `invoices` ( `id` ,   `budget_id` ,   `credit_note_id` ,   `client_id` ,   `seller_id` ,   `date` ,   `date_registre` ,   `total` ,   `tax` ,   `advance` ,   `balance` ,   `comments` ,   `comments_private` ,   `r1` ,   `r2` ,   `r3` ,   `fc` ,   `date_update` ,   `days` ,   `ce` ,   `key` ,   `status`   )
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



function invoices_search($txt) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT * FROM invoices 
    
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



function invoices_select($k, $v, $selected="", $disabled=array()) {    
    $c = "";    
    foreach (invoices_list() as $key => $value) {        
        $s = ($selected == $value[$k])?" selected  ":"";       
        $d = ( in_array($value[$k], $disabled )) ? " disabled ":"";                        
        $c .= "<option value=\"$value[$k]\" $s $d >". ucfirst($value[$v])."</option>" ;
    }    
    echo  $c;     
}
function invoices_is_id($id){
     return true;
}

function invoices_is_budget_id($budget_id){
     return true;
}

function invoices_is_credit_note_id($credit_note_id){
     return true;
}

function invoices_is_client_id($client_id){
     return true;
}

function invoices_is_seller_id($seller_id){
     return true;
}

function invoices_is_date($date){
     return true;
}

function invoices_is_date_registre($date_registre){
     return true;
}

function invoices_is_total($total){
     return true;
}

function invoices_is_tax($tax){
     return true;
}

function invoices_is_advance($advance){
     return true;
}

function invoices_is_balance($balance){
     return true;
}

function invoices_is_comments($comments){
     return true;
}

function invoices_is_comments_private($comments_private){
     return true;
}

function invoices_is_r1($r1){
     return true;
}

function invoices_is_r2($r2){
     return true;
}

function invoices_is_r3($r3){
     return true;
}

function invoices_is_fc($fc){
     return true;
}

function invoices_is_date_update($date_update){
     return true;
}

function invoices_is_days($days){
     return true;
}

function invoices_is_ce($ce){
     return true;
}

function invoices_is_key($key){
     return true;
}

function invoices_is_status($status){
     return true;
}


/**
 * Poner en lugares donde no necesito explicar el motivo 
 * Com en la barra nav
 * @param type $invoices_id
 * @return boolean
 */
function invoices_can_be_edit($invoices_id) {    
    // determina si una factura puede ser editada    
    if( ! $invoices_id ){
        return false;
    }
    
    $status = invoices_field_id("status", $invoices_id); 
        
    switch ($status) {
        case 0:
            $can = false; 
            break;
        
        case 10:
            $can = true; 
            break;
        
        case 20:
            $can = true; 
            break;
        
        case 30:
            $can = false; 
            break;
        
        case -10:
            $can = false; 
            break;
        
        case -20:
            $can = false; 
            break;

        default:
            $can = false; 
            break;
    }
    
    return $can ;
    
}

function invoices_add_by_client_id($client_id , $code , $date_expiration, $status , $budget_id = null) {
    global $db ;
    $req = $db->prepare(
            "INSERT INTO `invoices` (`client_id`, `date`, `date_expiration`, `code`, `status`   )
                            VALUES  (:client_id , :date , :date_expiration,  :code,  :status  ) ") ;
    $req->execute(array(
        "client_id" => $client_id ,
        "date" => date("Y-m-d") ,
        "date_expiration" => $date_expiration ,
        "code" => $code ,
        "status" => $status
            )
    ) ;
    return $db->lastInsertId() ;
}

function invoices_add_individual_by_client_id($client_id , $ab , $ad , $code , $status , $budget_id) {
    global $db ;
    $req = $db->prepare(
            "INSERT INTO `invoices` ( `client_id`, `date`, `budget_id`, `addresses_billing`, `addresses_delivery`, `code`, `type`, `status`   )
                         VALUES    (  :client_id , :date , :budget_id, :addresses_billing, :addresses_delivery,  :code,  :type,  :status  ) ") ;
    $req->execute(array(
        "client_id" => $client_id ,
        "date" => date("Y-m-d") ,
        "budget_id" => $budget_id ,
        "addresses_billing" => $ab ,
        "addresses_delivery" => $ad ,
        "code" => $code ,
        "type" => "I" ,
        "status" => $status
            )
    ) ;


    return $db->lastInsertId() ;
}

function invoices_search_by_id($id) {
    global $db ;
    $req = $db->prepare("SELECT * FROM invoices WHERE id= ? ") ;
    $req->execute(array( $id )) ;
    $data = $req->fetchall() ;
    return $data ;
}

function invoices_search_by_code($code) {
    global $db ;
    $req = $db->prepare("SELECT * FROM invoices WHERE status= ? ") ;
    $req->execute(array( $code )) ;
    $data = $req->fetchall() ;
    return $data ;
}
function invoices_search_by_multi_code($code_array) {
    global $db ;
    $req = $db->prepare("SELECT * FROM invoices WHERE status IN (" . implode(',', $code_array) . ") ") ;
    $req->execute(array( 
        //"codes" => $code_array     
        )) ;
    
    $data = $req->fetchall() ;
    return $data ;
}

function invoices_search_by_client_id($client_id) {
    global $db ;
    $req = $db->prepare("SELECT * FROM invoices WHERE client_id= ? ") ;
    $req->execute(array( $client_id )) ;
    $data = $req->fetchall() ;
    return $data ;
}

/**
 * Facturas en status registradas, segun cliente y typo
 * @global type $db
 * @param type $client_id
 * @param type $type [M, I]
 * @return type
 */
function invoices_search_registre_by_cliente_id_type($client_id , $type) {
    global $db ;
    $req = $db->prepare("SELECT id FROM invoices WHERE type= :type AND ( client_id = :client_id AND :status = :status )") ;
    $req->execute(array(
        "client_id" => $client_id ,
        "type" => $type ,
        "status" => 10
    )) ;
    $data = $req->fetch() ;
    return (isset($data[0])) ? $data[0] : false ;
}

function invoices_search_by_year_month($year , $month) {
    global $db ;
    $req = $db->prepare(
        "   SELECT * 
            FROM invoices 
            WHERE 
            (YEAR(date) =:year AND MONTH(date)=:month)             
            ORDER BY date, id DESC
                         
        ") ;
    $req->execute(array(
        "year" => $year ,
        "month" => $month         
    )) ;
    $data = $req->fetchall() ;
    return (isset($data)) ? $data : false ;
}

function invoices_search_by_year_trimestre($year , $tri) {
    global $db ;
    
    switch ($tri) {
        case 1: // enero, feb, marzo
            $m1 = 1; 
            $m2 = 2; 
            $m3 = 3; 
            break;
        case 2: // abril, mayo, junio
            $m1 = 4; 
            $m2 = 5; 
            $m3 = 6; 
            break;
        case 3: // julio, agos, sept
            $m1 = 7; 
            $m2 = 8; 
            $m3 = 9; 
            break;
        case 4: // oct, nov , dic
            $m1 = 10; 
            $m2 = 11; 
            $m3 = 12; 
            break;

        default:
            break;
    }
    
    $req = $db->prepare(
        "   SELECT * 
            FROM invoices 
            WHERE YEAR(date) =:year AND 
            (
            MONTH(date)=:m1 OR 
            MONTH(date)=:m2 OR 
            MONTH(date)=:m3 
            )
            ORDER BY date, id DESC
                         
        ") ;
    $req->execute(array(
        "year" => $year ,
        "m1" => $m1,         
        "m2" => $m2,         
        "m3" => $m3,         
    )) ;
    $data = $req->fetchall() ;
    return (isset($data)) ? $data : false ;
}

function invoices_search_by_client_id_type_status($client_id , $type , $status) {
    global $db ;
    $req = $db->prepare("SELECT * FROM invoices WHERE type= :type AND ( client_id = :client_id AND status = :status )") ;
    $req->execute(array(
        "client_id" => $client_id ,
        "type" => $type ,
        "status" => $status
    )) ;
    $data = $req->fetchall() ;
    return (isset($data)) ? $data : false ;
}

function invoices_comments_update($invoice_id , $comments) {
    global $db ;
    $req = $db->prepare(" UPDATE invoices SET comments=:comments WHERE id=:id  ") ;
    $req->execute(array(
        "id" => $invoice_id ,
        "comments" => $comments
            )
    ) ;
    //return $db->lastInsertId();
}

function invoices_update_ce($invoice_id , $ce) {
    global $db ;
    $req = $db->prepare(" UPDATE invoices SET ce=:ce WHERE id=:id  ") ;
    $req->execute(array(
        "id" => $invoice_id ,
        "ce" => $ce
            )
    ) ;
    //return $db->lastInsertId();
}



/**
 * Recalcula la suma de los items de una factura y los registra en la factura 
 * @global type $db
 * @param type $invoice_id
 * @param type $ce
 */
function invoices_update_total_invoicexxxxxxxxxxxxxx($invoice_id) {
    /**
     * valtax = (tax/100+1)
     * 
     * if( discounts_mode = '%') 
     *      total_discount = precio - ((precio * discounts)/100)
     * 
     * if( discounts_mode != '%')
     *      total_discount = precio - discounts
     * 
     * 
     * if( discounts_mode = '%' , price - ((price * discounts)/100) , price - discounts) as total_discount 
     * 
     * 
     * (quantity * (price - if( discounts_mode = '%' , price - ((price * discounts)/100) , price - discounts))) * (tax/100+1)
     */
    
    
    //if( discounts_mode = '%' , price - ((price * discounts)/100) , price - discounts))) * (tax/100+1)) 
    
    global $db ;
    $req = $db->prepare("
            UPDATE invoices 
            SET 
            
            total = (SELECT SUM(quantity * price) FROM invoice_lines WHERE invoice_id=:id ), 
            
            tax   = (SELECT SUM(quantity * price) FROM invoice_lines WHERE invoice_id=:id )
        
            WHERE id=:id  ") ;
                
    
    $req->execute(array(
        "id" => $invoice_id ,
            )
    ) ;
    //return $db->lastInsertId();
}

function invoices_update_type($invoice_id , $type) {
    global $db ;
    $req = $db->prepare(" UPDATE invoices SET type=:type WHERE id=:id  ") ;
    $req->execute(array(
        "id" => $invoice_id ,
        "type" => $type
            )
    ) ;
    //return $db->lastInsertId();
}

function invoices_update_credit_note_id($invoice_id , $credit_note_id) {
    global $db ;
    $req = $db->prepare(" UPDATE invoices SET credit_note_id=:credit_note_id WHERE id=:id  ") ;
    $req->execute(array(
        "id" => $invoice_id ,
        "credit_note_id" => $credit_note_id
            )
    ) ;
    //return $db->lastInsertId();
}

function invoices_update_total_tax($id , $total , $tax) {
    global $db ;
    $req = $db->prepare(" UPDATE invoices SET total=:total, tax=:tax WHERE id=:id  ") ;
    $req->execute(array(
        "total" => $total ,
        "tax" => $tax ,
        "id" => $id
            )
    ) ;
    //return $db->lastInsertId();
}

function invoices_update_total_advance($id , $advance) {
    global $db ;
    $req = $db->prepare(" UPDATE invoices SET advance=:advance WHERE id=:id  ") ;
    $req->execute(array(
        "advance" => $advance ,
        "id" => $id
            )
    ) ;
    //return $db->lastInsertId();
}

function invoices_change_status_to($id , $status) {
    global $db ;
    $req = $db->prepare(" UPDATE invoices SET status=:status WHERE id=:id  ") ;
    $req->execute(array(
        "status" => $status ,
        "id" => $id
            )
    ) ;
    //return $db->lastInsertId();
}

function invoices_modal_reminder_send($r , $invoice_id) {
    include view("invoices" , "modal_reminder_send") ;
}

function invoices_total_by_status($status) {
    global $db ;
    $req = $db->prepare(" SELECT COUNT(*)  FROM invoices  WHERE status=?  ") ;
    $req->execute(array( $status )) ;
    $data = $req->fetch() ;
    return $data[0] ;
}

function invoices_search_by_budget_id($budget_id) {
    global $db ;
    $req = $db->prepare("SELECT * FROM invoices WHERE budget_id= ? ") ;
    $req->execute(array( $budget_id )) ;
    $data = $req->fetchall() ;
    return $data ;
}

function invoices_total_invoiced_budget_id($budget_id) {
    global $db ;
    $req = $db->prepare("SELECT SUM(total + tax) as total FROM invoices WHERE budget_id= ? ") ;
    $req->execute(array( $budget_id )) ;
    $data = $req->fetchall() ;
    return doubleval($data[0][0]) ;
}

function invoices_update_billing_address($invoice_id , $new_address_json) {
    global $db ;
    $req = $db->prepare(" UPDATE `invoices` SET `addresses_billing` =:addresses_billing WHERE `id`=:id  ") ;
    $req->execute(array(
        "id" => $invoice_id ,
        "addresses_billing" => $new_address_json
            )
    ) ;
}

function invoices_update_delivery_address($invoice_id , $new_address_json) {
    global $db ;
    $req = $db->prepare(" UPDATE invoices SET addresses_delivery =:addresses_delivery WHERE id=:id  ") ;
    $req->execute(array(
        "id" => $invoice_id ,
        "addresses_delivery" => $new_address_json
            )
    ) ;
    //return $db->lastInsertId();
}
function invoices_update_date($invoice_id , $new_date) {
    global $db ;
    $req = $db->prepare(" UPDATE invoices SET date =:new_date WHERE id=:id  ") ;
    $req->execute(array(
        "id" => $invoice_id ,
        "new_date" => $new_date
            )
    ) ;
    //return $db->lastInsertId();
}

function invoice_status_list_e() {
    global $db ;
    $limit = 999 ;

    $data = null ;

    $req = $db->prepare("SELECT * FROM invoice_status ORDER BY order_by  LIMIT $limit ") ;

    $req->execute(array(
        "limit" => $limit
    )) ;
    $data = $req->fetchall() ;
    return $data ;
}

function invoices_field_code($field , $code) {
    global $db ;

    $req = $db->prepare("SELECT $field FROM `invoices` WHERE `code`= ?") ;

    $req->execute(array(
        $code
    )) ;

    $data = $req->fetch() ;

    return (isset($data[0])) ? $data[0] : false ;
}

/**
 * Mustra el numero de factura formateado 
 * @param type $id
 */
function invoices_numberf($id) {
    // saco el ano segun el $id de la factura
    
    $fr = invoices_field_id('date_registre', $id); 
    // ahora saco el ano los primeros 4 caracteres
    
    $y = magia_dates_get_year_from_date($fr); 
    
    $type = ( invoices_field_id("type" , $id) ) ? invoices_field_id("type" , $id) : "" ;
    
    //echo ( $type == "M" || $type == "I") ? "$y:$id:$type" : $id ;
    echo ( $type == "M" ) ? "$y:$id:$type" : "$y:$id" ;
}





function invoices_search_advanced(
        $client_id , $status , $year , $month , $monthly
) {
    global $db ;
/////////////
// no facturados unicamente
//    
    if ( $monthly ) {
        $req = $db->prepare(" SELECT * FROM invoices WHERE client_id =:client_id AND status = :status  AND (date_registre BETWEEN :start AND :end) AND type = :type order by date_registre DESC ") ;
        $req->execute(array(
            'client_id' => $client_id ,
            'status' => $status ,
            'start' => "$year-$month-01 00:00:00" ,
            'end' => "$year-$month-31 23:59:59" ,
            'type' => 'M'
        )) ;
    } else {
        $req = $db->prepare("SELECT * FROM invoices WHERE client_id =:client_id AND status = :status  AND (date_registre BETWEEN :start AND :end) order by date_registre DESC") ;
        $req->execute(array(
            'client_id' => $client_id ,
            'status' => $status ,
            'start' => "$year-$month-01 00:00:00" ,
            'end' => "$year-$month-31 23:59:59"
        )) ;
    }
//////////////    
    $data = $req->fetchall() ;
    return $data ;
}

function invoice_remove_items_by_budget_id($budget_id) {
    global $db ;

    $req = $db->prepare(" DELETE  FROM `invoice_lines` WHERE `budget_id` = :budget_id ") ;

    $req->execute(array(
        "budget_id" => $budget_id
    )) ;
}

// PDF FILES
function invoices_pdf_formated_id($id){
   
    $y = date('Y', strtotime(invoices_field_id("date_registre", $id))); 
// extraigo el año de la factura 
    // la agrego antes del numero 
    return $y . " - " .$id ; 
    
}

function invoice_lines_add_with_budget_id(
        
        $invoice_id , $budget_id,  $code ,  $quantity ,  $description ,  $price ,  $discounts ,  $discounts_mode ,  $tax ,  $order_by ,  $status   
        
        ) {
    global $db;
    $req = $db->prepare(" INSERT INTO `invoice_lines` ( `id` ,   `invoice_id` , `budget_id`,  `code` ,   `quantity` ,   `description` ,   `price` ,   `discounts` ,   `discounts_mode` ,   `tax` ,   `order_by` ,   `status`   )
                                       VALUES  (:id ,  :invoice_id , :budget_id, :code ,  :quantity ,  :description ,  :price ,  :discounts ,  :discounts_mode ,  :tax ,  :order_by ,  :status   ) ");

    $req->execute(array(

 "id" => null ,  
 "invoice_id" => $invoice_id ,  
  "budget_id"=>$budget_id,
 "code" => $code ,  
 "quantity" => $quantity ,  
 "description" => $description ,  
 "price" => $price ,  
 "discounts" => $discounts ,  
 "discounts_mode" => $discounts_mode ,  
 "tax" => $tax ,  
 "order_by" => $order_by ,  
 "status" => $status   
                        
            )
    );
    
     return $db->lastInsertId();
}


function invoices_add_r1($invoice_id) {
    global $db ;
    $req = $db->prepare(" UPDATE invoices SET r1=:r1 WHERE id=:id  ") ;
    $req->execute(array(
        "id" => $invoice_id ,
        "r1" => date("Y-m-d"), 
            )
    ) ;    
}

function invoices_add_r2($invoice_id) {
    global $db ;
    $req = $db->prepare(" UPDATE invoices SET r2=:r2 WHERE id=:id  ") ;
    $req->execute(array(
        "id" => $invoice_id ,
        "r2" => date("Y-m-d"), 
            )
    ) ;    
}

function invoices_add_r3($invoice_id) {
    global $db ;
    $req = $db->prepare(" UPDATE invoices SET r3=:r3 WHERE id=:id  ") ;
    $req->execute(array(
        "id" => $invoice_id ,
        "r3" => date("Y-m-d"), 
            )
    ) ;    
}
function invoices_title_update($invoice_id, $title) {
    global $db ;
    $req = $db->prepare(" UPDATE invoices SET title=:title WHERE id=:id  ") ;
    $req->execute(array(
        "id" => $invoice_id ,
        "title" => $title, 
            )
    ) ;    
}

function invoices_date_expiration_update($invoice_id, $date) {
    global $db ;
    $req = $db->prepare(" UPDATE invoices SET date_expiration=:date_expiration WHERE id=:id  ") ;
    $req->execute(array(
        "id" => $invoice_id ,
        "date_expiration" => $date, 
            )
    ) ;    
}