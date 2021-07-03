<?php

// plugin = gallery
// creation date : 
// 
// 
function gallery_field_id($field, $id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $field FROM gallery WHERE id= ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function gallery_field_code($field, $code) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $field FROM gallery WHERE code= ?");
    $req->execute(array($code));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function gallery_search_by_unique($field, $FieldUnique, $valueUnique) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $field FROM gallery WHERE   $FieldUnique = ?");
    $req->execute(array($valueUnique));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function gallery_list() {
    global $db;
    $limit = 999;

    $data = null;

    $req = $db->prepare("SELECT * FROM gallery  ORDER BY id DESC LIMIT $limit  ");

    $req->execute(array(
        "limit" => $limit
    ));
    $data = $req->fetchall();
    return $data;
}

function gallery_details($id) {
    global $db;
    $req = $db->prepare("SELECT * FROM gallery WHERE id= ? ");
    $req->execute(array($id));
    $data = $req->fetch();
    return $data;
}

function gallery_delete($id) {
    global $db;
    $req = $db->prepare("DELETE FROM gallery WHERE id=? ");
    $req->execute(array($id));
}

function gallery_edit($id, $owner_id, $name, $title, $description, $alt, $url, $date_registre, $order_by, $status) {

    global $db;
    $req = $db->prepare(" UPDATE gallery SET "
            . "owner_id=:owner_id , "
            . "name=:name , "
            . "title=:title , "
            . "description=:description , "
            . "alt=:alt , "
            . "url=:url , "
            . "date_registre=:date_registre , "
            . "order_by=:order_by , "
            . "status=:status  "
            . " WHERE id=:id ");
    $req->execute(array(
        "id" => $id, "owner_id" => $owner_id, "name" => $name, "title" => $title, "description" => $description, "alt" => $alt, "url" => $url, "date_registre" => $date_registre, "order_by" => $order_by, "status" => $status,
    ));
}

function gallery_add(
        $owner_id, $name, $title, $description, $alt, $url, $date_registre, $code, $order_by, $status
) {
    global $db;
    $req = $db->prepare(
            "INSERT INTO `gallery` 
            (
                    `id`, `owner_id`, `name`, `title`, 
                    `description`, `alt`, `url`, `date_registre`, 
                    `code`, `order_by`, `status`) VALUES (
                    
                     :id, :owner_id, :name, :title, 
                     :description, :alt, :url, :date_registre,
                     :code, :order_by, :status )");

    $req->execute(array(
        "id" => null,
        "owner_id" => 1022,
        "name" => $name,
        "title" => $title,
        "description" => '',
        "alt" => '',
        "url" => '',
        "date_registre" => '2021-05-20 20:45:20',
        "code" => $code,
        "order_by" => $order_by,
        "status" => $status
            )
    );
}

function gallery_search($txt) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT * FROM gallery 
    
            WHERE id like :txt OR id like :txt
OR owner_id like :txt
OR name like :txt
OR title like :txt
OR description like :txt
OR alt like :txt
OR url like :txt
OR date_registre like :txt
OR order_by like :txt
OR status like :txt
                           
");
    $req->execute(array(
        "txt" => "%$txt%"
    ));
    $data = $req->fetchall();
    return $data;
}

function gallery_select($k, $v, $selected = "", $disabled = array()) {
    $c = "";
    foreach (gallery_list() as $key => $value) {
        $s = ($selected == $value[$k]) ? " selected  " : "";
        $d = ( in_array($value[$k], $disabled)) ? " disabled " : "";
        $c .= "<option value=\"$value[$k]\" $s $d >" . ucfirst($value[$v]) . "</option>";
    }
    echo $c;
}

function gallery_is_id($id) {
    return true;
}

function gallery_is_owner_id($owner_id) {
    return true;
}

function gallery_is_name($name) {
    return true;
}

function gallery_is_title($title) {
    return true;
}

function gallery_is_description($description) {
    return true;
}

function gallery_is_alt($alt) {
    return true;
}

function gallery_is_url($url) {
    return true;
}

function gallery_is_date_registre($date_registre) {
    return true;
}

function gallery_is_order_by($order_by) {
    return true;
}

function gallery_is_status($status) {
    return true;
}

function gallery_image_exists($filename) {

    if (!$filename) {
        return false;
    }

    if (file_exists($filename) && !is_dir($filename)) {
        return true;
    }

    return false;
}

function gallery_image_show($image, $width = false, $height = false, $class=false, $alt = false) {

    if (gallery_image_exists($image)) {
                
        $w = ($width) ?     " width=$width "      : "";
        $h = ($height) ?    " height=$height "    : "";
        $c = ($class) ?     " class=$class "      : "";
        $a = ($alt) ?       " alt=$alt "          : "alt=Noimage";
        
       // vardump($class); 
        
        return "<img src='$image' $c $w $h $a />";
    } else {
        return false;
    }
}

function gallery_image_show_no_image($width = false, $height = false, $class=false, $alt = false) {

    $image = "www/gallery/img/noimage.jpg";


    if (gallery_image_exists($image)) {
        
        return gallery_image_show($image, $width, $height, $class, $alt);
        
    } else {
        
        return false;
    }
}

function gallery_image_delete($filename) {

    // si no se envia nombre de fichero
    if (!$filename) {
        return false;
    }

    // si existe y no es directorio
    if (gallery_image_exists($filename)) {
        // borramos
        unlink($filename);
        return true;
    } else {
        // sino returnamos error 1
        return false;
    }
}
