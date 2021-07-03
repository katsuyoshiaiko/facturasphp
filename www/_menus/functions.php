<?php
// plugin = _menus
// creation date : 
// 
// 
function _menus_field_id($field, $id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $field FROM _menus WHERE id= ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function _menus_search_by_unique($field, $FieldUnique, $valueUnique) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $field FROM banks WHERE $FieldUnique = ?");
    $req->execute(array($valueUnique));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function _menus_list() {
    global $db;
    $limit = 999;

    $data = null;

    $req = $db->prepare("SELECT * FROM _menus ORDER BY id DESC LIMIT $limit ");

    $req->execute(array(
        "limit" => $limit
    ));
    $data = $req->fetchall();
    return $data;
}

function _menus_details($id) {
    global $db;
    $req = $db->prepare("SELECT * FROM _menus WHERE id= ? ");
    $req->execute(array($id));
    $data = $req->fetch();
    return $data;
}

function _menus_delete($id) {
    global $db;
    $req = $db->prepare("DELETE FROM _menus WHERE id=? ");
    $req->execute(array($id));
}

function _menus_edit($id ,  $location ,  $father ,  $label ,  $url ,  $icon ,  $order_by   ) {

    global $db;
    $req = $db->prepare(" UPDATE _menus SET "
            
            ."location=:location , "   
."father=:father , "   
."label=:label , "   
."url=:url , "   
."icon=:icon , "   
."order_by=:order_by  "   

            
                    
            
                    
            . " WHERE id=:id ");
    $req->execute(array(
 "id" =>$id ,   "location" =>$location ,   "father" =>$father ,   "label" =>$label ,   "url" =>$url ,   "icon" =>$icon ,   "order_by" =>$order_by ,  
                

));
}

function _menus_add($location ,  $father ,  $label ,  $url ,  $icon ,  $order_by   ) {
    global $db;
    $req = $db->prepare(" INSERT INTO `_menus` ( `id` ,   `location` ,   `father` ,   `label` ,   `url` ,   `icon` ,   `order_by`   )
                                       VALUES  (:id ,  :location ,  :father ,  :label ,  :url ,  :icon ,  :order_by   ) ");

    $req->execute(array(

 "id" => null ,  
 "location" => $location ,  
 "father" => $father ,  
 "label" => $label ,  
 "url" => $url ,  
 "icon" => $icon ,  
 "order_by" => $order_by   
                        
            )
    );
    
     return $db->lastInsertId();
}



function _menus_search($txt) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT * FROM _menus 
    
            WHERE id like :txt OR id like :txt
OR location like :txt
OR father like :txt
OR label like :txt
OR url like :txt
OR icon like :txt
OR order_by like :txt
                           
");
    $req->execute(array(
        "txt" => "%$txt%"
    ));
    $data = $req->fetchall();
    return $data;
}



function _menus_select($k, $v, $selected="", $disabled=array()) {    
    $c = "";    
    foreach (_menus_list() as $key => $value) {        
        $s = ($selected == $value[$k])?" selected  ":"";       
        $d = ( in_array($value[$k], $disabled )) ? " disabled ":"";                        
        $c .= "<option value=\"$value[$k]\" $s $d >". ucfirst($value[$v])."</option>" ;
    }    
    echo  $c;     
}
function _menus_is_id($id){
     return true;
}

function _menus_is_location($location){
     return true;
}

function _menus_is_father($father){
     return true;
}

function _menus_is_label($label){
     return true;
}

function _menus_is_url($url){
     return true;
}

function _menus_is_icon($icon){
     return true;
}

function _menus_is_order_by($order_by){
     return true;
}


function _menus_list_e() {
    global $db;
    $limit = 999;

    $data = null;

    $req = $db->prepare("SELECT * FROM _menus ORDER BY order_by DESC,  location, father, label LIMIT $limit ");

    $req->execute(array(
        "limit" => $limit
    ));
    $data = $req->fetchall();
    return $data;
}

function _menus_search_by_location($location) {
    global $db;
    $limit = 999;

    $data = null;

    $req = $db->prepare("SELECT * FROM _menus WHERE location =:location ORDER BY location, father, order_by, label LIMIT $limit ");

    $req->execute(array(
        "location" => $location
    ));
    $data = $req->fetchall();
    return $data;
}
function _menus_search_by_location_father($location, $father) {
    global $db;
    $limit = 999;

    $data = null;

    $req = $db->prepare("SELECT * FROM _menus WHERE location =:location AND father=:father ORDER BY  order_by DESC, label LIMIT $limit ");

    $req->execute(array(
        "location" => $location,
        "father" => $father
    ));
    $data = $req->fetchall();
    return $data;
}

function _menu_icon_by_location_label($location, $label) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT icon FROM _menus WHERE location = :location AND label = :label");
    $req->execute(array(
        "location"=>$location, 
        "label"=>$label
    ));
    $data = $req->fetch();    
    return  (isset($data[0]))?$data[0]:false ;
}

function _menu_icon($location, $label){
    $icon = _menu_icon_by_location_label($location, $label);             
    echo ($icon)? "<i class=\"$icon\"></i>" : "<i class=\"fas fa-folder\"></i>";  
}