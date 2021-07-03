<?php
// plugin = projects_inout
// creation date : 
// 
// 
function projects_inout_field_id($field, $id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $field FROM projects_inout WHERE id= ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}


function projects_inout_field_code($field, $code) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $field FROM projects_inout WHERE code= ?");
    $req->execute(array($code));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function projects_inout_search_by_unique($field, $FieldUnique, $valueUnique) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $field FROM projects_inout WHERE   $FieldUnique = ?");
    $req->execute(array($valueUnique));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function projects_inout_list() {
    global $db;
    $limit = 999;

    $data = null;

    $req = $db->prepare("SELECT * FROM projects_inout  ORDER BY order_by LIMIT $limit  ");

    $req->execute(array(
        "limit" => $limit
    ));
    $data = $req->fetchall();
    return $data;
}

function projects_inout_details($id) {
    global $db;
    $req = $db->prepare("SELECT * FROM projects_inout WHERE id= ? ");
    $req->execute(array($id));
    $data = $req->fetch();
    return $data;
}

function projects_inout_delete($id) {
    global $db;
    $req = $db->prepare("DELETE FROM projects_inout WHERE id=? ");
    $req->execute(array($id));
}

function projects_inout_edit($id ,  $project_id ,  $budget_id ,  $invoice_id ,  $expense_id ,  $order_by ,  $status   ) {

    global $db;
    $req = $db->prepare(" UPDATE projects_inout SET "
            
            ."project_id=:project_id , "   
."budget_id=:budget_id , "   
."invoice_id=:invoice_id , "   
."expense_id=:expense_id , "   
."order_by=:order_by , "   
."status=:status  "   

            
                    
            
                    
            . " WHERE id=:id ");
    $req->execute(array(
 "id" =>$id ,   "project_id" =>$project_id ,   "budget_id" =>$budget_id ,   "invoice_id" =>$invoice_id ,   "expense_id" =>$expense_id ,   "order_by" =>$order_by ,   "status" =>$status ,  
                

));
}

function projects_inout_add($project_id ,  $budget_id ,  $invoice_id ,  $expense_id ,  $order_by ,  $status   ) {
    global $db;
    $req = $db->prepare(" INSERT INTO `projects_inout` ( `id` ,   `project_id` ,   `budget_id` ,   `invoice_id` ,   `expense_id` ,   `order_by` ,   `status`   )
                                       VALUES  (:id ,  :project_id ,  :budget_id ,  :invoice_id ,  :expense_id ,  :order_by ,  :status   ) ");

    $req->execute(array(

 "id" => null ,  
 "project_id" => $project_id ,  
 "budget_id" => $budget_id ,  
 "invoice_id" => $invoice_id ,  
 "expense_id" => $expense_id ,  
 "order_by" => $order_by ,  
 "status" => $status   
                        
            )
    );
    
     return $db->lastInsertId();
}



function projects_inout_search($txt) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT * FROM projects_inout 
    
            WHERE id like :txt OR id like :txt
OR project_id like :txt
OR budget_id like :txt
OR invoice_id like :txt
OR expense_id like :txt
OR order_by like :txt
OR status like :txt
                           
");
    $req->execute(array(
        "txt" => "%$txt%"
    ));
    $data = $req->fetchall();
    return $data;
}



function projects_inout_select($k, $v, $selected="", $disabled=array()) {    
    $c = "";    
    foreach (projects_inout_list() as $key => $value) {        
        $s = ($selected == $value[$k])?" selected  ":"";       
        $d = ( in_array($value[$k], $disabled )) ? " disabled ":"";                        
        $c .= "<option value=\"$value[$k]\" $s $d >". ucfirst($value[$v])."</option>" ;
    }    
    echo  $c;     
}
function projects_inout_is_id($id){
     return true;
}

function projects_inout_is_project_id($project_id){
     return true;
}

function projects_inout_is_budget_id($budget_id){
     return true;
}

function projects_inout_is_invoice_id($invoice_id){
     return true;
}

function projects_inout_is_expense_id($expense_id){
     return true;
}

function projects_inout_is_order_by($order_by){
     return true;
}

function projects_inout_is_status($status){
     return true;
}

