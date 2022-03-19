<?php
function get_classes() {
    global $db;
    $query = 'SELECT * FROM classes ORDER BY Class_id';
    $statement = $db->prepare($query);
    $statement->execute();
    return $statement;    
}

function get_class_name($class_id) {
    if ($class_id == NULL || $class_id == FALSE) {
        $class_name = "All classes";
        return $class_name;
    }
    global $db;
    $query = 'SELECT * FROM classes WHERE Class_id = :class_id';    
    $statement = $db->prepare($query);
    $statement->bindValue(':class_id', $class_id);
    $statement->execute();    
    $class = $statement->fetch();
    $statement->closeCursor();    
    $class_name = $class['Name'];
    return $class_name;
}

function add_class($name) {
    try {
        global $db;
        $query = 'INSERT INTO classes (Name) VALUES (:name)';
        $statement = $db->prepare($query);
        $statement->bindValue(':name', $name);
        $statement->execute();
        $statement->closeCursor();    
    } catch (PDOException $e) {
        $error = $e->getMessage();
        include('view/error.php');
        exit();
    }
}

function delete_class($class_id) {
    try {
        global $db;
        $query = 'DELETE FROM classes WHERE Class_id = :class_id';
        $statement = $db->prepare($query);
        $statement->bindValue(':class_id', $class_id);
        $statement->execute();
        $statement->closeCursor();
    } catch (PDOException $e) {
        $error = $e->getMessage();
        include('view/error.php');
        exit();
    }
}
?>