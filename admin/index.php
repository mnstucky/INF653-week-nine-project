<?php
require('../model/db_connect.php');
require('../model/vehicle_db.php');
require('../model/make_db.php');
require('../model/type_db.php');
require('../model/class_db.php');

$makes = get_makes();
$types = get_types();
$classes = get_classes();

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'list_vehicles';
    }
}

if (!isset($sortMethod)) {
    $sortMethod = filter_input(INPUT_GET, 'sortMethod');
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
                $vehicles = get_all_vehicles($sortMethod);
            } else {
                $vehicles = get_vehicles_by_class($classId, $sortMethod);
            }
        } else {
            $vehicles = get_vehicles_by_type($typeId, $sortMethod);
        }
    } else {
        $vehicles = get_vehicles_by_make($makeId, $sortMethod);
    }
    include('./view/vehicle_list.php');
} else if ($action == 'show_add_vehicle_form') {
    include('./view/add_vehicle_form.php');
} else if ($action == 'add_vehicle') {
    $new_vehicle_make = filter_input(INPUT_POST, 'new_vehicle_make', FILTER_VALIDATE_INT);
    $new_vehicle_type = filter_input(INPUT_POST, 'new_vehicle_type', FILTER_VALIDATE_INT);
    $new_vehicle_class = filter_input(INPUT_POST, 'new_vehicle_class', FILTER_VALIDATE_INT);
    $new_vehicle_year = filter_input(INPUT_POST, 'new_vehicle_year', FILTER_VALIDATE_INT);
    $new_vehicle_model = filter_input(INPUT_POST, 'new_vehicle_model');
    $new_vehicle_price = filter_input(INPUT_POST, 'new_vehicle_price', FILTER_VALIDATE_INT);
    add_vehicle($new_vehicle_make, $new_vehicle_type, $new_vehicle_class, $new_vehicle_year, $new_vehicle_model, $new_vehicle_price);
    header('Location: .?action=list_vehicles');
} else if ($action == 'delete_vehicle') {
    $vehicle_id_to_delete = filter_input(INPUT_POST, 'vehicle_id', FILTER_VALIDATE_INT);
    delete_vehicle($vehicle_id_to_delete);
    header('Location: .?action=list_vehicles');
}
