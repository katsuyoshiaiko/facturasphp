<?php
/*
function contacts_titles_field_id($field, $id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $field FROM contacts_titles WHERE id= ?");
    $req->execute(array($id));
    $data = $req->fetch();
    return $data[0];
}

function contacts_titles_list() {
    global $db;

    $limit = 10;

    $data = null;
    $req = $db->prepare('SELECT * FROM contacts_titles LIMIT 10  ');
    $req->execute(array(
        'limit' => "$limit"
    ));
    $data = $req->fetchall();
    return $data;
}

function contacts_titles_search($txt) {
    global $db;
    $data = null;
    $req = $db->prepare('SELECT * FROM contacts_titles WHERE name like :txt OR description like :txt ORDER BY name DESC');
    $req->execute(array(
        'txt' => "%$txt%"
    ));
    $data = $req->fetchall();
    return $data;
}

function contacts_titles_details($id) {
    global $db;
    $req = $db->prepare('SELECT * FROM contacts_titles WHERE id= ?');
    $req->execute(array($id));
    $data = $req->fetch();
    return $data;
}

function contacts_titles_del($id) {
    global $db;
    $req = $db->prepare('DELETE FROM contacts_titles WHERE id=?');
    $req->execute(array($id));
}

function article_editwwwwwwwwwwwwww($id, $name, $quantity, $price, $description) {

    global $db;
    $req = $db->prepare('UPDATE contacts_titles SET name=:name, quantity=:quantity, price=:price, description=:description WHERE id=:id');
    $req->execute(array(
        'name' => $name,
        'quantity' => $quantity,
        'price' => $price,
        'description' => $description,
        'id' => $id));
}

function contacts_titles_add($name, $quantity, $price, $description) {
    global $db;
    $req = $db->prepare('INSERT INTO contacts_titles (id,   name,  quantity,  price,  description, status)
                                       VALUES (:id, :name, :quantity, :price, :description, :status)');

    $req->execute(array(
        'id' => null,
        'name' => $name,
        'quantity' => $quantity,
        'price' => $price,
        'description' => $description,
        'status' => 0
            )
    );
}

function contacts_titles_cat_add($article_id, $category_id) {
    global $db;
    $req = $db->prepare('INSERT INTO contacts_titles_categories (id, article_id, category_id)
                                                      VALUES (:id, :article_id, :category_id)');
    $req->execute(array(
        'id' => null,
        'article_id' => $article_id,
        'category_id' => $category_id
            )
    );
}

function contacts_titles_cat_del($article_id, $category_id) {
    global $db;
    $req = $db->prepare('DELETE FROM contacts_titles_categories WHERE (category_id = :category_id AND article_id = :article_id)');
    $req->execute(array(
        'article_id' => $article_id,
        'category_id' => $category_id
            )
    );
}

function contacts_titles_by_category($id_category) {
    global $db;

    $data = null;

    //$req = $db->prepare('SELECT * FROM contacts_titles WHERE type_id= ?');
    $req = $db->prepare('SELECT * FROM `contacts_titles_categories` JOIN contacts_titles WHERE contacts_titles.id = contacts_titles_categories.article_id AND category_id = ?');
    $req->execute(array($id_category));
    $data = $req->fetchall();

    return $data;
}

function contacts_titles_total_by_category($id_category = false) {
    global $db;

    $data = 0;

    if ($id_category) {
        $req = $db->prepare('SELECT COUNT(*) FROM contacts_titles_categories WHERE category_id= ?');
    } else {
        $req = $db->prepare('SELECT COUNT(*) FROM contacts_titles');
    }

    $req->execute(array($id_category));
    $data = $req->fetchall();

    return $data[0][0];
}

function contacts_titles_photos_update($id, $photo) {
    global $db;
    $req = $db->prepare('UPDATE contacts_titles_photos SET photo=:photo WHERE id=:id');
    $req->execute(array(
        'photo' => $photo,
        'id' => $id));
}
function contacts_titles_photos_add($article_id, $photo) {
    global $db;
    $req = $db->prepare('INSERT INTO contacts_titles_photos (id, article_id, photo, principal) VALUES (:id,:article_id,:photo,:principal)');
    $req->execute(array(
        'id' => null,
        'article_id' => $article_id,
        'photo' => $photo,
        'principal' => 0,
        
            
            ));
}

function contacts_titles_photos_principal($article_id, $w = false, $h = false) {
    global $db;
// si la foto existe, mostramos sino la por defecto 
    $data = false;
    $req = $db->prepare("SELECT photo FROM contacts_titles_photos WHERE article_id = :article_id AND principal = 1");
    $req->execute(array(
        'article_id' => $article_id));
    
    $data = $req->fetchall();
    
    
    

    if (file_exists("www/gallery/img/contacts_titles/")) {
        echo "<img class=\"img-responsive\" src=\"www/gallery/img/contacts_titles/203.jpg\" >";
    } else {
        echo "<img class=\"img-responsive\" src=\"www/gallery/img/contacts_titles/art.png\" >";
    }
    
}

function contacts_titles_photos($article_id) {
    global $db;
    $data = false;
    $req = $db->prepare("SELECT * FROM contacts_titles_photos WHERE article_id = :article_id");
    $req->execute(array(
        'article_id' => $article_id));

    $data = $req->fetchall();

    return $data;
}

function contacts_titles_photo_r($id, $w = false, $l = false) {
    // si la foto existe, mostramos sino la por defecto 
    $photo = contacts_titles_field_id("photo", $id);

    if (file_exists("www/gallery/img/contacts_titles/$photo")) {
        return "<img src=\"www/gallery/img/contacts_titles/$photo\" width=\"$w\">";
    } else {
        return "<img src=\"www/gallery/img/contacts_titles/art.png\" width=\"$w\">";
    }
}



function contacts_titles_categories($article_id) {
    global $db;

    $data = false;

    $req = $db->prepare("SELECT category_id FROM contacts_titles_categories WHERE article_id = :article_id ");

    $req->execute(array(
        'article_id' => $article_id));

    $data = $req->fetchall();

    return $data;
}

function contacts_titles_categories_exists($article_id, $category_id) {
    global $db;

    $data = false;

    $req = $db->prepare("SELECT category_id FROM contacts_titles_categories WHERE article_id = :article_id AND category_id = :category_id ");

    $req->execute(array(
        'article_id' => $article_id,
        'category_id' => $category_id,
    ));

    $data = $req->fetchall();

    return $data;
}


function contacts_titles_photos_total($id) {
    global $db;
    $data = 0;
    $req = $db->prepare('SELECT COUNT(*) FROM contacts_titles_photos WHERE article_id= ?');
    $req->execute(array($id));
    $data = $req->fetchall();
    return $data[0][0];
}


function contacts_titles_categories_delete_all($article_id) {
    global $db;

    $data = false;

    $req = $db->prepare("DELETE  FROM contacts_titles_categories WHERE article_id = :article_id ");

    $req->execute(array(
        'article_id' => $article_id));

    $data = $req->fetchall();

    return $data;
}
 * 
 */

