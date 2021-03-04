<?php
require('./model/db_connect.php');
require('./model/vehicle_db.php');
require('./model/make_db.php');
require('./model/type_db.php');
require('./model/class_db.php');

$makes = get_makes();

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'list_vehicles';
    }
}

if ($action == 'list_vehicles') {
    if (!isset($makeId)) {
        $makeId = filter_input(
            INPUT_GET,
            'makeId',
            FILTER_VALIDATE_INT
        );
    }
    if (!isset($typeId)) {
        $typeId = filter_input(
            INPUT_GET,
            'typeId',
            FILTER_VALIDATE_INT
        );
    }
    if (!isset($classId)) {
        $classId = filter_input(
            INPUT_GET,
            'classId',
            FILTER_VALIDATE_INT
        );
    }
    if ($makeId == NULL || $makeId == FALSE) {
        if ($typeId == NULL || $typeId == FALSE) {
            if ($classId == NULL || $classId == FALSE) {
                $vehicles = get_all_vehicles();
            } else {
                $vehicles = get_vehicles_by_class($classId);
            }
        } else {
            $vehicles = get_vehicles_by_type($typeId);
        }
    } else {
        $vehicles = get_vehicles_by_make($makeId);
    }
    include('./view/vehicle_list.php');
} 