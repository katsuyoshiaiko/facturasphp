<?php

function _options_options_field_id($field, $id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $field FROM _options_options WHERE id= ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}


function _options_options_field_code($field, $code) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $field FROM _options_options WHERE code= ?");
    $req->execute(array($code));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function _options_options_search_by_unique($field, $FieldUnique, $valueUnique) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $field FROM _options_options WHERE   $FieldUnique = ?");
    $req->execute(array($valueUnique));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function _options_options_list() {
    global $db;
    $limit = 999;

    $data = null;

    $req = $db->prepare("SELECT * FROM _options_options  ORDER BY order_by LIMIT $limit  ");

    $req->execute(array(
        "limit" => $limit
    ));
    $data = $req->fetchall();
    return $data;
}

function _options_options_details($id) {
    global $db;
    $req = $db->prepare("SELECT * FROM _options_options WHERE id= ? ");
    $req->execute(array($id));
    $data = $req->fetch();
    return $data;
}

function _options_options_delete($id) {
    global $db;
    $req = $db->prepare("DELETE FROM _options_options WHERE id=? ");
    $req->execute(array($id));
}

function _options_options_edit($id ,  $_tmf_materials_options_id ,  $disabled_id ,  $order_by ,  $status   ) {

    global $db;
    $req = $db->prepare(" UPDATE _options_options SET "
            
            ."_tmf_materials_options_id=:_tmf_materials_options_id , "   
."disabled_id=:disabled_id , "   
."order_by=:order_by , "   
."status=:status  "   

            
                    
            
                    
            . " WHERE id=:id ");
    $req->execute(array(
 "id" =>$id ,   "_tmf_materials_options_id" =>$_tmf_materials_options_id ,   "disabled_id" =>$disabled_id ,   "order_by" =>$order_by ,   "status" =>$status ,  
                

));
}

function _options_options_add($_tmf_materials_options_id ,  $disabled_id ,  $order_by ,  $status   ) {
    global $db;
    $req = $db->prepare(" INSERT INTO `_options_options` ( `id` ,   `_tmf_materials_options_id` ,   `disabled_id` ,   `order_by` ,   `status`   )
                                       VALUES  (:id ,  :_tmf_materials_options_id ,  :disabled_id ,  :order_by ,  :status   ) ");

    $req->execute(array(

 "id" => null ,  
 "_tmf_materials_options_id" => $_tmf_materials_options_id ,  
 "disabled_id" => $disabled_id ,  
 "order_by" => $order_by ,  
 "status" => $status   
                        
            )
    );
    
     return $db->lastInsertId();
}



function _options_options_search($txt) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT * FROM _options_options 
    
            WHERE id like :txt OR id like :txt
OR _tmf_materials_options_id like :txt
OR disabled_id like :txt
OR order_by like :txt
OR status like :txt
                           
");
    $req->execute(array(
        "txt" => "%$txt%"
    ));
    $data = $req->fetchall();
    return $data;
}



function _options_options_select($k, $v, $selected="", $disabled=array()) {    
    $c = "";    
    foreach (_options_options_list() as $key => $value) {        
        $s = ($selected == $value[$k])?" selected  ":"";       
        $d = ( in_array($value[$k], $disabled )) ? " disabled ":"";                        
        $c .= "<option value=\"$value[$k]\" $s $d >". ucfirst($value[$v])."</option>" ;
    }    
    echo  $c;     
}
function _options_options_is_id($id){
     return true;
}

function _options_options_is__tmf_materials_options_id($_tmf_materials_options_id){
     return true;
}

function _options_options_is_disabled_id($disabled_id){
     return true;
}

function _options_options_is_order_by($order_by){
     return true;
}

function _options_options_is_status($status){
     return true;
}
function _options_options_search_by_type_id($type_id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT * FROM -----options_options 
    
            WHERE type_id like :type_id ORDER BY type_id DESC, selected_id DESC, disabled_id DESC 
                           
");
    $req->execute(array(
        "type_id" => $type_id
    ));
    $data = $req->fetchall();
    return $data;
}


function _options_options_search_disabled_id_by_tmf_materials_options_id($_tmf_materials_options_id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT disabled_id FROM _options_options 
    
            WHERE _tmf_materials_options_id = :_tmf_materials_options_id  
                           
");
    $req->execute(array(
        "_tmf_materials_options_id" => $_tmf_materials_options_id
    ));
    $data = $req->fetchall();
    return $data;
}

/*
function options_options_search_byType_selected_id($type_id, $selected_id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT * FROM options_options 
    
            WHERE type_id = :type_id AND selected_id=:selected_id ORDER BY disabled_id DESC 
                           
");
    $req->execute(array(
        "type_id" => $type_id,
        "selected_id" => $selected_id
    ));
    $data = $req->fetchall();
    return $data;
}

function options_options_delete_by_type_selected_id($type_id, $selected_id) {
    global $db;
    $data = null;
    $req = $db->prepare("DELETE FROM options_options WHERE type_id = :type_id AND selected_id=:selected_id  
                           
");
    $req->execute(array(
        "type_id" => $type_id,
        "selected_id" => $selected_id
    ));
    $data = $req->fetchall();
    return $data;
}

function options_options_list_all() {
    global $db;
    $limit = 999;

    $data = null;

    $req = $db->prepare("SELECT * FROM options_options ORDER BY id DESC LIMIT $limit  ");

    $req->execute(array(
        "limit" => $limit
    ));
    $data = $req->fetchall();
    return $data;
}

*/

function _options_options_modal($modalId, $title, $button = array("btn" => 'default'), $view = array(), $options_options = array(), $rename = array()) {
    echo '
<button type="button" class="btn btn-' . $button["btn"] . ' btn-xs" data-toggle="modal" data-target="#' . $modalId . '">
    ' . $button["label"] . '
</button>



<!-- Modal -->
<div class="modal fade" id="' . $modalId . '" tabindex="-1" role="dialog" aria-labelledby="' . $modalId . 'Label">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="' . $modalId . 'Label">
                    ' . $title . '
                </h4>
            </div>
            <div class="modal-body">';

    include view($view['c'], $view['a'], $options_options);

    echo '</div>

        </div>
    </div>
</div>';
}
/**
 * Borra todos los disabled de este id
 * @global type $db
 * @param type $_tmf_materials_options_id
 */
function _options_options_delete_by_tmf_materials_options_id( $_tmf_materials_options_id ) {
    global $db;
    $req = $db->prepare("DELETE FROM `_options_options` WHERE `_tmf_materials_options_id` = ? ");
    $req->execute(array($_tmf_materials_options_id));
}
