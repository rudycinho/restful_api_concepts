<?php

$ch = curl_init($argv[1]);
curl_setopt(
    $ch,
    CURLOPT_RETURNTRANSFER,
    true
);

$response = curl_exec($ch);
$httpCode = curl_getinfo($ch,CURLINFO_HTTP_CODE);

switch ($httpCode) {
    case 200:
        echo 'OK';
        break;
    case 400:
        echo 'BAD REQUEST';
        break;
    case 404:
        echo 'NOT FOUND';
        break;
    case 500:
        echo 'FAIL SERVER';
        break;
}

