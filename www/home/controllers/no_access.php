<?php

if(! $_SESSION){
    include view("home", "index");
}else{
    include view("home", "no_access");
}



