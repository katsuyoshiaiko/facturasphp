<?php

function addresses_list_by_contact_id($contact_id) {
    global $db;
    $req = $db->prepare('SELECT * FROM addresses WHERE contact_id = ? ORDER BY id DESC');
    $req->execute(array($contact_id));
    $data = $req->fetchall();
    return $data;
}

