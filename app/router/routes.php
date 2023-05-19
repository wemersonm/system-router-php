<?php
return [
    'POST' => [
        '/car/insert' => 'Car@insert'
    ],
    'GET' => [
        '/' => 'Home@index',
        "/car/delete/[0-9]+" => "Car@delete",
        "/car/create" => 'car@create'
    ]

];
