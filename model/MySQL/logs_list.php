<?php

function logs_list_by_id_doc($id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT * FROM logs WHERE doc_id=? ORDER BY id DESC");
    $req->execute(array($id));
    $data = $req->fetchall();
    return $data;
}


function logs_list_by_user_id($users_id) {
    global $db;
    $data = null;
    $req = $db->prepare('SELECT * FROM logs WHERE user_id=? ORDER BY id DESC');
    $req->execute(array($users_id));
    $data = $req->fetchall();
    return $data;
}
function logs_total_by_user_id($users_id) {
    global $db;
    $data = null;
    $req = $db->prepare('SELECT count(*) FROM logs WHERE user_id=?');
    $req->execute(array($users_id));
    $data = $req->fetchall();
    return $data[0];
}

function logs_total_by_user_id_x_days($users_id, $x_days) {
    global $db;
    $data = null;
    
    $today = date("Y-m-d");
    $days = date("Y-m-d", strtotime($today."- $x_days days"));
    
    $req = $db->prepare('SELECT count(*) FROM logs WHERE (date BETWEEN :x_days AND :today )AND user_id=:user_id');
    $req->execute(
        array(
        'today' => $today,
        'x_days' => $days,
        'user_id' => $users_id));
    
    $data = $req->fetchall();
    return $data[0][0];
}
