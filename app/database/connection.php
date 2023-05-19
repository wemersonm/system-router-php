<?php
function connectionWithDatabase()
{
    $conn = new PDO("mysql:host=localhost;dbname=testessql", "root", "",[
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
    ]);
    return $conn;
}
