<?php

function carsFetchAll($fields = "*")
{
    $conn = connectionWithDatabase();

    $stmt = $conn->query("SELECT {$fields} FROM cars");
    return $stmt->rowCount() > 0 ? $stmt->fetchAll() : [];
}

function carExists($field, $value, $fields = '*')
{
    $conn = connectionWithDatabase();

    $stmt = $conn->prepare("SELECT {$fields} FROM cars WHERE {$field} = :{$field}");
    $stmt->bindValue(":{$field}", $value);
    $stmt->execute();
    return  $stmt->rowCount() > 0 ? true : false;
}
function deleteCar($field, $value)
{
    $conn = connectionWithDatabase();

    $stmt = $conn->prepare("DELETE FROM cars WHERE {$field} = :{$field}");
    $stmt->bindValue(":{$field}", $value);
    $stmt->execute();
    return  $stmt->rowCount() > 0 ? true : false;
}
function insertIntoCar($data)
{
    $conn = connectionWithDatabase();
    $stmt = $conn->prepare("INSERT INTO cars(vni,carMake,carModel,carModelYear) VALUES(?,?,?,?)");
    $stmt->execute($data);
    return $stmt->rowCount() > 0 ? true : false;
}
