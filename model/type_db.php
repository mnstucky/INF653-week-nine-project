<?php

require('db_connect.php');

function get_type_by_id($typeId)
{
    global $db;
    $query = 'SELECT type FROM types WHERE id = :typeid';
    $statement = $db->prepare($query);
    $statement->bindValue(':typeid', $typeId);
    $statement->execute();
    $typeArray = $statement->fetch();
    $statement->closeCursor();
    return $typeArray['type'];
}

function get_types()
{
    global $db;
    $query = 'SELECT * FROM types'; 
    $statement = $db->prepare($query);
    $statement->execute();
    $types = $statement->fetchAll();
    $statement->closeCursor();
    return $types;
}

function add_type($type_name) {
    global $db;
    $query = 'INSERT INTO types (type) VALUES (:typename)';
    $statement = $db->prepare($query);
    $statement->bindValue(':typename', $type_name);
    $statement->execute();
    $statement->closeCursor();
}

function delete_type($typeId) {
    global $db;
    $query = 'DELETE FROM types WHERE id = :typeid';
    $statement = $db->prepare($query);
    $statement->bindValue(':typeid', $typeId);
    $statement->execute();
    $statement->closeCursor();
}