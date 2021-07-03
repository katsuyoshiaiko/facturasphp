<?php

class TRANSPORT {

    private $_id = "";
    public $_code = "";
    public $_name = "";
    public $_price = "";
    public $_tax = "";
    public $_order_by = "";
    public $_status = "";

    function __construct($name, $price, $tax) {
        $this->_code = null;
        $this->_name = $name;
        $this->_price = $price;
        $this->_tax = $tax;
        $this->_order_by = 1;
        $this->_status = 1;
    }

    function GetCode() {
        $this->_code;
    }

    function GetName() {
        $this->_name;
    }
    
    public function GeneratorCode(){
        // quito los espacio
        // pongo en mayusculas 
        $name = $this->_name; 
        
        if(!$name || $name == ""){
            $code = uniqid(); 
        }else{
            $code = trim($name); 
            $code = str_replace(" ", "", $code);
        }
        // busca si ya existe un codigo parecido, 
        // si existe le agrega un numero al final
        
        
        return $code;
    }
    

}
