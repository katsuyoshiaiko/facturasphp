<?php

function budgets_field_id($field, $id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $field FROM budgets WHERE id= ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function budgets_search_by_unique($field, $FieldUnique, $valueUnique) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $field FROM banks WHERE $FieldUnique = ?");
    $req->execute(array($valueUnique));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function budgets_can_be_edit($budget_id) {
    // determina si puede ser editado
    if (!$budget_id) {
        return false;
    }

    $status = budgets_field_id("status", $budget_id);

    switch ($status) {
        case -10: // cancel
            $can = false;
            break;

        case 10: // registred
            $can = true;
            break;

        case 20: // send to customer
            $can = true;
            break;

        case 30: // acepted by customer
            $can = false;
            break;

        case 35: //Invoices created
            $can = false;
            break;

        case 40: //Rejected by customer
            $can = false;
            break;

        default:
            $can = false;
            break;
    }

    return $can;
}

function budgets_list() {
    global $db;
    $limit = 999;

    $data = null;

    $req = $db->prepare("SELECT * FROM budgets ORDER BY date DESC, id DESC LIMIT $limit ");

    $req->execute(array(
        "limit" => $limit
    ));
    $data = $req->fetchall();
    return $data;
}

function budgets_details($id) {
    global $db;
    $req = $db->prepare("SELECT * FROM budgets WHERE id= ? ");
    $req->execute(array($id));
    $data = $req->fetch();
    return $data;
}

function budgets_delete($id) {
    global $db;
    $req = $db->prepare("DELETE FROM budgets WHERE id=? ");
    $req->execute(array($id));
}

function budgets_edit($id, $invoice_id, $credit_note_id, $client_id, $seller_id, $date, $date_registre, $total, $tax, $advance, $balance, $comments, $comments_private, $r1, $r2, $r3, $fc, $date_update, $days, $ce, $key, $status) {

    global $db;
    $req = $db->prepare(" UPDATE budgets SET "
            . "invoice_id=:invoice_id , "
            . "credit_note_id=:credit_note_id , "
            . "client_id=:client_id , "
            . "seller_id=:seller_id , "
            . "date=:date , "
            . "date_registre=:date_registre , "
            . "total=:total , "
            . "tax=:tax , "
            . "advance=:advance , "
            . "balance=:balance , "
            . "comments=:comments , "
            . "comments_private=:comments_private , "
            . "r1=:r1 , "
            . "r2=:r2 , "
            . "r3=:r3 , "
            . "fc=:fc , "
            . "date_update=:date_update , "
            . "days=:days , "
            . "ce=:ce , "
            . "key=:key , "
            . "status=:status  "
            . " WHERE id=:id ");
    $req->execute(array(
        "id" => $id, "invoice_id" => $invoice_id, "credit_note_id" => $credit_note_id, "client_id" => $client_id, "seller_id" => $seller_id, "date" => $date, "date_registre" => $date_registre, "total" => $total, "tax" => $tax, "advance" => $advance, "balance" => $balance, "comments" => $comments, "comments_private" => $comments_private, "r1" => $r1, "r2" => $r2, "r3" => $r3, "fc" => $fc, "date_update" => $date_update, "days" => $days, "ce" => $ce, "key" => $key, "status" => $status,
    ));
}

function budgets_add($invoice_id, $credit_note_id, $client_id, $seller_id, $date, $date_registre, $total, $tax, $advance, $balance, $comments, $comments_private, $r1, $r2, $r3, $fc, $date_update, $days, $ce, $key, $status) {
    global $db;
    $req = $db->prepare(" INSERT INTO `budgets` ( `id` ,   `invoice_id` ,   `credit_note_id` ,   `client_id` ,   `seller_id` ,   `date` ,   `date_registre` ,   `total` ,   `tax` ,   `advance` ,   `balance` ,   `comments` ,   `comments_private` ,   `r1` ,   `r2` ,   `r3` ,   `fc` ,   `date_update` ,   `days` ,   `ce` ,   `key` ,   `status`   )
                                       VALUES  (:id ,  :invoice_id ,  :credit_note_id ,  :client_id ,  :seller_id ,  :date ,  :date_registre ,  :total ,  :tax ,  :advance ,  :balance ,  :comments ,  :comments_private ,  :r1 ,  :r2 ,  :r3 ,  :fc ,  :date_update ,  :days ,  :ce ,  :key ,  :status   ) ");

    $req->execute(array(
        "id" => null,
        "invoice_id" => $invoice_id,
        "credit_note_id" => $credit_note_id,
        "client_id" => $client_id,
        "seller_id" => $seller_id,
        "date" => $date,
        "date_registre" => $date_registre,
        "total" => $total,
        "tax" => $tax,
        "advance" => $advance,
        "balance" => $balance,
        "comments" => $comments,
        "comments_private" => $comments_private,
        "r1" => $r1,
        "r2" => $r2,
        "r3" => $r3,
        "fc" => $fc,
        "date_update" => $date_update,
        "days" => $days,
        "ce" => $ce,
        "key" => $key,
        "status" => $status
            )
    );

    return $db->lastInsertId();
}

function budgets_search($txt) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT * FROM budgets 
    
            WHERE id like :txt OR id like :txt
OR invoice_id like :txt
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

function budgets_select($k, $v, $selected = "", $disabled = array()) {
    $c = "";
    foreach (budgets_list() as $key => $value) {
        $s = ($selected == $value[$k]) ? " selected  " : "";
        $d = ( in_array($value[$k], $disabled)) ? " disabled " : "";
        $c .= "<option value=\"$value[$k]\" $s $d >" . ucfirst($value[$v]) . "</option>";
    }
    echo $c;
}

function budgets_is_id($id) {
    return true;
}

function budgets_is_invoice_id($invoice_id) {
    return true;
}

function budgets_is_credit_note_id($credit_note_id) {
    return true;
}

function budgets_is_client_id($client_id) {
    return true;
}

function budgets_is_seller_id($seller_id) {
    return true;
}

function budgets_is_date($date) {
    return true;
}

function budgets_is_date_registre($date_registre) {
    return true;
}

function budgets_is_total($total) {
    return true;
}

function budgets_is_tax($tax) {
    return true;
}

function budgets_is_advance($advance) {
    return true;
}

function budgets_is_balance($balance) {
    return true;
}

function budgets_is_comments($comments) {
    return true;
}

function budgets_is_comments_private($comments_private) {
    return true;
}

function budgets_is_r1($r1) {
    return true;
}

function budgets_is_r2($r2) {
    return true;
}

function budgets_is_r3($r3) {
    return true;
}

function budgets_is_fc($fc) {
    return true;
}

function budgets_is_date_update($date_update) {
    return true;
}

function budgets_is_days($days) {
    return true;
}

function budgets_is_ce($ce) {
    return true;
}

function budgets_is_key($key) {
    return true;
}

function budgets_is_status($status) {
    return true;
}

function budgets_field_code($field, $code) {
    global $db;

    if (!$code) {
        return false;
    }
    $data = null;
    $req = $db->prepare("SELECT $field FROM budgets WHERE code= ?");
    $req->execute(array(
        $code
    ));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function budgets_add_by_client_id(
        $client_id, $code, $status
) {
    global $db;
    $req = $db->prepare(
            "INSERT INTO `budgets` ( `client_id`, `date`, `code`, `status`   )
                            VALUES  (:client_id , :date , :code,  :status  ) ");
    $req->execute(array(
        "client_id" => $client_id,
        "date" => date("Y-m-d"),
        "code" => $code,
        "status" => $status
            )
    );
    return $db->lastInsertId();
}

function budgets_search_by_id($id) {
    global $db;
    $req = $db->prepare("SELECT * FROM budgets WHERE id= ? ");
    $req->execute(array($id));
    $data = $req->fetchall();
    return $data;
}

function budgets_search_by_code($status) {
    global $db;
    $req = $db->prepare("SELECT * FROM budgets WHERE status = ? order by date_registre DESC");
    $req->execute(array($status));
    $data = $req->fetchall();
    return $data;
}

function budgets_search_by_client_id($client_id) {
    global $db;
    $req = $db->prepare("SELECT * FROM budgets WHERE client_id= ? ORDER BY id DESC ");
    $req->execute(array($client_id));
    $data = $req->fetchall();
    return $data;
}

function budgets_search_by_client_id_status($client_id, $status) {
    global $db;
    $req = $db->prepare("SELECT * FROM budgets WHERE client_id= :client_id AND status = :status ORDER BY id DESC ");
    $req->execute(array(
        "client_id" => $client_id,
        "status" => $status,
    ));
    $data = $req->fetchall();
    return $data;
}

function budgets_search_by_client_id_statussss($client_id, $status) {
    global $db;
    $req = $db->prepare("SELECT * FROM budgets WHERE client_id= :client_id AND status =:status ORDER BY id DESC ");
    $req->execute(array(
        "client_id" => $client_id,
        "status" => $status
    ));
    $data = $req->fetchall();
    return $data;
}

function budgets_search_by_client_id_status_same_addresse($client_id, $status, $addresses_delivery) {
    global $db;
    $req = $db->prepare(
            "SELECT * 
            FROM budgets 
            WHERE client_id= :client_id 
            AND status =:status 
            AND addresses_delivery =:addresses_delivery 
            
            ORDER BY id DESC ");
    $req->execute(array(
        "client_id" => $client_id,
        "status" => $status,
        "addresses_delivery" => $addresses_delivery
    ));
    $data = $req->fetchall();
    return $data;
}

function budgets_search_by_client_id_status_same_addresse_today($client_id, $status, $addresses_delivery) {
    global $db;
    $req = $db->prepare(
            "SELECT * 
            FROM budgets 
            WHERE client_id= :client_id 
            AND status =:status 
            AND addresses_delivery =:addresses_delivery 
            AND 
            ( day(date_registre)=day(now()) AND month(date_registre)=month(now()) AND year(date_registre)=year(now()) )
            
            ORDER BY id DESC ");
    $req->execute(array(
        "client_id" => $client_id,
        "status" => $status,
        "addresses_delivery" => $addresses_delivery
    ));
    $data = $req->fetchall();
    return $data;
}

function budgets_comments_update($budget_id, $comments) {
    global $db;
    $req = $db->prepare(" UPDATE budgets SET comments=:comments WHERE id=:id  ");
    $req->execute(array(
        "id" => $budget_id,
        "comments" => $comments
            )
    );
    //return $db->lastInsertId();
}

function budgets_update_ce($budget_id, $ce) {
    global $db;
    $req = $db->prepare(" UPDATE budgets SET ce=:ce WHERE id=:id  ");
    $req->execute(array(
        "id" => $budget_id,
        "ce" => $ce
            )
    );
    //return $db->lastInsertId();
}

function budgets_update_seller($budget_id, $seller_id) {
    global $db;
    $req = $db->prepare(" UPDATE budgets SET seller_id=:seller_id WHERE id=:id  ");
    $req->execute(array(
        "id" => $budget_id,
        "seller_id" => $seller_id
            )
    );
    //return $db->lastInsertId();
}

function budgets_update_totalsxxxxxxxx($budget_id) {
    global $db;

    $req = $db->prepare(
            " UPDATE budgets SET 
             total= (SELECT SUM(quantity*price)  FROM `budget_lines` WHERE `budget_id` = :id ) , 
             tax=   (SELECT SUM((( quantity * price ) * tax) / 100) FROM `budget_lines` WHERE `budget_id` = :id )  
            
            WHERE id=:id  ");
    //$req = $db->prepare(" UPDATE budgets SET total=:total , tax=:tax WHERE id=:id  ");


    $req->execute(array(
        "id" => $budget_id
            )
    );
    //return $db->lastInsertId();
}

function budgets_update_total_tax($id, $total, $tax) {
    global $db;
    $req = $db->prepare(" UPDATE budgets SET total=:total, tax=:tax WHERE id=:id  ");
    $req->execute(array(
        "total" => $total,
        "tax" => $tax,
        "id" => $id
            )
    );
    //return $db->lastInsertId();
}

function budgets_update_total_advance($id, $advance) {
    global $db;
    $req = $db->prepare(" UPDATE budgets SET advance=:advance WHERE id=:id  ");
    $req->execute(array(
        "advance" => $advance,
        "id" => $id
            )
    );
    //return $db->lastInsertId();
}

function budgets_change_status_to($id, $status) {
    global $db;
    $req = $db->prepare(" UPDATE budgets SET status=:status WHERE id=:id  ");
    $req->execute(array(
        "status" => $status,
        "id" => $id
            )
    );
    //return $db->lastInsertId();
}

function budgets_change_date($id, $date) {
    global $db;
    $req = $db->prepare(
            "UPDATE budgets 
            SET date=:date 
            WHERE id=:id          
        ");
    $req->execute(array(
        "date" => $date,
        "id" => $id
            )
    );
}

function budgets_modal_reminder_send($r, $budget_id) {
    include view("budgets", "modal_reminder_send");
}

function budgets_copy_to_invoice($budget_id, $key) {
    global $db;

    $req = $db->prepare(" INSERT INTO `invoices` 
            
            (`budget_id`, `credit_note_id`, `client_id`, `seller_id`, `addresses_billing`, `addresses_delivery`, 
            `date`, `date_registre`, `total`, `tax`, `advance`, `balance`, 
            `comments`, `comments_private`, `r1`, `r2`, `r3`, `fc`, 
            `date_update`, `days`, `ce`, `key`, `status`) 
            
            SELECT   
            
            null,         `credit_note_id`, `client_id`, `seller_id`, `addresses_billing`, `addresses_delivery`, 
            `date`, `date_registre`, `total`, `tax`, `advance`, `balance`, 
            `comments`, `comments_private`, `r1`, `r2`, `r3`, `fc`, 
            `date_update`, `days`, `ce`, :key, `status`  
            
            FROM budgets WHERE id=:id  ");


    $req->execute(array(
        "id" => $budget_id,
        "key" => $key
    ));
    return $db->lastInsertId();
}

function budgets_copy_items_to_invoice_items($budget_id, $invoice_id) {
    global $db;

    $req = $db->prepare(
            "INSERT INTO `invoice_lines` 
            (`invoice_id`, `budget_id`, `code`, `quantity`, `description`, `price`, `discounts`, `discounts_mode`, `tax`, `order_by`, `status`) SELECT 
            :invoice_id,  :budget_id,   `code`, `quantity`, `description`, `price`, `discounts`, `discounts_mode`, `tax`, `order_by`, `status` FROM `budget_lines`  WHERE `budget_id` = :budget_id  ");

    $req->execute(array(
        "budget_id" => $budget_id,
        "invoice_id" => $invoice_id
    ));

    return $db->lastInsertId();
}

function budgets_update_invoice_id($budget_id, $invoice_id) {
    global $db;
    $req = $db->prepare(" UPDATE budgets SET invoice_id=:invoice_id WHERE id=:id  ");
    $req->execute(array(
        "id" => $budget_id,
        "invoice_id" => $invoice_id
            )
    );
    //return $db->lastInsertId();
}

function budgets_total_by_client_id($client_id) {
    global $db;
    $data = 0;
    $req = $db->prepare('SELECT COUNT(*) FROM budgets WHERE client_id= ?');
    $req->execute(array($client_id));
    $data = $req->fetch();
    return $data[0];
}

function budgets_total_by_status($status) {
    global $db;
    $req = $db->prepare(" SELECT COUNT(*)  FROM budgets  WHERE status=?  ");
    $req->execute(array($status));
    $data = $req->fetch();
    return $data[0];
}

function budgets_total_by_budget_id($id) {
    global $db;
    $req = $db->prepare("SELECT SUM(total + tax) as total FROM budgets WHERE id= ? ");
    $req->execute(array($id));
    $data = $req->fetchall();
    return doubleval($data[0][0]);
}

function budgets_total_by_client_id_status($client_id, $status) {
    global $db;
    $data = 0;
    $req = $db->prepare('SELECT COUNT(*) FROM budgets WHERE client_id= :client_id AND status = :status');
    $req->execute(array(
        "client_id" => $client_id,
        "status" => $status
    ));
    $data = $req->fetch();
    return $data[0];
}

function budgets_search_by_client($client_id) {
    global $db;
    $req = $db->prepare("SELECT * FROM budgets WHERE client_id = ? order by date_registre DESC");
    $req->execute(array($client_id));
    $data = $req->fetchall();
    return $data;
}

function budgets_search_by_client_status($client_id, $status) {
    global $db;
    $req = $db->prepare("SELECT * FROM budgets WHERE client_id =:client_id AND status = :status order by date_registre DESC");
    $req->execute(array(
        'client_id' => $client_id,
        'status' => $status
    ));
    $data = $req->fetchall();
    return $data;
}

function budgets_search_advanced(
        $client_id, $status, $year, $month, $unbilled
) {
    global $db;
/////////////
// no facturados unicamente
//    
    if ($unbilled) {
        $req = $db->prepare("SELECT * FROM budgets WHERE client_id =:client_id AND status = :status AND id NOT IN (SELECT budget_id FROM `budgets_invoices` ) ");
        $req->execute(array(
            'client_id' => $client_id,
            'status' => $status,
        ));
    } else {
        $req = $db->prepare("SELECT * FROM budgets WHERE client_id =:client_id AND status = :status  AND (date_registre BETWEEN :start AND :end) order by date_registre DESC");
        $req->execute(array(
            'client_id' => $client_id,
            'status' => $status,
            'start' => "$year-$month-01 00:00:00",
            'end' => "$year-$month-31 23:59:59"
        ));
    }
//////////////    
    $data = $req->fetchall();
    return $data;
}

function budgets_search_by_all(
        $client_id, $status, $year, $month
) {
    global $db;

    // si no envio cliente 
    if ($client_id == "all") {
        if ($status == "all") {
            /////////////////////////////////
            $req = $db->prepare("SELECT * FROM budgets WHERE  (date_registre BETWEEN :start AND :end) order by date_registre DESC");
            $req->execute(array(
                // 'client_id' => $client_id, 
                // 'status' => $status,                                
                'start' => "$year-$month-01 00:00:00",
                'end' => "$year-$month-31 23:59:59"
            ));
            ///////////////////////////////
        } else { // un status espeficico
            ///////////////////////////////
            $req = $db->prepare("SELECT * FROM budgets WHERE status = :status  AND (date_registre BETWEEN :start AND :end) order by date_registre DESC");
            $req->execute(array(
                //    'client_id' => $client_id, 
                'status' => $status,
                'start' => "$year-$month-01 00:00:00",
                'end' => "$year-$month-31 23:59:59"
            ));
            ///////////////////////////////
        }
    } else { // si un especifico
        if ($status == "all") {
            /////////////////////////////////
            $req = $db->prepare("SELECT * FROM budgets WHERE client_id =:client_id AND (date_registre BETWEEN :start AND :end) order by date_registre DESC");
            $req->execute(array(
                'client_id' => $client_id,
                // 'status' => $status,                                
                'start' => "$year-$month-01 00:00:00",
                'end' => "$year-$month-31 23:59:59"
            ));
            ///////////////////////////////
        } else { // un status espeficico
            ///////////////////////////////
            $req = $db->prepare("SELECT * FROM budgets WHERE client_id =:client_id AND status = :status  AND (date_registre BETWEEN :start AND :end) order by date_registre DESC");
            $req->execute(array(
                'client_id' => $client_id,
                'status' => $status,
                'start' => "$year-$month-01 00:00:00",
                'end' => "$year-$month-31 23:59:59"
            ));
            ///////////////////////////////
        }
    }



//        $req = $db->prepare("SELECT * FROM budgets WHERE client_id =:client_id AND status = :status  AND (date_registre BETWEEN :start AND :end) order by date_registre DESC");
//            $req->execute(array(
//                'client_id' => $client_id, 
//                'status' => $status,                                
//                'start'=>"$year-$month-01 00:00:00", 
//                'end'=>"$year-$month-31 23:59:59"
//        ));       
//////////////    
    $data = $req->fetchall();
    return $data;
}

function budgets_not_invoiced_by_client_id($client_id, $status) {
    global $db;
    $req = $db->prepare("SELECT * FROM budgets WHERE client_id =:client_id AND status = :status AND id NOT IN (SELECT budget_id FROM `budgets_invoices` ) ORDER BY date_registre ");
    $req->execute(array(
        'client_id' => $client_id,
        'status' => $status,
    ));
    $data = $req->fetchall();
    return $data;
}

/**
 * Invoices by company, headoffice and offices
 * @global type $db
 * @param type $client_id
 * @param type $status
 * @return type
 */
function budgets_not_invoiced_by_company_id($company_id, $status) {
    // debo sacar la lista de oficinas de una compania, 
    // y si una orden tiene el client_id entre esas id, envio 



    global $db;
    $req = $db->prepare("SELECT * FROM budgets WHERE client_id IN (SELECT id FROM contacts WHERE owner_id =:company_id )  AND status = :status AND id NOT IN (SELECT budget_id FROM `budgets_invoices` ) ORDER BY date_registre ");
    $req->execute(array(
        'company_id' => $company_id,
        'status' => $status,
    ));
    $data = $req->fetchall();
    return $data;
}

function budgets_on_this_invoice($invoice_id) {
    global $db;
    $req = $db->prepare("SELECT * FROM budgets WHERE id IN (SELECT budget_id FROM `budgets_invoices` WHERE invoice_id = :invoice_id ) ");
    $req->execute(array(
        'invoice_id' => $invoice_id
    ));
    $data = $req->fetchall();
    return $data;
}

# son presupuestos que no estan facturadas, 

function budgets_search_by_not_invoiced($client_id, $y, $m) {
    global $db;
    $req = $db->prepare("SELECT * FROM budgets WHERE client_id = :client_id AND invoice_id = null order by date_registre DESC");
    $req->execute(array(
        'cliente_id' => $client_id
    ));
    $data = $req->fetchall();
    return $data;
}

function budgets_update_delivery_address($budget_id, $new_address) {
    global $db;
    $req = $db->prepare(" UPDATE budgets SET addresses_delivery =:addresses_delivery WHERE id=:id  ");
    $req->execute(array(
        "id" => $budget_id,
        "addresses_delivery" => $new_address
            )
    );
    //return $db->lastInsertId();
}

function budgets_update_billing_address($budget_id, $new_address) {
    global $db;
    $req = $db->prepare(" UPDATE budgets SET addresses_billing =:addresses_billing WHERE id=:id  ");
    $req->execute(array(
        "id" => $budget_id,
        "addresses_billing" => $new_address
            )
    );
    //return $db->lastInsertId();
}

function budgets_get_year_1_budget() {
    return 2000;
}
