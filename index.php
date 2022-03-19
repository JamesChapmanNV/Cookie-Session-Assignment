<?php
require('model/database.php');
require('model/vehicle_db.php');
require('model/class_db.php');
require('model/make_db.php');
require('model/type_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'list_vehicles';
    }
}

switch ($action) {
    case 'list_vehicles': 
        $filters = [];
        $make_filter = filter_input(INPUT_GET, 'make_filter', FILTER_VALIDATE_INT);
            if ($make_filter) {
                $filters['Make_id'] = $make_filter;
            }
        $type_filter = filter_input(INPUT_GET, 'type_filter', FILTER_VALIDATE_INT);
            if ($type_filter) {
                $filters['Type_id'] = $type_filter;
            }
        $class_filter = filter_input(INPUT_GET, 'class_filter', FILTER_VALIDATE_INT);
            if ($class_filter) {
                $filters['Class_id'] = $class_filter;
            }
        $sort = filter_input(INPUT_GET, 'sort', FILTER_SANITIZE_STRING);
        $vehicles_list = get_vehicles($filters, $sort);
        $makes_list = get_makes();
        $types_list = get_types();
        $classes_list = get_classes();
        
        include('view/vehicles_list.php');
        break;

    /*default:*/
    
}

?>



