<?php
function get_vehicles($filters, $sort) {
    global $db;
    $query = 'SELECT * FROM vehicles';
    $filter_count = count($filters);
    if($filter_count > 0) {
        $query .= ' WHERE';
    }
    while($filter_count > 0) {
        foreach($filters as $filter_type => $filter) {
            $query .= " {$filter_type} = {$filter}";
            $filter_count--;
            if($filter_count > 0) {
                $query .= ' AND';
            }
        }
    }
    if($sort == NULL || $sort == FALSE) {
        $sort = 'Price';
    }
    $query .= " ORDER BY {$sort} DESC";
    $statement = $db->prepare($query);
    $statement->execute();
    $vehicles = $statement->fetchAll();
    $statement->closeCursor();
    return $vehicles;
}


function delete_vehicle($vehicle_id) {
    global $db;
    $query = 'DELETE FROM vehicles
             WHERE Vehicle_id = :vehicle_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':vehicle_id', $vehicle_id);
    $statement->execute();
    $statement->closeCursor();
}

function add_vehicle($year, $make_id, $model, $type_id, $class_id, $price) {
    try {
        global $db;
        $query = 'INSERT INTO vehicles
                     (Year, Make_id, Model, Type_id, Class_id, Price)
                  VALUES
                     (:year, :make_id, :model, :type_id, :class_id, :price)';
        $statement = $db->prepare($query);
        $statement->bindValue(':year', $year);
        $statement->bindValue(':make_id', $make_id);
        $statement->bindValue(':model', $model);
        $statement->bindValue(':type_id', $type_id);
        $statement->bindValue(':class_id', $class_id);
        $statement->bindValue(':price', $price);
        $statement->execute();
        $statement->closeCursor();
    } catch (PDOException $e) {
        $error = $e->getMessage();
        include('view/error.php');
        exit();
    }
}
?>