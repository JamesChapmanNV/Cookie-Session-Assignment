<?php include 'header.php'; ?>
<main>
    <h1>Add ToDo</h1>
    <form action="index.php" method="post" id="add_item_form">
        <input type="hidden" name="action" value="add_todo">

        <label>Category:</label>
        <select name="category_id">
        <?php foreach ( $categories as $category ) : ?>
            <option value="<?php echo $category['categoryID']; ?>">
                <?php echo $category['categoryName']; ?>
            </option>
        <?php endforeach; ?>
        </select>
        <br>

        <label>Title:</label>
        <input type="text" name="title" />
        <br>

        <label>Description:</label>
        <input type="text" name="description" />
        <br>

        <label>&nbsp;</label>
        <input type="submit" value="Add ToDo" />
        <br>
    </form>
    <p>
            <a href="?action=list_categories">Add Category</a>
        </p>
    <p>
        <a href="index.php?action=list_todos">View ToDo List</a>
    </p>

</main>
<?php include 'footer.php'; ?>