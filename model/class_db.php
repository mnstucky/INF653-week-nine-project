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

function add_class($class_name) {
    global $db;
    $query = 'INSERT INTO classes (class) VALUES (:classname)';
    $statement = $db->prepare($query);
    $statement->bindValue(':classname', $class_name);
    $statement->execute();
    $statement->closeCursor();
}

function delete_class($classId) {
    global $db;
    $query = 'DELETE FROM classes WHERE id = :classid';
    $statement = $db->prepare($query);
    $statement->bindValue(':classid', $classId);
    $statement->execute();
    $statement->closeCursor();
}