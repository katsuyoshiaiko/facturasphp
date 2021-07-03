<?php

function rols_rango_by_rol($rol) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT rango FROM rols WHERE rol=:rol");
    $req->execute(array(
        'rol'=>$rol
    ));
    $data = $req->fetch();
    return (isset($data[0]))?$data[0]:false;
}
