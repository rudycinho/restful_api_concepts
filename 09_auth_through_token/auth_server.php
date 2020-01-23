<?php

$method = strtoupper($_SERVER['REQUEST_METHOD']);
$token  = sha1('This is secret!!!');

if($method==='POST'){

    if(!array_key_exists('HTTP_X_CLIENT_ID',$_SERVER) || !array_key_exists('HTTP_X_SECRET',$_SERVER)){
        http_response_code(400);
        die('Missing parameters');
    }

    $clientId = $_SERVER['HTTP_X_CLIENT_ID'];
    $secret   = $_SERVER['HTTP_X_SECRET'];

    if($clientId!=='1' || $secret!=='SuperSecret'){
        http_response_code(403);
        die('Not authorized');
    }
    echo "$token";
}elseif($method==='GET'){
    if(!array_key_exists('HTTP_X_TOKEN',$_SERVER)){
        http_response_code(400);
        die('Missing parameters');
    }

    if($_SERVER['HTTP_X_TOKEN']==$token){
        echo 'true';
    }else{
        echo 'false';
    }
}else{
    echo 'false';
}