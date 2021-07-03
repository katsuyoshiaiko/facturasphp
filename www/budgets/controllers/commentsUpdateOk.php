<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$budget_id = (isset($_POST["budget_id"])) ? clean($_POST["budget_id"]) : false;
$comments = (($_POST["comments"]) != "") ? clean($_POST["comments"]) : '-';
$error = array();




if (!$budget_id) {
    array_push($error, '$budget_id not send');
}



if (!$error) {
    budgets_comments_update(
            $budget_id, $comments
    );




    header("Location: index.php?c=budgets&a=edit&id=$budget_id#comments");
} else {

    include view("home", "pageError");
}
