<?php

// report that the answer will be a json
header('Content-Type: application/json');

// available resources
$allowedResourceTypes = [
    'books',
    'authors',
    'genres',
];

// validate that the resource is available
$resourceType = $_GET['resource_type'];

if(!in_array($resourceType,$allowedResourceTypes)){
    http_response_code(400);
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

// raise the id of the searched resource
$resourceId = array_key_exists('resource_id',$_GET) ? $_GET['resource_id'] : '';

// generate the response assuming the request is correct
switch ( strtoupper($_SERVER['REQUEST_METHOD']) ){
    case 'GET':
        if(empty($resourceId))
            echo json_encode($books);
        else
            if(array_key_exists($resourceId,$books))
                echo json_encode($books[$resourceId]);
            else
                http_response_code(404);
        break;
    case 'POST':
        // take the input
        $json  = file_get_contents('php://input');
        // transforming the received json into a new element of the array
        $books[] = json_decode($json,true);
        // issued the last key of the array
        echo array_keys($books)[count($books)-1];
        //echo json_encode($books);
        break;
    case 'PUT':
        // validate the existence of the desired resource
        if(!empty($resourceId) && array_key_exists($resourceId,$books)){
            // take the input
            $json  = file_get_contents('php://input');
            // transforming the received json into a new element of the array
            $books[$resourceId] = json_decode($json,true);
            // show the updated collection in json format
            echo json_encode($books);
        }
        break;
    case 'DELETE':
        // validate the existence of the desired resource
        if(!empty($resourceId) && array_key_exists($resourceId,$books)){
            // delete the resource
            unset($books[$resourceId]);
        }
        // show the updated collection in json format
        echo json_encode($books);
        break;
}