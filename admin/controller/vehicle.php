<?php

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
    case 'show_add_form': 
        $makes_list = get_makes();
        $types_list = get_types();
        $classes_list = get_classes();

        include('view/show_add_form.php');
        break;
    case 'add_vehicle': 
        $year = filter_input(INPUT_POST, 'year', FILTER_SANITIZE_STRING);
        $make_id = filter_input(INPUT_POST, 'make_id', FILTER_VALIDATE_INT);
        $model = filter_input(INPUT_POST, 'model', FILTER_SANITIZE_STRING);
        $type_id = filter_input(INPUT_POST, 'type_id', FILTER_VALIDATE_INT);
        $class_id = filter_input(INPUT_POST, 'class_id', FILTER_VALIDATE_INT);
        $price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_FLOAT);

        if (!$year || !$make_id || !$model || !$type_id || !$class_id || !$price) {
            $error = 'Invalid vehicle input';
            include('view/error.php');
        } else {
            add_vehicle($year, $make_id, $model, $type_id, $class_id, $price);
            header('Location: .?action=list_vehicles'); 
        }
        break;
    case 'delete_vehicle': 
        $vehicle_id = filter_input(INPUT_POST, 'vehicle_id', FILTER_VALIDATE_INT);
        if ($vehicle_id == NULL || $vehicle_id == FALSE) {
            $error = "Missing or incorrect item_num.";
            include('view/error.php');
        } else { 
            delete_vehicle($vehicle_id);
            header('Location: .?action=list_vehicles'); 
        }
        break;
   
}

?>