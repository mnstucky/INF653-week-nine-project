<?php

require('db_connect.php');

function get_all_vehicles($sortMethod)
{
    global $db;
    if ($sortMethod == 'year') {
        $query = 'SELECT * FROM vehicles ORDER BY year DESC';
    } else {
        $query = 'SELECT * FROM vehicles ORDER BY price DESC';
    }
    $statement = $db->prepare($query);
    $statement->execute();
    $vehicles = $statement->fetchAll();
    $statement->closeCursor();
    return $vehicles;
}

function get_vehicles_by_make($makeId, $sortMethod)
{
    global $db;
    if ($sortMethod == 'year') {
        $query = 'SELECT * FROM vehicles ORDER BY year DESC';
    } else {
        $query = 'SELECT * FROM vehicles ORDER BY price DESC';
    }
    $query = 'SELECT * FROM vehicles WHERE make_id = :makeid';
    $statement = $db->prepare($query);
    $statement->bindValue(':makeid', $makeId);
    $statement->execute();
    $vehicles = $statement->fetchAll();
    $statement->closeCursor();
    return $vehicles;
}

function get_vehicles_by_type($typeId, $sortMethod)
{
    global $db;
    if ($sortMethod == 'year') {
        $query = 'SELECT * FROM vehicles WHERE type_id = :typeid ORDER BY year DESC';
    } else {
        $query = 'SELECT * FROM vehicles WHERE type_id = :typeid ORDER BY price DESC';
    }
    $statement = $db->prepare($query);
    $statement->bindValue(':typeid', $typeId);
    $statement->execute();
    $vehicles = $statement->fetchAll();
    $statement->closeCursor();
    return $vehicles;
}

function get_vehicles_by_class($classId, $sortMethod)
{
    global $db;
    if ($sortMethod == 'year') {
        $query = 'SELECT * FROM vehicles WHERE class_id = :classid ORDER BY year DESC';
    } else {
        $query = 'SELECT * FROM vehicles WHERE class_id = :classid ORDER BY price DESC';
    }
    $statement = $db->prepare($query);
    $statement->bindValue(':classid', $classId);
    $statement->execute();
    $vehicles = $statement->fetchAll();
    $statement->closeCursor();
    return $vehicles;
}
