<?php
switch ($action) {
    case 'list_types': 
        $types_list = get_types();
        include('view/types_list.php');
        break;
    case 'add_type': 
        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
        if ($name == NULL) {
            $error = "Invalid type name. Check name and try again.";
            include('view/error.php');
        } else {
            add_type($name);
            header('Location: .?action=list_types');  
        }
        break;
    case 'delete_type': 
        $type_id = filter_input(INPUT_POST, 'type_id', FILTER_VALIDATE_INT);
        delete_type($type_id);
        header('Location: .?action=list_types');      
        break;
}

?>