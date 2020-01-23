<?php
    // get resource and store in a variable
    $json = file_get_contents('https://xkcd.com/info.0.json');
    // convert json to array
    $data = json_decode($json,true);
    // get field img of resource
    echo $data['img'].PHP_EOL;