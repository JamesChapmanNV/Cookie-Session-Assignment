<?php
function get_todos_by_category($category_id) {
    global $db;
    if ($category_id == NULL || $category_id == FALSE) {
        $query = 'SELECT t.ItemNum, t.Title, t.Description, c.categoryName
                FROM todoitems as t
                JOIN categories as c
                    on t.categoryID = c.categoryID
                ORDER BY ItemNum';
        $statement = $db->prepare($query);
    } else {
        $query = 'SELECT t.ItemNum, t.Title, t.Description, c.categoryName
        FROM todoitems as t
        JOIN categories as c
            on t.categoryID = c.categoryID
        WHERE t.categoryID = :category_id
        ORDER BY ItemNum';
        $statement = $db->prepare($query);
        $statement->bindValue(':category_id', $category_id);
    }
    $statement->execute();
    $todos = $statement->fetchAll();
    $statement->closeCursor();
    return $todos;
}

function get_todo($item_num) {
    global $db;
    $query = 'SELECT * FROM todoitems
              WHERE ItemNum = :item_num';
    $statement = $db->prepare($query);
    $statement->bindValue(':item_num', $item_num);
    $statement->execute();
    $todo = $statement->fetch();
    $statement->closeCursor();
    return $todo;
}

function delete_todo($item_num) {
    global $db;
    $query = 'DELETE FROM todoitems
             WHERE ItemNum = :item_num';
    $statement = $db->prepare($query);
    $statement->bindValue(':item_num', $item_num);
    $statement->execute();
    $statement->closeCursor();
}

function add_todo($category_id, $title, $description) {
    global $db;
    $query = 'INSERT INTO todoitems
                 (categoryID, Title, Description)
              VALUES
                 (:category_id, :title, :description)';
    $statement = $db->prepare($query);
    $statement->bindValue(':category_id', $category_id);
    $statement->bindValue(':title', $title);
    $statement->bindValue(':description', $description);
    $statement->execute();
    $statement->closeCursor();
}
?>