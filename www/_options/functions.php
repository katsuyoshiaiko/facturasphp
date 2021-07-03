<?php
// plugin = _options
// creation date : 
// 
// 
function _options_field_id($field, $id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $field FROM _options WHERE id= ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function _options_search_by_unique($field, $FieldUnique, $valueUnique) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $field FROM banks WHERE $FieldUnique = ?");
    $req->execute(array($valueUnique));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function _options_list() {
    global $db;
    $limit = 999;

    $data = null;

    $req = $db->prepare("SELECT * FROM `_options` ORDER BY `group`, `option` DESC ");

    $req->execute(array(
        
    ));
    $data = $req->fetchall();
    return $data;
}

function _options_details($id) {
    global $db;
    $req = $db->prepare("SELECT * FROM _options WHERE id= ? ");
    $req->execute(array($id));
    $data = $req->fetch();
    return $data;
}

function _options_delete($id) {
    global $db;
    $req = $db->prepare("DELETE FROM _options WHERE id=? ");
    $req->execute(array($id));
}

function _options_edit($id ,  $option ,  $data ,  $group   ) {

    global $db;
    $req = $db->prepare(" UPDATE `_options` SET `option` = :option, `data` =:data , `group` =:group  WHERE `id`=:id ");
    $req->execute(array(
 "id" =>$id ,   "option" =>$option ,   "data" =>$data ,   "group" =>$group ,  
                

));
}

function _options_add($option ,  $data ,  $group   ) {
    global $db;
    $req = $db->prepare(" INSERT INTO `_options` ( `id` ,   `option` ,   `data` ,   `group`   )
                                       VALUES  (:id ,  :option ,  :data ,  :group   ) ");

    $req->execute(array(

 "id" => null ,  
 "option" => $option ,  
 "data" => $data ,  
 "group" => $group   
                        
            )
    );
    
     return $db->lastInsertId();

     
     
     
}



function _options_search($txt) {
    global $db;
    $data = null;
    $req = $db->prepare(
            
            "SELECT * FROM `_options`     
            WHERE 
            `id` like :txt             
            OR `option` like :txt
            OR `data` like :txt
            OR `group` like :txt
                           
");
    $req->execute(array(
        "txt" => "%$txt%"
    ));
    $data = $req->fetchall();
    return $data;
}



function _options_select($k, $v, $selected="", $disabled=array()) {    
    $c = "";    
    foreach (_options_list() as $key => $value) {        
        $s = ($selected == $value[$k])?" selected  ":"";       
        $d = ( in_array($value[$k], $disabled )) ? " disabled ":"";                        
        $c .= "<option value=\"$value[$k]\" $s $d >". ucfirst($value[$v])."</option>" ;
    }    
    echo  $c;     
}
function _options_is_id($id){
     return true;
}

function _options_is_option($option){
     return true;
}

function _options_is_data($data){
     return true;
}

function _options_is_group($group){
     return true;
}

//////////////////////////////////////
//////////////////////////////////////
//////////////////////////////////////
//////////////////////////////////////
/////////////////////////////////////
///
function _options_option($option) {
    global $db ;
    $data = null ;
    $req = $db->prepare("SELECT `data` FROM `_options` WHERE `option` = :option ") ;
    $req->execute(array(
        "option" => $option
    )) ;
    $data = $req->fetch() ;
    return (isset($data['data'])) ? $data['data'] : false ;
}

function _options_update($option , $new_data) {

    global $db ;
    $req = $db->prepare(" UPDATE `_options` SET `data` = :data WHERE `_options` = :option  ") ;
    $req->execute(array(
        "option" => $option ,
        "data" => $new_data
    )) ;
}
// si no existe lo crea
function _options_push($option , $new_data, $group = null) {
    
    // si existe lo pone al dia
    if(_options_exist($option)){
        //echo "$option " ;
        _options_update($option , $new_data);
        
        
    }else{ // si no lo crea
        _options_add($option, $new_data, $group);

    }
  
}


function _options_list_groups() {
    global $db;
    $limit = 999;

    $data = null;

    $req = $db->prepare("SELECT * FROM `_options` GROUP BY `group`  ");

    $req->execute(array(
     //   "limit" => $limit
    ));
    $data = $req->fetchall();
    return $data;
}



function _options_search_by_group($group) {
    global $db;
    $data = null;
    $req = $db->prepare(
            
            "SELECT * FROM _options     
            WHERE `group` = :group
            
");
    $req->execute(array(
        "group" => "$group"
    ));
    $data = $req->fetchall();
    return $data;
}

function _options_exist($option) {
    global $db;
    $data = null;
    $req = $db->prepare(
            
            "SELECT id FROM `_options` WHERE  `option` = :option
                
");
    $req->execute(array(
        "option" => $option
    ));
    $data = $req->fetch();
    return $data;
}