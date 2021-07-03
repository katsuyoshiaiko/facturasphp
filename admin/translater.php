<?php

//http://www.gnu.org/server/standards/translations/es/guias.html#convertir-po
// https://www.php.net/manual/fr/book.gettext.php
//https://mlocati.github.io/
//https://translationproject.org/team/es.html
//https://pubs.opengroup.org/onlinepubs/9699919799/



function _tr($frase, $lang = false) {
    global $u_id, $u_rol;

    // quito espacios al inicio y al final    
    $frase = trim($frase);

    // si es un numero no traducir 
    // $frase = utf8_encode($frase); 
    // si el usuario no tiene idioma definido, cojemos el idioma por defecto del sistema 
    //

    if ($lang) {
        $language = $lang;
    } else {

        $language = (users_field_contact_id("language", $u_id)) ?
                users_field_contact_id("language", $u_id) :
                _options_option("default_language")
        ;
    }

//    if($language == "en_GB"){
//        
//        return (DEBUG_LANG) ? "-" : $frase  ;
//    }
//    $language = "en_GB" ;

    /**
     * busco la frase en _content
     *      
     * si encuentro 
     *      - busco su traduccion en _traductions
     *          si hay traduccion
     *              - devuelvo la traducion
     *          sino
     *              si estoy en desarrollo
     *                  - registro la traduccion 
     *              sino
     *                 - muestro la frase como viene
     *              fin                          
     *          fin
     *  
     *  sino
     *      - registro en _content
     *          - si registro 
     *              - busco la brase en _content
     *          - sino
     *              - muestro la frase como viene
     *          - fin
     * 
     *  fin   
     * 
     * retur $traduction
     */
    // Busco la frase
    if (_content_by_frase($frase)) {

        // busco la traduccion
        if (_translations_by_content_language($frase, $language)) {
            $r = _translations_by_content_language($frase, $language);
        } else {

            // busco en el diccionario             
            //$tr_from_diccionario = _diccionario_search_translation_by_content_lang($frase , $language);    
            $tr_from_diccionario = false;

            // agrego la traduccion del diccionario a mis traducciones
            //if( $tr_from_diccionario ){
            //  _translations_add($frase , $language , $tr_from_diccionario); 
            //}else{
            // si no hay en el diccionario agrego la frase 
            // pero esto agrega la frase en ingles, hay q decidir si se quiere hacer eso o no
            //_translations_add($frase , $language , $frase)
            // }
            // si no hay en la tabla traducciones, busco en la tabla diccionario
            // _translations_add($frase , $language , $frase) ; 
            //$r = _translations_by_content_language($frase , $language) ;
            $r = "[$frase]";
        }

        //    return (DEBUG_LANG) ? "-" : $r ;
        // si no hallo, la registro
    } else {
        $frase_id = _content_add($frase, null);
        ############################################################################
        ############################################################################
        ############################################################################
        $level = 1; // 5 niveles: 1 bajo, 2 medio, 3 alto, 4 atencion, 5 critico
        $date = null;
        //$u_id
        //$u_rol , 
        $c = "_content";
        $a = "add";
        $w = null;
        $description = "Add frase [$frase] in _content";
        $doc_id = $frase_id;
        $crud = "create";
        $error = (isset($error)) ? json_encode($error) : null;
        $val_get = ( isset($_GET) ) ? json_encode($_GET) : null;
        $val_post = ( isset($_POST) ) ? json_encode($_POST) : null;
        $val_request = ( isset($_REQUEST) ) ? json_encode($_REQUEST) : null;
        $ip4 = get_user_ip();
        $ip6 = get_user_ip6();
        $broswer = json_encode(get_user_browser()); //https://www.php.net/manual/es/function.get-browser.php

        logs_add(
                $level, $date, $u_id, $u_rol, $c, $a, $w,
                $description, $doc_id, $crud, $error,
                $val_get, $val_post, $val_request, $ip4, $ip6, $broswer
        );
        ############################################################################
        ############################################################################
        ############################################################################
        $r = "[" . _content_by_frase($frase) . "]";
    }

    //$r = _trc($r);
    //return (DEBUG_LANG) ? "-" : mb_detect_encoding($r) ;
    return (DEBUG_LANG) ? "-" : $r;
    // return (_options_option('debug_lang')) ? "--" : $r ;
}

//

function _t($t) {
    echo (DEBUG_LANG) ? "-" : _tr($t);
}

function _trxxx($t) {
    return "-";
}

function _trc($t, $out_charset = "iso-8859-1") {

    //$in_charset = mb_detect_encoding($t); 
    //return iconv($in_charset , $out_charset , $t);
    //return $in_charset;

    return (DEBUG_LANG) ? "-" : utf8_decode(_tr($t));
}

function _trt($t) {
    return $t;
}
