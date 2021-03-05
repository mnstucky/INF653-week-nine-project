<?php

switch ($action) {
    case "list_vehicles":
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
        break;
    case 'show_add_vehicle_form':
        include('./view/add_vehicle_form.php');
        break;
    case 'add_vehicle':
        add_vehicle($new_vehicle_make, $new_vehicle_type, $new_vehicle_class, $new_vehicle_year, $new_vehicle_model, $new_vehicle_price);
        header('Location: .?action=list_vehicles');
        break;
    case 'delete_vehicle':
        delete_vehicle($vehicle_id_to_delete);
        header('Location: .?action=list_vehicles');
        break;
}
