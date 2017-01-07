<?php

define("VERSION", "0.1");

function process(){

    $data = array(
    
        "myself"=>"doppleman-php-ping",
    
        "version" => constant("VERSION"),

        "date" => time(),

        "server_host" => $_SERVER["HTTP_HOST"],

        "server_name" => $_SERVER["SERVER_NAME"]

        
    
    );
    
    echo json_encode($data);

}

process();
