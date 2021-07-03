<?php

define('DEBUG_LANG', 0); // DEbugear el idioma
define('MAGIA_DEBUG', 0); // Debug sistema
//
define('ROOT_DIR', realpath(__DIR__ . '/..'));
define('WWW', ROOT_DIR . "/www");
define('WWW_E', ROOT_DIR . "/www_extended/$config_theme");
define('SHOP_PATH',  WWW_E. "/shop");
define('PATH_SCAN_FILES', WWW . '/gallery/img/scan/'); 
// Permite registros en el sisema 
define("AUTO_REGISTRE", TRUE); 
// prefijo de la empresa 
define("COMPANY_PREFIX", "Y"); 
// Moneda usada en el sistema 
$config_empresa_moneda_simbolo = "EUR"; 
//archivos aceptados 
$accepted_file_extensions = array("txt", "gcode", "set"); // tipos de archivos aceptados que puede enviar desde al shop  
// meso maximo de lso archivos aceptados 
$accepted_file_weight = "5000"; 

// Lista de status a los que se puede cambiar una orden 
$status_allowed_to_change = array( 
    0, // DRAF    
    -10, //canceled
    10, // Registred
    20 , // Ready to scan
    30 , // Ready to modeling
    40 , // Ready to print
    60 , // Ready to finition
  //  70 , // Ready to send (y libero el bac
// 100 , // Ready to bill
// 110 , // Is billing 
    ) ;
//
$config_start_year = 2020; 

$shop_form_path_images = "" ; 
//
$config_lang_default = "it_IT";
//        
$products_code_min_length = 3; 
//
//$config_company_name = "127";
$config_company_name = _options_option("config_company_name"); //$config_theme
//
$config_company_a_address = _options_option("config_company_a_address");
$config_company_a_number = _options_option("config_company_a_number");
$config_company_a_postal_code = _options_option("config_company_a_postal_code");
$config_company_a_barrio = _options_option("config_company_a_barrio");
$config_company_a_city = _options_option("config_company_a_city");
$config_company_a_country = _options_option("config_company_a_country");

$config_company_tel = _options_option("config_company_tel");
$config_company_url = _options_option("config_company_url");
$config_company_email = _options_option("config_company_email");
$config_company_logo = _options_option("config_company_logo");
$config_company_tva = _options_option("config_company_tva");
$config_favicon = _options_option("config_favicon");
$config_company_email_secure = _options_option("config_company_email_secure");
//
//Email
$config_mail_username   = _options_option("config_mail_username");
$config_mail_password   = _options_option("config_mail_password");
$config_mail_host       = _options_option("config_mail_host");
$config_mail_port       = _options_option("config_mail_port");
$config_mail            = _options_option("config_mail"); // si esta activo el envio de emails
//
$config_bank['bank']    = ($config_secure_bank['bank'])? $config_secure_bank['bank'] : _options_option("config_bank_bank") ; 
$config_bank['account_number'] = ($config_secure_bank['account_number'])? $config_secure_bank['account_number'] : _options_option("config_bank_account_number"); 
$config_bank['bic']     = ($config_secure_bank['bic'])? $config_secure_bank['bic'] :_options_option("config_bank_bic"); 
$config_bank['iban']    = ($config_secure_bank['iban'])? $config_secure_bank['iban'] : _options_option("config_bank_iban"); 
$config_bank['code']    = ($config_secure_bank['code'])? $config_secure_bank['code'] : _options_option("config_bank_code"); 
$config_bank['invoices']= ($config_secure_bank['invoices'])? $config_secure_bank['invoices'] : _options_option("config_bank_invoices"); // true false
$config_bank['status']  = ($config_secure_bank['status'])? $config_secure_bank['status'] : _options_option("config_bank_status"); // true false



// 
// Cual es el rango max que se puede dar a los usuarios del shop
//
$config_rango_max_for_labo = _options_option("config_rango_max_for_labo");
// Prefijo de labo
$config_bac_prefix = _options_option("config_bac_prefix");

$config_orders_total_steps = _options_option("config_orders_total_steps");
// 
// Cual es el porcentaje de descuentos MAX
// que se puede dar a un cliente?
//
$config_discounts_max_to_customer = _options_option("config_discounts_max_to_customer");

//
$config_company_name2 = _options_option("config_company_name2");
$config_company_url2 = _options_option("config_company_url2");

