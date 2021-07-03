<?php

function stats_invoice_lines_stat() {
    global $db;
    $limit = 999;

    $data = null;

    //$req = $db->prepare("SELECT SUM(quantity) as quantity, code, SUM(price) as price  FROM invoice_lines GROUP BY code ORDER BY price DESC ");
    
    
    $req = $db->prepare("SELECT code, SUM(quantity) as quantity, price, SUM(price) as sum_price, discounts, SUM(discounts) as sum_discounts, discounts_mode, tax,    ( "
            
            . " if( discounts_mode = '%' ,((quantity * price) - ((quantity * price) * discounts )/100) ,       ((quantity * price) - discounts) )) as subtotal, "
            
            
            
            . " if( discounts_mode = '%' ,   ((quantity * price) * discounts )/100 ,       discounts ) as totaldiscounts, "
            
                        
            
            . " if(discounts_mode = '%', ((quantity * price) - ((quantity * price) * discounts )/100) ,        (quantity * price) - discounts ) * ( (tax/100) ) as totaltax "
            
            
            . ""
            
               
            . "FROM invoice_lines GROUP BY code ORDER BY quantity DESC, code DESC ");
        
        
        

    $req->execute(array(
        //"limit" => $limit, 
        //"id" => $id
    ));
    $data = $req->fetchall();
    return $data;
}

function stats_contacts_by_type() {
    global $db;
    $limit = 999;

    $data = null;

    $req = $db->prepare("SELECT type, COUNT(type) as total  FROM contacts GROUP BY type ORDER BY total DESC ");        

    $req->execute(array(
        //"limit" => $limit, 
        //"id" => $id
    ));
    $data = $req->fetchall();
    return $data;
}


function stats_addresses_by_city() {
    global $db;
    

    $data = null;

    $req = $db->prepare("SELECT city, COUNT(city) as total  FROM addresses GROUP BY city ORDER BY city  ");        

    $req->execute(array(
        //"limit" => $limit, 
        //"id" => $id
    ));
    $data = $req->fetchall();
    return $data;
}


function stats_remakes_by_office($office_id) {
    global $db;


    $data = null;

    $req = $db->prepare("SELECT COUNT(id) as total_orders, COUNT(remake) as total_remakes, company_id  FROM orders WHERE company_id=:office_id GROUP BY company_id ORDER BY total_remakes DESC  ");        

    $req->execute(array(
        "office_id"=>$office_id
//"limit" => $limit, 
        //"id" => $id
    ));
    $data = $req->fetchall();
    return $data;
}



function stats_remake_motifs() {
    global $db;


    $data = null;

    $req = $db->prepare("SELECT COUNT(motif_id) as total, motif_id  FROM orders_remake GROUP BY motif_id ORDER BY total DESC  ");        

    $req->execute(array(
        //"limit" => $limit, 
        //"id" => $id
    ));
    $data = $req->fetchall();
    return $data;
}
