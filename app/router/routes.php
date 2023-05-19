<?php
return [
    'POST' => [
       
    ],
    'GET' => [
        '/' => 'Home@index',
        "/user/create" => "User@index",
        "/user/[0-9]+" => "User@details",
        '/user/[0-9]+/name/[a-zA-z]+' => 'User@show'
    ]

];
