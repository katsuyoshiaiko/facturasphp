<?php

class addresses {

    public $id ;
    public $contact_id ;
    public $name ;
    public $address ;
    public $number ;
    public $postcode ;
    public $barrio ;
    public $city ;
    public $region ;
    public $country ;
    public $code ;
    public $status ;

    public function __construct($contact_id , $name , $address , $number , $postcode , $barrio , $city , $region , $country , $code) {

        $this->id = null ;
        $this->contact_id = $contact_id ;
        $this->name = $name ;
        $this->address = $address ;
        $this->number = $name ;
        $this->postcode = $postcode ;
        $this->barrio = $barrio ;
        $this->city = $city ;
        $this->region = $region ;
        $this->country = $country ;
        $this->code = $code ;
        $this->status = 1 ;
        
        $this->insert(); 
        
        
        
    }

    public function __getInfo($name) {
        return $this->$name ;
    }
        

    public function insert() {
        addresses_add(
                $this->contact_id ,
                $this->name ,
                $this->address ,
                $this->number ,
                $this->postcode ,
                $this->barrio ,
                $this->city ,
                $this->region ,
                $this->country ,
                $this->code ,
                $this->status
        ) ;
    }
    
    
    
    
    
    

}



