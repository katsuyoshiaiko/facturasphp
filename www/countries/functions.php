<?php
// plugin = countries
// creation date : 
// 
// 
function countries_field_id($field, $id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $field FROM countries WHERE id= ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}
function countries_country_by_country_code($country_code) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT countryName FROM countries WHERE countryCode = ?");
    $req->execute(array($country_code));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function countries_search_by_unique($field, $FieldUnique, $valueUnique) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $field FROM banks WHERE $FieldUnique = ?");
    $req->execute(array($valueUnique));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function countries_list() {
    global $db;
    $limit = 999;

    $data = null;

    $req = $db->prepare("SELECT * FROM countries ORDER BY countryName LIMIT $limit ");

    $req->execute(array(
        "limit" => $limit
    ));
    $data = $req->fetchall();
    return $data;
}

function countries_details($id) {
    global $db;
    $req = $db->prepare("SELECT * FROM countries WHERE id= ? ");
    $req->execute(array($id));
    $data = $req->fetch();
    return $data;
}

function countries_delete($id) {
    global $db;
    $req = $db->prepare("DELETE FROM countries WHERE id=? ");
    $req->execute(array($id));
}

function countries_edit($id ,  $countryCode ,  $countryName ,  $currencyCode ,  $fipsCode ,  $isoNumeric ,  $north ,  $south ,  $east ,  $west ,  $capital ,  $continentName ,  $continent ,  $languages ,  $isoAlpha3 ,  $geonameId   ) {

    global $db;
    $req = $db->prepare(" UPDATE countries SET "
            
            ."countryCode=:countryCode , "   
."countryName=:countryName , "   
."currencyCode=:currencyCode , "   
."fipsCode=:fipsCode , "   
."isoNumeric=:isoNumeric , "   
."north=:north , "   
."south=:south , "   
."east=:east , "   
."west=:west , "   
."capital=:capital , "   
."continentName=:continentName , "   
."continent=:continent , "   
."languages=:languages , "   
."isoAlpha3=:isoAlpha3 , "   
."geonameId=:geonameId  "   

            
                    
            
                    
            . " WHERE id=:id ");
    $req->execute(array(
 "id" =>$id ,   "countryCode" =>$countryCode ,   "countryName" =>$countryName ,   "currencyCode" =>$currencyCode ,   "fipsCode" =>$fipsCode ,   "isoNumeric" =>$isoNumeric ,   "north" =>$north ,   "south" =>$south ,   "east" =>$east ,   "west" =>$west ,   "capital" =>$capital ,   "continentName" =>$continentName ,   "continent" =>$continent ,   "languages" =>$languages ,   "isoAlpha3" =>$isoAlpha3 ,   "geonameId" =>$geonameId ,  
                

));
}

function countries_add($countryCode ,  $countryName ,  $currencyCode ,  $fipsCode ,  $isoNumeric ,  $north ,  $south ,  $east ,  $west ,  $capital ,  $continentName ,  $continent ,  $languages ,  $isoAlpha3 ,  $geonameId   ) {
    global $db;
    $req = $db->prepare(" INSERT INTO `countries` ( `id` ,   `countryCode` ,   `countryName` ,   `currencyCode` ,   `fipsCode` ,   `isoNumeric` ,   `north` ,   `south` ,   `east` ,   `west` ,   `capital` ,   `continentName` ,   `continent` ,   `languages` ,   `isoAlpha3` ,   `geonameId`   )
                                       VALUES  (:id ,  :countryCode ,  :countryName ,  :currencyCode ,  :fipsCode ,  :isoNumeric ,  :north ,  :south ,  :east ,  :west ,  :capital ,  :continentName ,  :continent ,  :languages ,  :isoAlpha3 ,  :geonameId   ) ");

    $req->execute(array(

 "id" => null ,  
 "countryCode" => $countryCode ,  
 "countryName" => $countryName ,  
 "currencyCode" => $currencyCode ,  
 "fipsCode" => $fipsCode ,  
 "isoNumeric" => $isoNumeric ,  
 "north" => $north ,  
 "south" => $south ,  
 "east" => $east ,  
 "west" => $west ,  
 "capital" => $capital ,  
 "continentName" => $continentName ,  
 "continent" => $continent ,  
 "languages" => $languages ,  
 "isoAlpha3" => $isoAlpha3 ,  
 "geonameId" => $geonameId   
                        
            )
    );
    
     return $db->lastInsertId();
}



function countries_search($txt) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT * FROM countries 
    
            WHERE id like :txt OR id like :txt
OR countryCode like :txt
OR countryName like :txt
OR currencyCode like :txt
OR fipsCode like :txt
OR isoNumeric like :txt
OR north like :txt
OR south like :txt
OR east like :txt
OR west like :txt
OR capital like :txt
OR continentName like :txt
OR continent like :txt
OR languages like :txt
OR isoAlpha3 like :txt
OR geonameId like :txt
                           
");
    $req->execute(array(
        "txt" => "%$txt%"
    ));
    $data = $req->fetchall();
    return $data;
}



function countries_select($k, $v, $selected="", $disabled=array()) {    
    $c = "";    
    foreach (countries_list() as $key => $value) {        
        $s = ($selected == $value[$k])?" selected  ":"";       
        $d = ( in_array($value[$k], $disabled )) ? " disabled ":"";                        
        $c .= "<option value=\"$value[$k]\" $s $d >". ucfirst($value[$v])."</option>" ;
    }    
    echo  $c;     
}
function countries_is_id($id){
     return true;
}

function countries_is_countryCode($countryCode){
     return true;
}

function countries_is_countryName($countryName){
     return true;
}

function countries_is_currencyCode($currencyCode){
     return true;
}

function countries_is_fipsCode($fipsCode){
     return true;
}

function countries_is_isoNumeric($isoNumeric){
     return true;
}

function countries_is_north($north){
     return true;
}

function countries_is_south($south){
     return true;
}

function countries_is_east($east){
     return true;
}

function countries_is_west($west){
     return true;
}

function countries_is_capital($capital){
     return true;
}

function countries_is_continentName($continentName){
     return true;
}

function countries_is_continent($continent){
     return true;
}

function countries_is_languages($languages){
     return true;
}

function countries_is_isoAlpha3($isoAlpha3){
     return true;
}

function countries_is_geonameId($geonameId){
     return true;
}

