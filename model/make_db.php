<?php
function get_makes() {
    global $db;
    $query = 'SELECT * FROM makes ORDER BY Make_id';
    $statement = $db->prepare($query);
    $statement->execute();
    return $statement;    
}

function get_make_name($make_id) {
    if ($make_id == NULL || $make_id == FALSE) {
        $make_name = "All makes";
        return $make_name;
    }
    global $db;
    $query = 'SELECT * FROM makes WHERE Make_id = :make_id';    
    $statement = $db->prepare($query);
    $statement->bindValue(':make_id', $make_id);
    $statement->execute();    
    $make = $statement->fetch();
    $statement->closeCursor();    
    $make_name = $make['Name'];
    return $make_name;
}

function add_make($name) {
    try {
        global $db;
        $query = 'INSERT INTO makes (Name) VALUES (:name)';
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

function delete_make($make_id) {
    try {
        global $db;
        $query = 'DELETE FROM makes WHERE Make_id = :make_id';
        $statement = $db->prepare($query);
        $statement->bindValue(':make_id', $make_id);
        $statement->execute();
        $statement->closeCursor();
    } catch (PDOException $e) {
        $error = $e->getMessage();
        include('view/error.php');
        exit();
    }
}
?>