<?php
if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
// Recolection vars

include view("home", "disabled");
die(); 

$id = (isset($_POST["id"])) ? clean($_POST["id"]) : false;
$date = (isset($_POST["date"])) ? clean($_POST["date"]) : false;
$sender_id = (isset($_POST["sender_id"])) ? clean($_POST["sender_id"]) : false;
$doc = (isset($_POST["doc"])) ? clean($_POST["doc"]) : false;
$doc_id = (isset($_POST["doc_id"])) ? clean($_POST["doc_id"]) : false;
$comment = (isset($_POST["comment"])) ? clean($_POST["comment"]) : false;
$order_by = (isset($_POST["order_by"])) ? clean($_POST["order_by"]) : false;
$status = (isset($_POST["status"])) ? clean($_POST["status"]) : false;
 



$error = array();
//
################################################################################
if (! $c) {
    array_push($error, "Controller Don't send");
}
//
if (! $a) {
    array_push($error, "Action Don't send");
}
//
if (! $id) {
    array_push($error, "ID Don't send");
}
//
if (! $text) {
   // array_push($error, "Text Don't send");
}
//
################################################################################

if (! comments_is_id($id)) {
    array_push($error, "ID format error");
}
//
################################################################################
if (! $error ) {
    
    comments_edit(
        


$id ,  $date ,  $sender_id ,  $doc ,  $doc_id ,  $comment ,  $order_by ,  $status    



                
        );
        header("Location: index.php?c=comments&a=details&id=$id");
          
}

$comments = comments_details($id);
    
include view("comments", "index");  
