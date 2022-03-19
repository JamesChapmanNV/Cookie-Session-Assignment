<?php
function get_types() {
    global $db;
    $query = 'SELECT * FROM types ORDER BY Type_id';
    $statement = $db->prepare($query);
    $statement->execute();
    return $statement;    
}

function get_type_name($type_id) {
    if ($type_id == NULL || $type_id == FALSE) {
        $type_name = "All types";
        return $type_name;
    }
    global $db;
    $query = 'SELECT * FROM types WHERE Type_id = :type_id';    
    $statement = $db->prepare($query);
    $statement->bindValue(':type_id', $type_id);
    $statement->execute();    
    $type = $statement->fetch();
    $statement->closeCursor();    
    $type_name = $type['Name'];
    return $type_name;
}

function add_type($name) {
    try {
        global $db;
        $query = 'INSERT INTO types (Name) VALUES (:name)';
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

function delete_type($type_id) {
    try {
        global $db;
        $query = 'DELETE FROM types WHERE Type_id = :type_id';
        $statement = $db->prepare($query);
        $statement->bindValue(':type_id', $type_id);
        $statement->execute();
        $statement->closeCursor();
    } catch (PDOException $e) {
        $error = $e->getMessage();
        include('view/error.php');
        exit();
    }
}
?>