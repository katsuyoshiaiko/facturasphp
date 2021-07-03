<?php
// plugin = addresses
// creation date : 
// 
// 
function addresses_field_id($field, $id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $field FROM addresses WHERE id= ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function addresses_search_by_unique($field, $FieldUnique, $valueUnique) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $field FROM banks WHERE $FieldUnique = ?");
    $req->execute(array($valueUnique));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function addresses_list($limit=null, $start=0) {
    global $db;    
         
        
    if( $limit ){
        $sql = "SELECT * FROM `addresses` ORDER BY id  Limit :limit OFFSET :start  ";  
    }else{
        $sql = "SELECT * FROM `addresses` ORDER BY id    ";  
    }
    
    
    $query = $db->prepare($sql);
    
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    
    $query->execute(); 
    
    $data = $query->fetchall();
    
    return $data;
}

function addresses_details($id) {
    global $db;
    $req = $db->prepare("SELECT * FROM addresses WHERE id= ? ");
    $req->execute(array($id));
    $data = $req->fetch();
    return $data;
}

function addresses_delete($id) {
    global $db;
    $req = $db->prepare("DELETE FROM addresses WHERE id=? ");
    $req->execute(array($id));
}

function addresses_edit($id ,  $contact_id ,  $name ,  $address ,  $number ,  $postcode ,  $barrio ,  $city ,  $region ,  $country ,  $status   ) {

    global $db;
    $req = $db->prepare(" UPDATE addresses SET "
            
            ."contact_id=:contact_id , "   
."name=:name , "   
."address=:address , "   
."number=:number , "   
."postcode=:postcode , "   
."barrio=:barrio , "   
."city=:city , "   
."region=:region , "   
."country=:country , "   
."status=:status  "   

            
                    
            
                    
            . " WHERE id=:id ");
    $req->execute(array(
 "id" =>$id ,   "contact_id" =>$contact_id ,   "name" =>$name ,   "address" =>$address ,   "number" =>$number ,   "postcode" =>$postcode ,   "barrio" =>$barrio ,   "city" =>$city ,   "region" =>$region ,   "country" =>$country ,   "status" =>$status ,  
                

));
}

function addresses_add($contact_id ,  $name ,  $address ,  $number ,  $postcode ,  $barrio ,  $city ,  $region ,  $country , $code,   $status   ) {
    global $db;
    $req = $db->prepare(
            " INSERT INTO `addresses` ( `id` ,   `contact_id` ,   `name` ,   `address` ,   `number` ,   `postcode` ,   `barrio` ,   `city` ,   `region` ,   `country`,  `code`,   `status`   ) VALUES  "
            . "(:id ,  :contact_id ,  :name ,  :address ,  :number ,  :postcode ,  :barrio ,  :city ,  :region ,  :country , :code,  :status   ) ");

    $req->execute(array(

 "id" => null ,  
 "contact_id" => $contact_id ,  
 "name" => $name ,  
 "address" => $address ,  
 "number" => $number ,  
 "postcode" => $postcode ,  
 "barrio" => $barrio ,  
 "city" => $city ,  
 "region" => $region ,  
 "country" => $country ,
 "code"=>$code,         
 "status" => $status   
                        
            )
    );
    
     return $db->lastInsertId();
}



function addresses_search($txt) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT * FROM addresses 
    
            WHERE id like :txt OR id like :txt
OR contact_id like :txt
OR name like :txt
OR address like :txt
OR number like :txt
OR postcode like :txt
OR barrio like :txt
OR city like :txt
OR region like :txt
OR country like :txt
OR status like :txt
                           
");
    $req->execute(array(
        "txt" => "%$txt%"
    ));
    $data = $req->fetchall();
    return $data;
}



function addresses_select($k, $v, $selected="", $disabled=array()) {    
    $c = "";    
    foreach (addresses_list() as $key => $value) {        
        $s = ($selected == $value[$k])?" selected  ":"";       
        $d = ( in_array($value[$k], $disabled )) ? " disabled ":"";                        
        $c .= "<option value=\"$value[$k]\" $s $d >". ucfirst($value[$v])."</option>" ;
    }    
    echo  $c;     
}
function addresses_is_id($id){
     return true;
}

function addresses_is_contact_id($contact_id){
     return true;
}

function addresses_is_name($name){
     return true;
}

function addresses_is_address($address){
     return true;
}

function addresses_is_number($number){
     return true;
}

function addresses_is_postcode($postcode){
     return true;
}

function addresses_is_barrio($barrio){
     return true;
}

function addresses_is_city($city){
     return true;
}

function addresses_is_region($region){
     return true;
}

function addresses_is_country($country){
     return true;
}

function addresses_is_status($status){
     return true;
}



function addresses_field_code($field, $code) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $field FROM addresses WHERE code= ?");
    $req->execute(array($code));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}



/**
 * Muestra en un panel la direccion que le pasamos como json
 * @param type $id
 */
function addresses_show_panel($addresses_json){
    $addresses = json_decode($addresses_json, true);  
    
     if( $addresses ){
        include view("addresses", "panel"); 
     }else{
         include view("addresses", "panel_noAddress"); 
     }           
}

function addresses_show_formated($addresses_json){
    $addresses = json_decode($addresses_json, true);  
    
     if( $addresses ){
        include view("addresses", "formated"); 
     }else{
         include view("addresses", "formated_error"); 
     }           
}




//function addresses_field_id($field, $id) {
//    global $db;
//    $data = null;
//    $req = $db->prepare("SELECT $field FROM addresses WHERE id= ?");
//    $req->execute(array($id));
//    $data = $req->fetch();
//    return $data[0];
//}

//function addresses_list() {
//    global $db;
//    $limit = 999;
//
//    $data = null;
//
//    $req = $db->prepare("SELECT * FROM addresses ORDER BY id DESC LIMIT $limit ");
//
//    $req->execute(array(
//        'limit' => "$limit"
//    ));
//    $data = $req->fetchall();
//    return $data;
//}

/**
 * 
 * @global type $db
 * @param type $txt
 * @return type
 */
//function addresses_search($txt) {
//    global $db;
//    $data = null;
//    $req = $db->prepare('SELECT * FROM addresses '
//            . 'WHERE name like :txt '
//            . 'OR address like :txt '
//            . 'OR number like :txt '
//            . 'OR postcode like :txt '
//            . 'OR barrio like :txt '
//            . 'OR city like :txt '
//            . 'OR region like :txt '
//            . 'OR country like :txt  ');
//    $req->execute(array(
//        'txt' => "%$txt%"
//    ));
//    $data = $req->fetchall();
//    return $data;
//}

function addresses_search_by_contact_id($contact_id, $name="all") {
    global $db;


    $data = null;

    // si mando a buscar todos los tipos de address
    if ($name == "all") {
        $req = $db->prepare('SELECT * FROM addresses WHERE contact_id = :contact_id ');
        $req->execute(array(
            'contact_id' => "$contact_id"
            
        ));
    } else {
        $req = $db->prepare('SELECT * FROM addresses '
                . 'WHERE contact_id = :contact_id '
                . 'AND name = :name  ');
        $req->execute(array(
            'contact_id' => "$contact_id",
            'name' => "$name"
        ));
    }

    $data = $req->fetchall();
    return $data;
}

//function addresses_details($id) {
//    global $db;
//    $req = $db->prepare('SELECT * FROM addresses WHERE id= ?');
//    $req->execute(array($id));
//    $data = $req->fetch();
//    return $data;
//}

function addresses_del($id) {
    global $db;
    $req = $db->prepare('DELETE FROM addresses WHERE id=?');
    $req->execute(array($id));
}

//function addresses_edit($id, $contact_id, $name, $address, $number, $postcode, $barrio, $city, $region, $country, $status) {
//
//    global $db;
//    $req = $db->prepare('UPDATE addresses SET '
//            
//            . 'contact_id=:contact_id, '
//            . 'name=:name, '
//            . 'address=:address, '
//            . 'number=:number, '
//            . 'postcode=:postcode, '
//            . 'barrio=:barrio, '
//            . 'city=:city, '
//            . 'region=:region, '
//            . 'country=:country, '
//            . 'region=:region, '
//            . 'status=:status '
//            . 'WHERE id=:id');
//    $req->execute(array(        
//        'contact_id' => $contact_id,
//        'name' => $name,
//        'address' => $address,
//        'number' => $number,
//        'postcode' => $postcode,
//        'barrio' => $barrio,
//        'city' => $city,
//        'region' => $region,
//        'country' => $country,
//        'status' => $status,
//        'id' => $id));
//}

//function addresses_add($contact_id, $name, $address, $number, $postcode, $barrio, $city, $region, $country, $status) {
//    global $db;
//    $req = $db->prepare('INSERT INTO addresses (id, contact_id, name, address, number, postcode, barrio, city, region, country, status)
//                                       VALUES  (:id, :contact_id, :name, :address, :number, :postcode, :barrio, :city, :region, :country, :status)');
//
//    $req->execute(array(
//        'id' => null,
//        'contact_id' => $contact_id,
//        'name' => $name,
//        'address' => $address,
//        'number' => $number,
//        'postcode' => $postcode,
//        'barrio' => $barrio,
//        'city' => $city,
//        'region' => $region,
//        'country' => $country,
//        'status' => $status
//            )
//    );
//}

function addresses_cat_add($address_id, $category_id) {
    global $db;
    $req = $db->prepare('INSERT INTO addresses_categories (id, address_id, category_id)
                                                      VALUES (:id, :address_id, :category_id)');
    $req->execute(array(
        'id' => null,
        'address_id' => $address_id,
        'category_id' => $category_id
            )
    );
}

function addresses_cat_del($address_id, $category_id) {
    global $db;
    $req = $db->prepare('DELETE FROM addresses_categories WHERE (category_id = :category_id AND address_id = :address_id)');
    $req->execute(array(
        'address_id' => $address_id,
        'category_id' => $category_id
            )
    );
}

function addresses_by_category($id_category) {
    global $db;

    $data = null;

    //$req = $db->prepare('SELECT * FROM addresses WHERE type_id= ?');
    $req = $db->prepare('SELECT * FROM `addresses_categories` JOIN addresses WHERE addresses.id = addresses_categories.address_id AND category_id = ?');
    $req->execute(array($id_category));
    $data = $req->fetchall();

    return $data;
}

function addresses_total_by_category($id_category = false) {
    global $db;

    $data = 0;

    if ($id_category) {
        $req = $db->prepare('SELECT COUNT(*) FROM addresses_categories WHERE category_id= ?');
    } else {
        $req = $db->prepare('SELECT COUNT(*) FROM addresses');
    }

    $req->execute(array($id_category));
    $data = $req->fetchall();

    return $data[0][0];
}

function addresses_photos_update($id, $photo) {
    global $db;
    $req = $db->prepare('UPDATE addresses_photos SET photo=:photo WHERE id=:id');
    $req->execute(array(
        'photo' => $photo,
        'id' => $id));
}

function addresses_photos_add($address_id, $photo) {
    global $db;


    $p = (addresses_photos($address_id)) ? "0" : "1";


    $req = $db->prepare('INSERT INTO addresses_photos (id, address_id, photo, principal) VALUES (:id,:address_id,:photo,:principal)');
    $req->execute(array(
        'id' => null,
        'address_id' => $address_id,
        'photo' => $photo,
        'principal' => $p,
    ));
}

function addresses_photos_principal($address_id, $w = 80, $h = 80) {
    global $db;
// si la foto existe, mostramos sino la por defecto 
    $data = false;
    $req = $db->prepare("SELECT photo FROM addresses_photos WHERE address_id = :address_id AND principal = 1");
    $req->execute(array(
        'address_id' => $address_id));

    $data = $req->fetchall();

    $r = "<img class=\"img-responsive\" src=\"www/gallery/img/addresses/art.png\" width=\"$w\" height=\"$h\" >";



    foreach ($data as $p) {
        if ($p[0] != "" && file_exists("www/gallery/img/addresses/$p[0]")) {
            $r = "<img class=\"img-responsive\" src=\"www/gallery/img/addresses/$p[0]\" width=\"$w\" height=\"$h\" >";
        }
    }



    return $r;
}

function addresses_photos($address_id) {
    global $db;
    $data = false;
    $req = $db->prepare("SELECT * FROM addresses_photos WHERE address_id = :address_id ORDER BY principal DESC");
    $req->execute(array(
        'address_id' => $address_id));

    $data = $req->fetchall();

    return $data;
}

function addresses_photo_r($id, $w = false, $l = false) {
    // si la foto existe, mostramos sino la por defecto 
    $photo = addresses_field_id("photo", $id);

    if (file_exists("www/gallery/img/addresses/$photo")) {
        return "<img src=\"www/gallery/img/addresses/$photo\" width=\"$w\">";
    } else {
        return "<img src=\"www/gallery/img/addresses/art.png\" width=\"$w\">";
    }
}

/**
  function type_address_array() {
  global $db;
  $data = null;
  $req = $db->prepare('SELECT * FROM categories ORDER BY category');
  $req->execute();
  $data = $req->fetchall();
  return $data;
  }
 *//*
  function type_address($id) {
  global $db;
  $data = false;
  $req = $db->prepare("SELECT category FROM categories WHERE id = ? ");
  $req->execute();
  $data = $req->fetchall();
  return $data;
  }
 */

/**
 * 
 * @global type $db
 * @param type $address_id
 * @return type
 */
function addresses_categories($address_id) {
    global $db;

    $data = false;

    $req = $db->prepare("SELECT category_id FROM addresses_categories WHERE address_id = :address_id ");

    $req->execute(array(
        'address_id' => $address_id));

    $data = $req->fetchall();

    return $data;
}

function addresses_categories_exists($address_id, $category_id) {
    global $db;

    $data = false;

    $req = $db->prepare("SELECT category_id FROM addresses_categories WHERE address_id = :address_id AND category_id = :category_id ");

    $req->execute(array(
        'address_id' => $address_id,
        'category_id' => $category_id,
    ));

    $data = $req->fetchall();

    return $data;
}

/**
 * 
 * @global type $db
 * @param type $id
 * @return type
 */
function addresses_photos_total($id) {
    global $db;
    $data = 0;
    $req = $db->prepare('SELECT COUNT(*) FROM addresses_photos WHERE address_id= ?');
    $req->execute(array($id));
    $data = $req->fetchall();
    return $data[0][0];
}

function addresses_categories_delete_all($address_id) {
    global $db;

    $data = false;

    $req = $db->prepare("DELETE  FROM addresses_categories WHERE address_id = :address_id ");

    $req->execute(array(
        'address_id' => $address_id));

    $data = $req->fetchall();

    return $data;
}

function addresses_name() {
    //return array("Delivery", "Billing", "Other");
    return array("Delivery", "Billing");
}

function addresses_billing_by_contact_id($contact_id) {
    global $db;

    $limit = 1;
    $data = null;
    $req = $db->prepare("SELECT * FROM addresses  WHERE (contact_id=:contact_id ) AND name = 'Billing'  ");
    $req->execute(array(
        'contact_id' => $contact_id
    ));
    $data = $req->fetch();
    return $data;
}

function addresses_billing_list_by_contact_id($contact_id) {
    global $db;

    $limit = 1;
    $data = null;
    $req = $db->prepare("SELECT * FROM addresses  WHERE (contact_id=:contact_id ) AND name = 'Billing'  ");
    $req->execute(array(
        'contact_id' => $contact_id
    ));
    $data = $req->fetchall();
    return $data;
}

function addresses_delivery_by_contact_id($contact_id) {
    global $db;

    $limit = 1;
    $data = null;
    $req = $db->prepare("SELECT * FROM `addresses`  WHERE (contact_id=:contact_id ) AND name = 'Delivery'  ");
    $req->execute(array(
        'contact_id' => $contact_id
    ));
    $data = $req->fetch();
    return $data;
}

function addresses_delivery_search_by_contact_id($contact_id) {
    global $db;

    $limit = 1;
    $data = null;
    $req = $db->prepare("SELECT * FROM `addresses`  WHERE (contact_id=:contact_id ) AND name = 'Delivery'  ");
    $req->execute(array(
        'contact_id' => $contact_id
    ));
    $data = $req->fetchall();
    return $data;
}

function addresses_delivery_list_by_contact_id($contact_id) {
    global $db;

    $limit = 1;
    $data = null;
    $req = $db->prepare("SELECT * FROM addresses  WHERE (contact_id=:contact_id ) AND name = 'Delivery'  ");
    $req->execute(array(
        'contact_id' => $contact_id
    ));
    $data = $req->fetchall();
    return $data;
}


function addresses_array_to_json($address) {
    global $db;
    if($address){
        return json_encode($address);
    }
}


function addresses_json_to_array($address) {
    global $db;
    if($address){
        return json_decode($address, true);
    }
}

function addresses_field_from_array($field, $address_array){
    return  ($address_array[$field])? $address_array[$field] : false;
}





//function addresses_is_address($address) {    
//    return TRUE;
//}
