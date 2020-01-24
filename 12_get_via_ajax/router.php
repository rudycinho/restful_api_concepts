<?php

$matches = [];

if(in_array($_SERVER["REQUEST_URI"],['/index.html','/',''])){
    echo file_get_contents('index.html');
    die;
}

if(preg_match('/\/([^\/]+)\/([^\/]+)/',$_SERVER["REQUEST_URI"],$matches)){
    $_GET['resource_type'] = $matches[1];
    $_GET['resource_id']   = $matches[2];

    error_log(print_r($matches,1));
    require 'more/server.php';
}elseif ( preg_match('/\/([^\/]+)\/?/',$_SERVER["REQUEST_URI"],$matches)){
    $_GET['resource_type'] = $matches[1];
    error_log(print_r($matches,1));
    require 'more/server.php';
}else{
    error_log('No matches');
    http_response_code(404);
}