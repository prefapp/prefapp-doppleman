<?php

define("VERSION", "0.1");

function process(){

    $data = array(
    
        "myself"=>"doppleman-php-ping",
    
        "version" => constant("VERSION"),

        "date" => time(),
    
    );
    
    echo json_encode($data);

}

process();
