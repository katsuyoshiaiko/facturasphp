<?php

// plugin = updates
// creation date : 
// 
// 
function updates_field_id($field, $id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $field FROM updates WHERE id= ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function updates_field_code($field, $code) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $field FROM updates WHERE code= ?");
    $req->execute(array($code));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function updates_search_by_unique($field, $FieldUnique, $valueUnique) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $field FROM updates WHERE   $FieldUnique = ?");
    $req->execute(array($valueUnique));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function updates_list() {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT * FROM updates  ORDER BY id DESC  ");
    $req->execute(array(
    ));
    $data = $req->fetchall();
    return $data;
}

function updates_details($id) {
    global $db;
    $req = $db->prepare("SELECT * FROM updates WHERE id= ? ");
    $req->execute(array($id));
    $data = $req->fetch();
    return $data;
}

function updates_delete($id) {
    global $db;
    $req = $db->prepare("DELETE FROM updates WHERE id=? ");
    $req->execute(array($id));
}

function updates_edit($id, $date, $version, $name, $description, $code_install, $code_uninstall, $code_check, $installed) {

    global $db;
    $req = $db->prepare(" UPDATE updates SET "
            . "date=:date , "
            . "version=:version , "
            . "name=:name , "
            . "description=:description , "
            . "code_install=:code_install , "
            . "code_uninstall=:code_uninstall , "
            . "code_check=:code_check , "
            . "installed=:installed  "
            . " WHERE id=:id ");
    $req->execute(array(
        "id" => $id, "date" => $date, "version" => $version, "name" => $name, "description" => $description, "code_install" => $code_install, "code_uninstall" => $code_uninstall, "code_check" => $code_check, "installed" => $installed,
    ));
}

function updates_add($date, $version, $name, $description, $code_install, $code_uninstall, $code_check, $installed) {
    global $db;
    $req = $db->prepare(" INSERT INTO `updates` ( `id` ,   `date` ,   `version` ,   `name` ,   `description` ,   `code_install` ,   `code_uninstall` ,   `code_check` ,   `installed`   )
                                       VALUES  (:id ,  :date ,  :version ,  :name ,  :description ,  :code_install ,  :code_uninstall ,  :code_check ,  :installed   ) ");

    $req->execute(array(
        "id" => null,
        "date" => $date,
        "version" => $version,
        "name" => $name,
        "description" => $description,
        "code_install" => $code_install,
        "code_uninstall" => $code_uninstall,
        "code_check" => $code_check,
        "installed" => $installed
            )
    );

    return $db->lastInsertId();
}

function updates_search($txt) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT * FROM updates 
    
            WHERE id like :txt OR id like :txt
OR date like :txt
OR version like :txt
OR name like :txt
OR description like :txt
OR code_install like :txt
OR code_uninstall like :txt
OR code_check like :txt
OR installed like :txt
                           
");
    $req->execute(array(
        "txt" => "%$txt%"
    ));
    $data = $req->fetchall();
    return $data;
}

function updates_select($k, $v, $selected = "", $disabled = array()) {
    $c = "";
    foreach (updates_list() as $key => $value) {
        $s = ($selected == $value[$k]) ? " selected  " : "";
        $d = ( in_array($value[$k], $disabled)) ? " disabled " : "";
        $c .= "<option value=\"$value[$k]\" $s $d >" . ucfirst($value[$v]) . "</option>";
    }
    echo $c;
}

function updates_is_id($id) {
    return true;
}

function updates_is_date($date) {
    return true;
}

function updates_is_version($version) {
    return true;
}

function updates_is_name($name) {
    return true;
}

function updates_is_description($description) {
    return true;
}

function updates_is_code_install($code_install) {
    return true;
}

function updates_is_code_uninstall($code_uninstall) {
    return true;
}

function updates_is_code_check($code_check) {
    return true;
}

function updates_is_installed($installed) {
    return true;
}

function updates_update_by_code($code) {
    global $db;
    $req = $db->prepare($code);
    $req->execute();
//    $data = $req->fetchall();
    //  return $data;
}
//https://waytolearnx.com/2019/07/creer-et-utiliser-une-api-rest-en-php.html

function updates_get_update($version) {
    $url = "https://robin.factux.be/robinson.txt";

    echo $version; 
    
// Lit une page web dans un tableau.
$lines = file_get_contents($url);

vardump(file_put_contents("rc.txt", $lines)); 


vardump($lines); 
vardump($version); 



}

function updates_change_to_installed($id) {

    global $db;
    $req = $db->prepare('UPDATE updates SET installed =:installed WHERE id=:id');

    $req->execute(array(
        'installed' => 1,
        'id' => $id
    ));
}

function updates_change_to_uninstalled($id) {

    global $db;
    $req = $db->prepare('UPDATE updates SET installed =:installed WHERE id=:id');

    $req->execute(array(
        'installed' => 0,
        'id' => $id
    ));
}
