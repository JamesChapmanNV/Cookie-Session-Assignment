<?php
switch ($action) {
    case 'list_makes': 
        $makes_list = get_makes();
        include('view/makes_list.php');
        break;
    case 'add_make': 
        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
        if ($name == NULL) {
            $error = "Invalid make name. Check name and try again.";
            include('view/error.php');
        } else {
            add_make($name);
            header('Location: .?action=list_makes');  
        }
        break;
    case 'delete_make': 
        $make_id = filter_input(INPUT_POST, 'make_id', FILTER_VALIDATE_INT);
        delete_make($make_id);
        header('Location: .?action=list_makes');      
        break;
}

?>