<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$id = (isset($_GET["id"])) ? clean($_GET["id"]) : false;
$code = (isset($_GET["code"])) ? clean($_GET["code"]) : null;
$quantity = (isset($_GET["quantity"])) ? clean($_GET["quantity"]) : false;
$description = (isset($_GET["description"])) ? clean($_GET["description"]) : false;
$price = (isset($_GET["price"])) ? clean($_GET["price"]) : false;
$discounts = (isset($_GET["discounts"])) ? clean($_GET["discounts"]) : false;
$discounts_mode = (($_GET["discounts_mode"]) != "" ) ? clean($_GET["discounts_mode"]) : null;
$tax = (isset($_GET["tax"])) ? clean($_GET["tax"]) : false;

$budget_id = budget_lines_field_id("budget_id", $id);


$error = array();





if (!$id) {
    array_push($error, '$id not send');
}
if (!$budget_id) {
    array_push($error, '$budget_id not send');
}


#************************************************************************
if (!budget_lines_is_id($id)) {
    array_push($error, "budget_id format error");
}

if( $discounts_mode != "%" &&  $discounts > ($price * $quantity) ){
    array_push($error, 'The discount cannot exceed the price');
}

if( $discounts_mode == "%" &&  $discounts > 100 ){
    array_push($error, 'The discount cannot exceed 100%');
}

// Paso a valores positivos 
// Paso a valores positivos 
// Paso a valores positivos 
// Paso a valores positivos 
if ($quantity) {
    $quantity = abs($quantity);
}
if ($price) {
    $price = abs($price);
}
if ($discounts) {
    $discounts = abs($discounts);
}
if ($tax) {
    $tax = abs($tax);
}

################################################################################
################################################################################
################################################################################
################################################################################
################################################################################

if (!$error) {

    budget_lines_edit(
            $id, $budget_id, $code, $quantity, $description, $price, $discounts, $discounts_mode, $tax, 1, 1
    );


    // actualizo el total del presupuesto 
    budgets_update_total_tax(
            $budget_id, 
            budget_lines_totalHTVA($budget_id), 
            budget_lines_totalTVA($budget_id)
            );


    ############################################################################
    ############################################################################
    ############################################################################
   // $id = $budget_id ;

    $level = null ;
    $date = null ;
    //$u_id
    //$u_rol , 
    //$c , $a , 
    $w = null ;
    $description = "Edit line $id from budget ($budget_id) <br>New info[id; $id, budget_id: $budget_id, code: $code, quantity: $quantity, description: $description, price: $price, discounts: $discounts, discounts_mode: $discounts_mode, $tax, 1, 1]" ;
    $doc_id = $budget_id ;
    $crud = "edit" ;
    $error = null ;
    $val_get = ( isset($_GET) ) ? json_encode($_GET) : null ;
    $val_post = ( isset($_POST) ) ? json_encode($_POST) : null ;
    $val_request = ( isset($_REQUEST) ) ? json_encode($_REQUEST) : null ;
    $ip4 = get_user_ip() ;
    $ip6 = get_user_ip6() ;
    $broswer = json_encode(get_user_browser()) ; //https://www.php.net/manual/es/function.get-browser.php

    logs_add(
            $level , $date , $u_id , $u_rol , $c , $a , $w ,
            $description , $doc_id , $crud , $error ,
            $val_get , $val_post , $val_request , $ip4 , $ip6 , $broswer
    ) ;
    ############################################################################
    ############################################################################
    ############################################################################ 


    header("Location: index.php?c=budgets&a=edit&id=$budget_id");
} else {

    include view("home" , "pageError") ;
}    