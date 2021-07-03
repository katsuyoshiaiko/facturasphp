<?php
// plugin = magia
// creation date : 
// 
// 
function magia_field_id($field, $id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $field FROM magia WHERE id= ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function magia_search_by_unique($field, $FieldUnique, $valueUnique) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $field FROM banks WHERE $FieldUnique = ?");
    $req->execute(array($valueUnique));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function magia_list() {
    global $db;
    $limit = 999;

    $data = null;

    $req = $db->prepare("SELECT * FROM magia ORDER BY id DESC LIMIT $limit ");

    $req->execute(array(
        "limit" => $limit
    ));
    $data = $req->fetchall();
    return $data;
}

function magia_details($id) {
    global $db;
    $req = $db->prepare("SELECT * FROM magia WHERE id= ? ");
    $req->execute(array($id));
    $data = $req->fetch();
    return $data;
}

function magia_delete($id) {
    global $db;
    $req = $db->prepare("DELETE FROM magia WHERE id=? ");
    $req->execute(array($id));
}

function magia_edit($id ,  $base_datos ,  $tabla ,  $campo ,  $accion ,  $label ,  $tipo ,  $clase ,  $tabla_externa ,  $columna_externa ,  $nombre ,  $identificador ,  $marca_agua ,  $valor ,  $solo_lectura ,  $obligatorio ,  $seleccionado ,  $desactivado ,  $orden ,  $estatus   ) {

    global $db;
    $req = $db->prepare(" UPDATE magia SET "
            
            ."base_datos=:base_datos , "   
."tabla=:tabla , "   
."campo=:campo , "   
."accion=:accion , "   
."label=:label , "   
."tipo=:tipo , "   
."clase=:clase , "   
."tabla_externa=:tabla_externa , "   
."columna_externa=:columna_externa , "   
."nombre=:nombre , "   
."identificador=:identificador , "   
."marca_agua=:marca_agua , "   
."valor=:valor , "   
."solo_lectura=:solo_lectura , "   
."obligatorio=:obligatorio , "   
."seleccionado=:seleccionado , "   
."desactivado=:desactivado , "   
."orden=:orden , "   
."estatus=:estatus  "   

            
                    
            
                    
            . " WHERE id=:id ");
    $req->execute(array(
 "id" =>$id ,   "base_datos" =>$base_datos ,   "tabla" =>$tabla ,   "campo" =>$campo ,   "accion" =>$accion ,   "label" =>$label ,   "tipo" =>$tipo ,   "clase" =>$clase ,   "tabla_externa" =>$tabla_externa ,   "columna_externa" =>$columna_externa ,   "nombre" =>$nombre ,   "identificador" =>$identificador ,   "marca_agua" =>$marca_agua ,   "valor" =>$valor ,   "solo_lectura" =>$solo_lectura ,   "obligatorio" =>$obligatorio ,   "seleccionado" =>$seleccionado ,   "desactivado" =>$desactivado ,   "orden" =>$orden ,   "estatus" =>$estatus ,  
                

));
}

function magia_add($base_datos ,  $tabla ,  $campo ,  $accion ,  $label ,  $tipo ,  $clase ,  $tabla_externa ,  $columna_externa ,  $nombre ,  $identificador ,  $marca_agua ,  $valor ,  $solo_lectura ,  $obligatorio ,  $seleccionado ,  $desactivado ,  $orden ,  $estatus   ) {
    global $db;
    $req = $db->prepare(" INSERT INTO `magia` ( `id` ,   `base_datos` ,   `tabla` ,   `campo` ,   `accion` ,   `label` ,   `tipo` ,   `clase` ,   `tabla_externa` ,   `columna_externa` ,   `nombre` ,   `identificador` ,   `marca_agua` ,   `valor` ,   `solo_lectura` ,   `obligatorio` ,   `seleccionado` ,   `desactivado` ,   `orden` ,   `estatus`   )
                                       VALUES  (:id ,  :base_datos ,  :tabla ,  :campo ,  :accion ,  :label ,  :tipo ,  :clase ,  :tabla_externa ,  :columna_externa ,  :nombre ,  :identificador ,  :marca_agua ,  :valor ,  :solo_lectura ,  :obligatorio ,  :seleccionado ,  :desactivado ,  :orden ,  :estatus   ) ");

    $req->execute(array(

 "id" => null ,  
 "base_datos" => $base_datos ,  
 "tabla" => $tabla ,  
 "campo" => $campo ,  
 "accion" => $accion ,  
 "label" => $label ,  
 "tipo" => $tipo ,  
 "clase" => $clase ,  
 "tabla_externa" => $tabla_externa ,  
 "columna_externa" => $columna_externa ,  
 "nombre" => $nombre ,  
 "identificador" => $identificador ,  
 "marca_agua" => $marca_agua ,  
 "valor" => $valor ,  
 "solo_lectura" => $solo_lectura ,  
 "obligatorio" => $obligatorio ,  
 "seleccionado" => $seleccionado ,  
 "desactivado" => $desactivado ,  
 "orden" => $orden ,  
 "estatus" => $estatus   
                        
            )
    );
    
     return $db->lastInsertId();
}



function magia_search($txt) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT * FROM magia 
    
            WHERE id like :txt OR id like :txt
OR base_datos like :txt
OR tabla like :txt
OR campo like :txt
OR accion like :txt
OR label like :txt
OR tipo like :txt
OR clase like :txt
OR tabla_externa like :txt
OR columna_externa like :txt
OR nombre like :txt
OR identificador like :txt
OR marca_agua like :txt
OR valor like :txt
OR solo_lectura like :txt
OR obligatorio like :txt
OR seleccionado like :txt
OR desactivado like :txt
OR orden like :txt
OR estatus like :txt
                           
");
    $req->execute(array(
        "txt" => "%$txt%"
    ));
    $data = $req->fetchall();
    return $data;
}



function magia_select($k, $v, $selected="", $disabled=array()) {    
    $c = "";    
    foreach (magia_list() as $key => $value) {        
        $s = ($selected == $value[$k])?" selected  ":"";       
        $d = ( in_array($value[$k], $disabled )) ? " disabled ":"";                        
        $c .= "<option value=\"$value[$k]\" $s $d >". ucfirst($value[$v])."</option>" ;
    }    
    echo  $c;     
}
function magia_is_id($id){
     return true;
}

function magia_is_base_datos($base_datos){
     return true;
}

function magia_is_tabla($tabla){
     return true;
}

function magia_is_campo($campo){
     return true;
}

function magia_is_accion($accion){
     return true;
}

function magia_is_label($label){
     return true;
}

function magia_is_tipo($tipo){
     return true;
}

function magia_is_clase($clase){
     return true;
}

function magia_is_tabla_externa($tabla_externa){
     return true;
}

function magia_is_columna_externa($columna_externa){
     return true;
}

function magia_is_nombre($nombre){
     return true;
}

function magia_is_identificador($identificador){
     return true;
}

function magia_is_marca_agua($marca_agua){
     return true;
}

function magia_is_valor($valor){
     return true;
}

function magia_is_solo_lectura($solo_lectura){
     return true;
}

function magia_is_obligatorio($obligatorio){
     return true;
}

function magia_is_seleccionado($seleccionado){
     return true;
}

function magia_is_desactivado($desactivado){
     return true;
}

function magia_is_orden($orden){
     return true;
}

function magia_is_estatus($estatus){
     return true;
}


function magia_db_list_tables_by_db($base_datos) {
    global $db ;
    $req = $db->prepare(
           "SELECT DISTINCT `tabla` 
            FROM `magia`             
            WHERE `base_datos` = ? 
            GROUP BY `tabla`
            ") ;
    $req->execute(array(
        $base_datos
    )) ;
    $data = $req->fetchall() ;
    return $data ;
}

function magia_db_list_campos_by_table($t) {
    global $db ;
    $req = $db->prepare(
           "SELECT DISTINCT `campo` 
            FROM `magia`             
            WHERE `tabla` = ? 
            GROUP BY `campo`
            ") ;
    $req->execute(array(
        $t
    )) ;
    $data = $req->fetchall() ;
    return $data ;
}


function magia_search_by_db($base_datos) {
    global $db ;
    $req = $db->prepare(
           "SELECT * 
            FROM `magia` 
            WHERE `base_datos` = ? ") ;
    $req->execute(array(
        $base_datos
    )) ;
    $data = $req->fetchall() ;
    return $data ;
}

function magia_search_by_tabla($tabla) {
    global $db ;
    $req = $db->prepare("SELECT * FROM magia WHERE tabla = ? ") ;
    $req->execute(array(
        $tabla
    )) ;
    $data = $req->fetchall() ;
    return $data ;
}
function magia_search_by_table_field($t, $f) {
    global $db ;
    $req = $db->prepare(
           "SELECT * 
            FROM magia 
            WHERE tabla =:tabla AND campo = :campo ") ;
    $req->execute(array(
        "tabla"=> $t, 
        "campo"=> $f
    )) ;
    $data = $req->fetchall() ;
    return $data ;
}

function magia_search_by_tabla_accion($tabla , $accion) {
    global $db ;
    $req = $db->prepare("SELECT * FROM magia WHERE  accion = :accion ") ;
    $req->execute(array(
        //"tabla" => $tabla ,
        "accion" => $accion
    )) ;
    $data = $req->fetchall() ;
    return $data ;
}

function magia_e_lista_de_tablas() {
    global $db ;
    $limit = 999 ;

    $data = null ;

    $req = $db->prepare("SELECT distinct(tabla) FROM magia ") ;

    $req->execute(array(
        "limit" => $limit
    )) ;
    $data = $req->fetchall() ;
    return $data ;
}
