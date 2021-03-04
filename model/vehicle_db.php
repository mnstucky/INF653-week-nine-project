<?php

require('db_connect.php');

function get_all_vehicles() {
    global $db;
    $query = 'SELECT * FROM vehicles';
    $statement = $db->prepare($query);
    $statement->execute();
    $vehicles = $statement->fetchAll();
    $statement->closeCursor();
    return $vehicles;
}

function get_vehicles_by_make($makeId) {
    global $db;
    $query = 'SELECT * FROM vehicles WHERE make_id = :makeid';
    $statement = $db->prepare($query);
    $statement->bindValue(':makeid', $makeId);
    $statement->execute();
    $vehicles = $statement->fetchAll();
    $statement->closeCursor();
    return $vehicles;
}

function get_vehicles_by_type($typeId) {
    global $db;
    $query = 'SELECT * FROM vehicles WHERE type_id = :typeid';
    $statement = $db->prepare($query);
    $statement->bindValue(':typeid', $typeId);
    $statement->execute();
    $vehicles = $statement->fetchAll();
    $statement->closeCursor();
    return $vehicles;
}

function get_vehicles_by_class($classId) {
    global $db;
    $query = 'SELECT * FROM vehicles WHERE class_id = :classid';
    $statement = $db->prepare($query);
    $statement->bindValue(':classid', $classId);
    $statement->execute();
    $vehicles = $statement->fetchAll();
    $statement->closeCursor();
    return $vehicles;
}