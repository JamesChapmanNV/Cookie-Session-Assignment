<?php
switch ($action) {
    case 'list_classes': 
        $classes_list = get_classes();
        include('view/classes_list.php');
        break;
    case 'add_class': 
        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
        if ($name == NULL) {
            $error = "Invalid class name. Check name and try again.";
            include('view/error.php');
        } else {
            add_class($name);
            header('Location: .?action=list_classes');  
        }
        break;
    case 'delete_class': 
        $class_id = filter_input(INPUT_POST, 'class_id', FILTER_VALIDATE_INT);
        delete_class($class_id);
        header('Location: .?action=list_classes');      
        break;
}

?>