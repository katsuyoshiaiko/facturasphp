<?php

function countries_name($code) {
    global $db, $u_id;

    $data = null;
    $req = $db->prepare("SELECT countryName FROM countries WHERE countryCode=:code  ");
    $req->execute(array(
        'code' => "$code"
    ));
    $data = $req->fetchall();

    return $data[0][0];
}
