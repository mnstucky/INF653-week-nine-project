<?php

require('db_connect.php');

function get_make_by_id($makeId)
{
    global $db;
    $query = 'SELECT make FROM makes WHERE id = :makeid';
    $statement = $db->prepare($query);
    $statement->bindValue(':makeid', $makeId);
    $statement->execute();
    $makeArray = $statement->fetch();
    $statement->closeCursor();
    return $makeArray['make'];
}

function get_makes()
{
    global $db;
    $query = 'SELECT * FROM makes'; 
    $statement = $db->prepare($query);
    $statement->execute();
    $makes = $statement->fetchAll();
    $statement->closeCursor();
    return $makes;
}

function add_make($make_name) {
    global $db;
    $query = 'INSERT INTO makes (make) VALUES (:makename)';
    $statement = $db->prepare($query);
    $statement->bindValue(':makename', $make_name);
    $statement->execute();
    $statement->closeCursor();
}

function delete_make($makeId) {
    global $db;
    $query = 'DELETE FROM makes WHERE id = :makeid';
    $statement = $db->prepare($query);
    $statement->bindValue(':makeid', $makeId);
    $statement->execute();
    $statement->closeCursor();
}