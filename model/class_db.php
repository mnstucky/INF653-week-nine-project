<?php

require('db_connect.php');

function get_class_by_id($classId)
{
    global $db;
    $query = 'SELECT class FROM classes WHERE id = :classid';
    $statement = $db->prepare($query);
    $statement->bindValue(':classid', $classId);
    $statement->execute();
    $classArray = $statement->fetch();
    $statement->closeCursor();
    return $classArray['class'];
}

function get_classes()
{
    global $db;
    $query = 'SELECT * FROM classes'; 
    $statement = $db->prepare($query);
    $statement->execute();
    $classes = $statement->fetchAll();
    $statement->closeCursor();
    return $classes;
}