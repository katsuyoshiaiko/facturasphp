<?php
/*
function orders_list_by_company_id($company_id) {
    global $db;
    $req = $db->prepare('SELECT * FROM orders WHERE company_id = ? ORDER BY id DESC');
    $req->execute(array($company_id));
    $data = $req->fetchall();
    return $data;
}
function orders_list_by_patient_id($patient_id) {
    global $db;
    $req = $db->prepare('SELECT * FROM orders WHERE patient_id = ? ORDER BY id DESC');
    $req->execute(array($patient_id));
    $liste_info = $req->fetchall();
    return $liste_info;
}

function orders_list_by_status($code) {
    global $db;
    $req = $db->prepare('SELECT * FROM orders WHERE status = ? ORDER BY id DESC');
    $req->execute(array($code));
    $liste_info = $req->fetchall();
    return $liste_info;
}
function orders_list() {
    global $db;
    $req = $db->prepare('SELECT * FROM orders  ORDER BY id DESC');
    $req->execute();
    $liste_info = $req->fetchall();
    return $liste_info;
}
function orders_list_by_id($txt) {
    
    global $db;
    $req = $db->prepare('SELECT * FROM orders WHERE id=:id ORDER BY id DESC');
    $req->execute(array(
        'id'=>$txt
    ));
    $liste_info = $req->fetchall();
    return $liste_info;
}
function orders_list_by_date($date, $client_id, $status, $comments) {

    
    
    global $db;
    $req = $db->prepare('SELECT * FROM orders WHERE '
            
            . 'client_id=:client_id AND '
            . 'status=:status AND '
            . 'comments =:comments) '
            . 'ORDER BY id DESC');
    $req->execute(array(
        //'date'=>$date,
        'client_id'=>$client_id,
        'status'=>$status,
        'comments'=>$comments
    ));
    $liste_info = $req->fetchall();
    return $liste_info;
}

function orders_total_by_user_id($client_id) {
    global $db;
    $data = 0;
    $req = $db->prepare('SELECT COUNT(*) FROM orders WHERE client_id= ?');
    $req->execute(array($id));
    $data = $req->fetchall();
    return $data[0][0];
}
 * 
 */