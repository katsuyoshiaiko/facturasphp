<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$_content = null;
$w = (isset($_GET["w"])) ? clean($_GET["w"]) : false;
$error = array();

################################################################################
################################################################################
switch ($w) {
    case "id":
        $txt = (isset($_GET["txt"])) ? clean($_GET["txt"]) : false;        
        $_content = _content_search_by_id($txt);
        $view = "index";
        
        break;
    case "hasNotTranslation":
        $language = (isset($_GET["language"])) ? clean($_GET["language"]) : false;        
                
        $_content = _content_search_hasNotTranslation($language);
        
        $view = "index_hasNotTranslations";
        break;
    case "exportToTranslate":
        $language = (isset($_GET["language"])) ? clean($_GET["language"]) : false;        
        $languageTo = (isset($_GET["languageTo"])) ? clean($_GET["languageTo"]) : false;
        $_content = _content_search_exportToTranslate($language);
        $view = "tr";
        break;
    
    case "exportLanguage":
        $languageFrom = (isset($_GET["languageFrom"])) ? clean($_GET["languageFrom"]) : false;        
        $languageTo = (isset($_GET["languageTo"])) ? clean($_GET["languageTo"]) : false;
        $_content = _content_search_exportLanguage($languageFrom);
        $view = "exportLanguage";
        break;

    default:
        $txt = (isset($_GET["txt"])) ? clean($_GET["txt"]) : false;
        $_content = _content_search($txt);
        $view = "index";
        break;
}


include view("_content", $view);      
