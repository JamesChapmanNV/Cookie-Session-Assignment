<?php
require('model/database.php');
require('model/item_db.php');
require('model/category_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'list_todos';
    }
}

if ($action == 'list_todos') {
    $category_id = filter_input(INPUT_GET, 'category_id', 
            FILTER_VALIDATE_INT);
    $category_name = get_category_name($category_id);
    $categories = get_categories();
    $todos = get_todos_by_category($category_id);
    include('view/item_list.php');
} else if ($action == 'delete_todo') {
    $item_num = filter_input(INPUT_POST, 'item_num', 
            FILTER_VALIDATE_INT);
    if ($item_num == NULL || $item_num == FALSE) {
        $error = "Missing or incorrect item_num.";
        include('view/error.php');
    } else { 
        delete_todo($item_num);
        header("Location: .?category_id=NULL");
    }
} else if ($action == 'show_add_form') { 
    $categories = get_categories();
    include('view/add_item_form.php');    
} else if ($action == 'add_todo') {
    $category_id = filter_input(INPUT_POST, 'category_id', 
            FILTER_VALIDATE_INT);
    $title = filter_input(INPUT_POST, 'title');
    $description = filter_input(INPUT_POST, 'description');
    if ($category_id == NULL || $category_id == FALSE || $title == NULL || 
            $description == NULL) {
        $error = "Invalid product data. Check all fields and try again.";
        include('view/error.php');
    } else { 
        add_todo($category_id, $title, $description);
        header("Location: .?category_id=NULL");
    }
} else if ($action == 'list_categories') {
    $categories = get_categories();
    include('view/category_list.php');
} else if ($action == 'add_category') {
    $name = filter_input(INPUT_POST, 'name');
    if ($name == NULL) {
        $error = "Invalid category name. Check name and try again.";
        include('view/error.php');
    } else {
        add_category($name);
        header('Location: .?action=list_categories');  
    }
} else if ($action == 'delete_category') {
    $category_id = filter_input(INPUT_POST, 'category_id', 
            FILTER_VALIDATE_INT);
    delete_category($category_id);
    header('Location: .?action=list_categories');      
}
?>



