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