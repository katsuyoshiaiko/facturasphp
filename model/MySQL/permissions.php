<?php
function permissions_permission($rol, $controller) {
    global $db;
    
    $req = $db->prepare('SELECT crud FROM permissions WHERE rol=:rol AND controller=:controller');

    $req->execute(
            array(
                'controller' => $controller,
                'rol' => $rol
            ));
    
    $data = $req->fetch();
    
    return (isset($data[0]))? $data[0] : "0000";
    //return 1;
}

function permissions_has_permission($rol, $controller, $action) {
    // verificar si existe el controlador 
    // verificar si existe el rol
    // verificar si existe la acction 
    
    
    $p = permissions_permission($rol, $controller); 
    
    switch ($action) {
        case "create":
            return ( $p[0] == 1 )? TRUE : false ;
            
        
        case "read":
            return ( $p[1] == 1 )? TRUE : false ; // this control the securyty in site, take care 
            
        
        case "update":
            return ( $p[2] == 1 )? TRUE : false ;
            
        
        case "delete":
            return ( $p[3] == 1 )? TRUE : false ;
            

        default:
            return false;
            
    }
}