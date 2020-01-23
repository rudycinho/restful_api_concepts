<?php

// available resources
$allowedResourceTypes = [
    'books',
    'authors',
    'genres',
];

// validate that the resource is available
$resourceType = $_GET['resource_type'];

if(!in_array($resourceType,$allowedResourceTypes)){
    die;
}

// Define resource
$books = [
    1 => [
        'title'     => 'The great gatsby',
        'author_id' => '1',
        'genre_id'  => '1',
    ],
    2 => [
        'title'     => 'Pride and Prejudice',
        'author_id' => '2',
        'genre_id'  => '2',
    ],
    3 => [
        'title'     => '1984',
        'author_id' => '3',
        'genre_id'  => '3',
    ],
];

// report that the answer will be a json
header('Content-Type: application/json');

// generate the response assuming the request is correct
switch ( strtoupper($_SERVER['REQUEST_METHOD']) ){
    case 'GET':
        echo json_encode($books);
        break;
    case 'POST':
        break;
    case 'PUT':
        break;
    case 'DELETE':
        break;
}