<?php

function _menus_list_by_father($father) {
    global $db;
    $limit = 999;
    $data = null;
    $req = $db->prepare("SELECT * FROM _menus WHERE father=:father ORDER BY order_by DESC LIMIT $limit ");
    $req->execute(array(
        "father" => $father
    ));
    $data = $req->fetchall();
    return $data;
}

function _menus_list_by_location($location) {
    global $db;
    $limit = 999;
    $data = null;
    $req = $db->prepare("SELECT DISTINCT * FROM _menus WHERE location=:location ORDER BY order_by   LIMIT $limit ");
    $req->execute(array(
        "location" => $location
    ));
    $data = $req->fetchall();
    return $data;
}
function _menus_location_list($location=null) {
    global $db;
    $limit = 999;
    $data = null;
    $req = $db->prepare("SELECT location FROM _menus  GROUP BY location ORDER BY location ");
    $req->execute(array(
        "location" => $location
    ));
    $data = $req->fetchall();
    return $data;
}

function _menus_list_child_by_father($father) {
    global $db;
    $limit = 999;
    $data = null;
    $req = $db->prepare("SELECT * FROM _menus WHERE father=:father ORDER BY order_by  LIMIT $limit ");
    $req->execute(array(
        "father" => $father
    ));
    $data = $req->fetchall();
    return $data;
}

function _menus_list_by_father_location($father, $location) {
    global $db;
    $limit = 999;
    $data = null;
    $req = $db->prepare("SELECT * FROM _menus WHERE father=:father and location=:location ORDER BY order_by DESC LIMIT $limit ");
    $req->execute(array(
        "father" => $father,
        "location" => $location
    ));
    $data = $req->fetchall();
    return $data;
}

function _menus_dropdown($location) {

    foreach (_menus_list_by_location($location) as $key => $top) {
        if ($top["father"] == "") {
            if (_menus_list_by_father_location($top["label"], $location)) {

                echo ' <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                ' . $top["label"] . '
                                <span class="caret"></span></a>
                            <ul class="dropdown-menu">';
                foreach (_menus_list_by_father_location($top["label"], $location) as $key => $childs) {
                    echo '<li><a  href="' . $childs["url"] . '"><i class="' . $childs["icon"] . '"></i> ' . $childs["label"] . '</a></li>';
                }
                echo '                                                
                            </ul>
                        </li>';
            } else {
                echo '<li><a href="' . $top["url"] . '"><i class="' . $top["icon"] . '"></i> ' . $top["label"] . ' </a></li>';
            }
        } 
    }
}
