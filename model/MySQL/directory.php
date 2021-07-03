<?php

function directory_list_by_contact_id($contact_id) {
    global $db;
    $req = $db->prepare('SELECT id, contact_id, name, data FROM directory WHERE contact_id = ? ORDER BY id ');
    $req->execute(array($contact_id));
    $data = $req->fetchall();
    return $data;
}



