<?php
function contacts_field_code($field , $code) {
    global $db ;
    $data = null ;
    $req = $db->prepare("SELECT $field FROM contacts WHERE code= ?") ;
    $req->execute(array( $code )) ;
    $data = $req->fetch() ;
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false ;
}
function contacts_field_tva($field , $tva) {
    global $db ;
    $data = null ;
    $req = $db->prepare("SELECT $field FROM contacts WHERE tva= ?") ;
    $req->execute(array( $tva )) ;
    $data = $req->fetch() ;
    
    return (isset($data[0])) ? $data[0] : false ;
}


function logs_list_by_contact_id($contact_id) {
    global $db;
    $limit = 99999999;

    $data = null;

    $req = $db->prepare("SELECT * FROM `logs` WHERE u_id = :u_id ORDER BY `id` DESC ");

    $req->execute(array(
        "u_id"=>$contact_id, 
        
        
    ));
    $data = $req->fetchall();
    return $data;
}



function contacts_offices_list_by_contact($contact_id) {
    global $db ;
    $req = $db->prepare("SELECT * FROM contacts WHERE owner_id = :owner_id AND type = :type ORDER BY status, name") ;
    $req->execute(array( 
        "owner_id" => $contact_id, 
        "type" => 1
            
        
        
        )) ;
    $data = $req->fetchall() ;
    return $data ;
}


/**
 * 
 * @global type $db
 * @param type $field
 * @param type $id
 * @return type
 */
//function contacts_field_id($field, $id) {
//    global $db;
//    $data = null;
//    $req = $db->prepare("SELECT $field FROM contacts WHERE id= ?");
//    $req->execute(array($id));
//    $data = $req->fetch();
//    return $data[0];
//}






/**
 * 
 * @global type $db
 * @return type
 */
/*function contacts_list() {
    global $db;
    $data = null;
    $req = $db->prepare('SELECT * FROM contacts ORDER BY id DESC');
    $req->execute();
    $data = $req->fetchall();
    return $data;
}*/




function contacts_extructure() {
    global $db;    
    $limit = 10;     
    $data = null;
    $req = $db->prepare('DESCRIBE contacts ');
    $req->execute(array(
        'limit'=> "$limit"
    ));
    $data = $req->fetchall();
    return $data;
}
//function contacts_list() {
//    global $db;    
//    
//    $data = null;
//    $req = $db->prepare('SELECT * FROM contacts ORDER BY id DESC ');
//    //$req = $db->prepare(" SELECT * FROM contacts INNER JOIN directory ON contacts.id = directory.contact_id  ");
//    $req->execute();
//    $data = $req->fetchall();
//    return $data;
//}



function xxxemployees_list($company_id) {
    global $db;    
    $limit = 10;     
    $data = null;
    $req = $db->prepare('SELECT * FROM employees WHERE company_id=:company_id ORDER BY id DESC  ');
    $req->execute(array(
        "company_id"=>$company_id,
    ));
    $data = $req->fetchall();
    return $data;
}



function contacts_list_by_type($type, $limit=99999, $start=0) {
    global $db ;

    if( $limit ){
        $sql = "SELECT * FROM `contacts` WHERE `type` = :type ORDER BY id DESC Limit :limit OFFSET :start  ";  
    }else{
        $sql = "SELECT * FROM `contacts` WHERE `type` = :type ORDER BY id DESC   ";  
    }
        
    $query = $db->prepare($sql);
    
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':type' , (int) $type,  PDO::PARAM_INT);
    
    $query->execute(); 
    
    $data = $query->fetchall();
    
    return $data;
}
function contacts_list_by_owner_id($owner_id) {
    global $db;    
    $limit = 10;     
    $data = null;
    $req = $db->prepare('SELECT * FROM contacts WHERE (owner_id = :owner_id ) ORDER BY id DESC   ');
    $req->execute(array(
        'owner_id'=> "$owner_id"
    ));
    $data = $req->fetchall();
    return $data;
}

function contacts_list_according_company($owner_id) {
    global $db;    
    $limit = 10;     
    $data = null;
    $req = $db->prepare('SELECT * FROM contacts WHERE owner_id = :owner_id ORDER BY id DESC  ');
    $req->execute(array(
        'owner_id'=> "$owner_id"
    ));
    $data = $req->fetchall();
    return $data;
}

function contacts_discounts_list() {
    global $db;    
    $limit = 10;     
    $data = null;
    $req = $db->prepare('SELECT DISTINCT(discounts) FROM contacts ORDER BY discounts DESC ');
    $req->execute(array(        
    ));
    $data = $req->fetchall();
    return $data;
}
function contacts_title_list() {
    global $db;    
    $limit = 10;     
    $data = null;
    $req = $db->prepare('SELECT DISTINCT(title) FROM contacts ');
    $req->execute(array(        
    ));
    $data = $req->fetchall();
    return $data;
}

function contacts_companies_list_according_contact($contact_id) {
    global $db;    
    $limit = 10;     
    $data = null;
    $req = $db->prepare('SELECT * FROM contacts_positions WHERE contact_id = :contact_id   ');
    $req->execute(array(
        'contact_id'=> "$contact_id"
    ));
    $data = $req->fetchall();
    return $data;
}

function contacts_list_according_company_and_type($owner_id, $type) {
    global $db;    
    $limit = 10;     
    $data = null;
    $req = $db->prepare('SELECT * FROM contacts WHERE owner_id = :owner_id AND type = :type ORDER BY id DESC  ');
    $req->execute(array(
        'owner_id'=> "$owner_id", 
        "type"=>$type
    ));
    $data = $req->fetchall();
    return $data;
}




/**
 * 
 * @global type $db
 * @param type $txt
 * @return type
 */
//function contacts_search($txt) {
//    global $db;
//    $data = null;
//    $req = $db->prepare('SELECT * FROM contacts WHERE '
//            . 'id like :txt OR '
//            . 'title like :txt OR '
//            . 'birthdate like :txt OR '
//            . 'name like :txt OR '
//            . 'lastname like :txt '            
//            . 'ORDER BY name ');
//    $req->execute(array(
//        'txt' => "%$txt%"
//    ));
//    $data = $req->fetchall();
//    return $data;
//}

function contacts_search_name_lastname_birthdate($owner_id, $name, $lastname, $birthdate) {
    global $db;
    $data = null;
    $req = $db->prepare('SELECT * FROM contacts WHERE '
            . 'owner_id = :owner_id AND '
            . 'name = :name AND '
            . 'lastname = :lastname AND '
            . 'birthdate = :birthdate  '                        
            . 'ORDER BY name ');
    $req->execute(array(
        'owner_id' => $owner_id,
        'name' => $name,
        'lastname' => $lastname,
        'birthdate' => $birthdate,
        
    ));
    $data = $req->fetchall();
    return $data;
}

function contacts_search_company_name($owner_id, $name) {
    global $db;
    $data = null;
    $req = $db->prepare('SELECT * FROM contacts WHERE '
            . 'owner_id = :owner_id AND '
            . 'name = :name '                                                
            . 'ORDER BY name ');
    $req->execute(array(
        'owner_id' => $owner_id,
        'name' => $name
        
    ));
    $data = $req->fetchall();
    return $data;
}


function contacts_search_by_company_and_name_lastname_birthdate($owner_id, $txt="") {
    global $db;
    $data = null;
    $req = $db->prepare('SELECT * FROM contacts WHERE '
            . 'owner_id = :owner_id AND '
            . 'name LIKE :name OR '
            . 'lastname LIKE :lastname OR '
            . 'birthdate = :birthdate  '                        
            . 'ORDER BY name ');
    $req->execute(array(
        'owner_id' => $owner_id,
        'name' => "%$txt%",
        'lastname' => "%$txt%",
        'birthdate' => "%$txt%",
        
    ));
    $data = $req->fetchall();
    return $data;
}


function contacts_search_by_type($type) {
    global $db;
    $data = null;
    $req = $db->prepare('SELECT * FROM contacts WHERE type=:type ORDER BY id DESC');
    $req->execute(array(
        'type' => $type
    ));
    $data = $req->fetchall();
    return $data;
}

function contacts_search_bloqued() {
    global $db;
    $data = null;
    $req = $db->prepare('SELECT c.id, c.owner_id, c.type, c.title, c.name, c.lastname, c.birthdate FROM contacts as c INNER JOIN users as u ON c.id = u.contact_id WHERE u.status = :status');
    //$req = $db->prepare('SELECT * FROM contacts INNER JOIN users ON contacts.id = users.contact_id ');
    $req->execute(array(
        'status' => USER_BLOCKED
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
//function contacts_details($id) {
//    global $db;
//    $req = $db->prepare('SELECT * FROM contacts WHERE id= ?');
//    $req->execute(array($id));
//    $data = $req->fetch();
//    return $data;
//}



/**
 * 
 * @global type $db
 * @param type $id
 */
function contacts_del($id) {
    global $db;
    $req = $db->prepare('DELETE FROM contacts WHERE id=?');
    $req->execute(array($id));
}

/**
 * 
 * @global type $db
 * @param type $id
 * @param type $name
 * @param type $quantity
 * @param type $price
 * @param type $description
 * @param type $type_id
 */
//function contacts_edit($id, $title, $name, $lastname, $birthdate) {
//                     //$id, $owner_id, 0,     $title, $name, $lastname, $birthdate
//    
//    global $db;
//    $req = $db->prepare('UPDATE contacts SET '
//            
//            
//            . 'title=:title, '
//            . 'name=:name, '
//            . 'lastname=:lastname, '
//            . 'birthdate=:birthdate  WHERE id=:id');
//    $req->execute(array(        
//        'id' => intval($id),
//        
//        
//        'title' => $title,
//        'name' => $name,
//        'lastname' => $lastname,
//        'birthdate' => $birthdate,                          
//        ));
//    
//    
//    //echo var_dump($id, $owner_id, $type, $title, $name, $lastname, $birthdate, $status);
//   // die();
//}
function contacts_edit_company($id, $name, $status, $tva, $discounts) {    
    global $db;
    $req = $db->prepare(
            'UPDATE contacts  
            SET 
            name = :name, 
            status = :status, 
            tva = :tva, 
            discounts=:discounts 
            WHERE id=:id');    
    $req->execute(array(        
        'id' => $id,        
        'name' => $name,                                              
        'status' => $status,                                              
        'tva'=>$tva, 
        'discounts'=>$discounts            
        ));  
}

function contacts_edit_owner($id, $new_owner_id) {    
    global $db;
    $req = $db->prepare('UPDATE contacts  SET owner_id = :new_owner_id  WHERE id=:id');    
    $req->execute(array(        
        'id' => $id,        
        'new_owner_id' => $new_owner_id
        ));  
}

/**
 * 
 * @global type $db
 * @param type $name
 * @param type $quantity
 * @param type $price
 * @param type $description
 * @param type $id_category
 */
//function contacts_add($owner_id, $type, $title, $name, $lastname, $birthdate, $order_by, $status) {
//    global $db;
//    $req = $db->prepare('INSERT INTO contacts (id,   owner_id,  type,  title,  name,  lastname,  birthdate, tva,   order_by,  status)
//                                       VALUES (:id, :owner_id, :type, :title, :name, :lastname, :birthdate, :tva,  :order_by, :status)');
//
//    $req->execute(array(
//        'id' => null,
//        'owner_id' => $owner_id,
//        'type' => $type,
//        'title' => $title,
//        'name' => $name,
//        'lastname' => $lastname,
//        'birthdate' => $birthdate,
//        'tva' => null,
//        'order_by' => $order_by,
//        'status' => $status
//            )
//    );    
//    
//    return $db->lastInsertId() ;
//       
//}

function contacts_add_company($contact_id, $tva) {
    global $db;
    $req = $db->prepare('INSERT INTO companies (id,   contact_id, tva)
                                       VALUES (:id,  :contact_id, :tva)');

    $req->execute(array(
        'id' => null,        
        'contact_id' => $contact_id,
        'tva' => $tva
        
            )
    );           
}
function contacts_add_employee($company_id,$contact_id, $owner_ref, $cargo) {
    global $db;
    
    
    
    //$req = $db->prepare('INSERT INTO `companies` (`id`,   `company_id`,  `contact_id`,  `owner_ref`,  `cargo`,  `order_by`,  `status`)                                       VALUES (:id,  :company_id, :contact_id, :owner_ref, :cargo, :order_by, :status)');
    $req = $db->prepare("INSERT INTO `employees` (`id`, `company_id`, `contact_id`, `owner_ref`, `date`, `cargo`, `order_by`, `status`) "
            . "VALUES (:id, :company_id, :contact_id, :owner_ref, CURRENT_TIMESTAMP, :cargo, :order_by, :status)");

    $req->execute(array(
        'id' => null,        
        'company_id' => $company_id,
        'contact_id' => $contact_id,
        'owner_ref' => $owner_ref,
        'cargo' => $cargo, 
        'order_by' => null, 
        'status' => null, 
        
            )
    );          
        
}

function contacts_add_patient($company_id, $company_ref, $contact_id, $status) {
    global $db;
    $req = $db->prepare('INSERT INTO patients (id,   company_id,  company_ref,  contact_id,  order_by,  status)
                                       VALUES (:id, :company_id, :company_ref, :contact_id, :order_by, :status)');

    $req->execute(array(
        'id' => null,
        'company_id' => $company_id,
        'company_ref' => $company_ref,
        'contact_id' => $contact_id,    
        'order_by' => 0,        
        'status' => 1
        
            )
    );  
    
    
}
function contacts_add_contact($owner_id, $type, $title, $name, $lastname, $birthday) {
    global $db;
    $req = $db->prepare('INSERT INTO contacts (id, owner_id, type,   title,  name,  lastname,  birthdate,  order_by,  status)
                                       VALUES (:id, :owner_id, :type, :title, :name, :lastname, :birthdate, :order_by, :status)');

    $req->execute(array(
        'id' => null,
        'owner_id' => $owner_id,
        'type' => $type,
        'title' => $title,
        'name' => "$name",
        'lastname' => $lastname,
        'birthdate' => $birthday,        
        'order_by' => 0,        
        'status' => 1
        
            )
    );  
    
    
}

function contacts_cat_add($contact_id, $category_id) {
    global $db;
    $req = $db->prepare('INSERT INTO contacts_categories (id, contact_id, category_id)
                                       VALUES (:id, :contact_id, :category_id)');

    $req->execute(array(
        'id' => null,
        'contact_id' => $contact_id,
        'category_id' => $category_id
            )
    );
}

function contacts_cat_del($contact_id, $category_id) {
    global $db;   
    $req = $db->prepare('DELETE FROM contacts_categories WHERE (category_id = :category_id AND contact_id = :contact_id)');
    $req->execute(array(        
        'contact_id' => $contact_id,
        'category_id' => $category_id
            )
    );
}


/**
 * 
 * @global type $db
 * @param type $id_category
 * @return type
 */
function contacts_by_category($id_category) {
    global $db;

    $data = null;

    //$req = $db->prepare('SELECT * FROM contacts WHERE type_id= ?');
    $req = $db->prepare('SELECT * FROM `contacts_categories` JOIN contacts WHERE contacts.id = contacts_categories.contact_id AND category_id = ?');
    $req->execute(array($id_category));
    $data = $req->fetchall();

    return $data;
}

/**
 * 
 * @global type $db
 * @param type $id_category
 * @return type
 */
function contacts_total_by_category($id_category = false) {
    global $db;

    $data = 0;

    if ($id_category) {
        $req = $db->prepare('SELECT COUNT(*) FROM contacts_categories WHERE category_id= ?');
    } else {
        $req = $db->prepare('SELECT COUNT(*) FROM contacts');
    }

    $req->execute(array($id_category));
    $data = $req->fetchall();

    return $data[0][0];
}
function contacts_total_by_type($type = false) {
    global $db;

    $data = 0;

    if ($type) {
        $req = $db->prepare('SELECT COUNT(*) FROM contacts WHERE type= ?');
    } else {
        $req = $db->prepare('SELECT COUNT(*) FROM contacts');
    }

    $req->execute(array($type));
    $data = $req->fetchall();

    return $data[0][0];
}

function contacts_total_with_tva() {
    global $db;

    $data = 0;

    $req = $db->prepare('SELECT COUNT(*) FROM contacts WHERE tva IS NOT NULL');
    
    $req->execute();
    
    $data = $req->fetchall();

    return $data[0][0];
}

function contacts_total_by_discount($discount = NULL) {
    global $db;

    $data = 0;

    if ($discount == NULL) {
        $req = $db->prepare('SELECT COUNT(*) FROM contacts WHERE discounts IS NULL');
    } else {
        $req = $db->prepare('SELECT COUNT(*) FROM contacts WHERE discounts = :discount');
    }

    $req->execute(array(
        "discount"=>$discount
    ));
    $data = $req->fetchall();

    return $data[0][0];
}
function contacts_total_by_title($title = NULL) {
    global $db;

    $data = 0;

    if ($title == NULL) {
        $req = $db->prepare('SELECT COUNT(*) FROM contacts WHERE title IS NULL');
    } else {
        $req = $db->prepare('SELECT COUNT(*) FROM contacts WHERE title = :title');
    }

    $req->execute(array(
        "title"=>$title
    ));
    $data = $req->fetchall();

    return $data[0][0];
}

/**
 * 
 * @global type $db
 * @param type $id
 * @param type $photo
 */
//function contacts_photos_add($id, $photo) {
//    global $db;
//    $req = $db->prepare('INSERT INTO contacts_photos (id, contact_id, photo, principal) VALUES (:id,:contact_id,:photo,:principal)');
//    $req->execute(array(
//        'id' => null,
//        'contact_id' => $id,
//        'photo' => $photo,
//        'principal' => 0,
//        
//            
//            ));
//}

/**
 * 
 * @param type $id
 * @param type $w
 * @param type $l
 */
function contacts_photo($id, $w = false, $h = false) {
    // si la foto existe, mostramos sino la por defecto 
    $photo = contacts_field_id("photo", $id);

    if (file_exists("www/gallery/img/contacts/$photo")) {
        echo "<img class=\"img-responsive\" src=\"www/gallery/img/contacts/$photo\" >";
    } else {
        echo "<img class=\"img-responsive\" src=\"www/gallery/img/contacts/art.png\" >";
    }
}



function contacts_photos($contact_id) {
    global $db;
    $data = false;
    $req = $db->prepare("SELECT * FROM contacts_photos WHERE contact_id = :contact_id");
    $req->execute(array(
        
        'contact_id' => $contact_id ));
    
    $data = $req->fetchall();
    
    return $data;
}







/**
 * 
 * @param type $id
 * @param type $w
 * @param type $l
 * @return type
 */
function contacts_photo_r($id, $w = false, $l = false) {
    // si la foto existe, mostramos sino la por defecto 
    $photo = contacts_field_id("photo", $id);

    if (file_exists("www/gallery/img/contacts/$photo")) {
        return "<img src=\"www/gallery/img/contacts/$photo\" width=\"$w\">";
    } else {
        return "<img src=\"www/gallery/img/contacts/art.png\" width=\"$w\">";
    }
}

/**
  function type_contact_array() {
  global $db;
  $data = null;
  $req = $db->prepare('SELECT * FROM categories ORDER BY category');
  $req->execute();
  $data = $req->fetchall();
  return $data;
  }
 */
function type_contactxxxxxxxxxxxxxxxxxxx($id) {
    global $db;
    $data = false;
    $req = $db->prepare("SELECT category FROM categories WHERE id = ? ");
    $req->execute();
    $data = $req->fetchall();
    return $data;
}
/**
 * 
 * @global type $db
 * @param type $contact_id
 * @return type
 */
function contacts_categories($contact_id) {
    global $db;
    
    $data = false;
    
    $req = $db->prepare("SELECT category_id FROM contacts_categories WHERE contact_id = :contact_id ");
    
    $req->execute(array(
        
        'contact_id' => $contact_id ));
    
    $data = $req->fetchall();    

    return $data;
}
/**
 * 
 * @global type $db
 * @param type $id
 * @return type
 */
function contacts_photos_total($id) {
    global $db;
    $data = 0;
    $req = $db->prepare('SELECT COUNT(*) FROM contacts_photos WHERE contact_id= ?');
    $req->execute(array($id));
    $data = $req->fetchall();
    return $data[0][0];
}

function contacts_type($type) {        
    
    switch ($type) {
        case 0:
            return "Patient";
            break;
        
        case 1:
            return "Laboratorio";
            break;

        default:
            return "indefinido";
            break;
    }
    
}

function contacts_status($status) {        
    
    switch ($status) {
        case -1:
            return "Bloqued";
            break;
        
        case 0:
            return "Waiting";
            break;
        
        case 1:
            return "Activated";
            break;

        default:
            return "indefinido";
            break;
    }
    
}
function contacts_status_list() {        
    
    return $status = array(-1,0,1); 
    
}
/*function contacts_titles() {            
    //return array("Mr.", "Mrs.",  "Ms.");
    
        global $db;
    
    $data = false;
    
    $req = $db->prepare("SELECT * FROM contacts_titles ");
    
    $req->execute(array(
        
        
    
    ));
    
    $data = $req->fetchall();    

    return $data;
    
    
}*/

function contacts_password_update($contact_id, $password) {
    global $db, $u_id;
    $req = $db->prepare('UPDATE users SET password=:password  WHERE contact_id=:contact_id ');

    $req->execute(array(
        'contact_id' => $contact_id,
        'password' => $password,
            )
    );
}
function contacts_block($contact_id) {
    global $db;
    $req = $db->prepare('UPDATE users SET status=:status  WHERE contact_id=:contact_id ');

    $req->execute(array(
        'contact_id' => $contact_id,
        'status' => USER_BLOCKED,
        
            )
    );
    

    
}

function contacts_unblock($contact_id) {
    global $db;
    $req = $db->prepare('UPDATE users SET status=:status  WHERE contact_id=:contact_id ');

    $req->execute(array(
        'contact_id' => $contact_id,
        'status' => USER_ONLINE,
        
            )
    );
}

function contacts_approve($contact_id) {
    global $db;
    $req = $db->prepare('UPDATE users SET status=:status  WHERE contact_id=:contact_id ');

    $req->execute(array(
        'contact_id' => $contact_id,
        'status' => USER_ONLINE
        
            )
    );
}


//function contacts_select($k, $v, $selected="", $disabled=array()) {    
//    $c = "";    
//    foreach (contacts_list() as $key => $value) {        
//        $s = ($selected == $value[$k])?" selected  ":"";       
//        $d = ( in_array($value[$k], $disabled )) ? " disabled ":"";                        
//        $c .= "<option value=\"$value[$k]\" $s $d >". ucfirst($value[$v])."</option>" ;
//    }    
//    echo  $c;     
//}

//function contacts_is_id($id) {
//    return TRUE;
//}

function contacts_formated($id){    
    
    $type = contacts_field_id("type", $id); 
    
    $name = (contacts_field_id("name", $id));
    $lastname = strtoupper(contacts_field_id("lastname", $id));        
    
    return ($type)? contacts_formated_name($name) : contacts_formated_lastname($lastname) . " " .contacts_formated_name($name) ;
    
}

function contacts_formated_name($name){    
    return ($name); 
}

function contacts_formated_lastname($lastname){        
    return (strtoupper($lastname));        
}

function contacts_is_headoffice($contact_id){
    return (  contacts_field_id("owner_id", $contact_id) == $contact_id )? true : false;
}

function contacts_headoffice_list() {
    global $db ;
    $limit = 999999 ;

    $data = null ;

    $req = $db->prepare("SELECT c.id, c.owner_id, c.type, c.name, c.status FROM contacts as c WHERE c.type = 1 AND c.id = c.owner_id ORDER BY id DESC LIMIT $limit ") ;

    $req->execute(array(
        "limit" => $limit
        
    )) ;
    $data = $req->fetchall() ;
    return $data ;
}

/**
 * 
 * @param type $contact_id
 * @param type $compnay_id
 * @return boolean
 */
function contacts_is_contact_of_headoffice($contact_id, $headoffice_id){

    // a quien pertenece el contacto
    $owner_id = contacts_field_id("owner_id", $contact_id); 
    
    // saco el headoffice de la oficina    
    $office_owner_id = contacts_field_id("owner_id", $owner_id); 
    
    // comparo el headoffice del empleado con el enviado    
    return ($office_owner_id == $headoffice_id )? true : false;
    
    
}

function contacts_headoffice_of_contact_id($contact_id){

    // a quien pertenece el contacto
    $owner_id = contacts_field_id("owner_id", $contact_id); 
    
    // saco el headoffice de la oficina    
    $office_owner_id = contacts_field_id("owner_id", $owner_id); 
    
    return ($office_owner_id)?$office_owner_id : false;
    
    
}

function contacts_search_tva( $tva ) {
    global $db;    
    $limit = 10;     
    $data = null;
    $req = $db->prepare('SELECT * FROM contacts WHERE tva = :tva   ');
    $req->execute(array(
        'tva'=> $tva
    ));
    $data = $req->fetchall();
    return $data;
}


function contacts_patient_of($contact_id){
    // saco la oficina
    // si esta es sede
    // sino saco la sede
    
    
    
    
}

/**
 * Trabaja en que oficina de la empresa?
 * @param type $contact_id
 * @return type
 */
function contacts_work_at($contact_id){
    
    return (employees_office_by_contact($contact_id))? employees_office_by_contact($contact_id) : false; 
}

/**
 * Trabaja para que empresa?
 * @param type $contact_id
 * @return type
 */
function  contacts_work_for($contact_id){

    $val = contacts_field_id("owner_id", contacts_work_at($contact_id)); 
            
    return ($val)? $val : false;
    
}


function contacts_update_owner_id($contact_id, $new_owner_id) {
    global $db;
    $req = $db->prepare('UPDATE `contacts` SET owner_id=:owner_id  WHERE id=:id ');

    $req->execute(array(
        'id' => $contact_id,
        'owner_id' => $new_owner_id
        
            )
    );
}
function contacts_discounts_update($contact_id, $new_discount) {
    global $db;
    $req = $db->prepare('UPDATE `contacts` SET discounts=:discounts  WHERE id=:id ');

    $req->execute(array(
        'id' => $contact_id,
        'discounts' => $new_discount
        
            )
    );
}