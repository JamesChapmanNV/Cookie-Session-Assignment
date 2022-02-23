

<?php include 'header.php'; ?>
<main>
    <section>
        <!-- display a table of products -->
        <h2><?php echo $category_name; ?></h2>
        <table>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Category</th>
                <th>&nbsp;</th>
            </tr>
            <?php foreach ($todos as $todo) : ?>
            <tr>
                <td><?php echo $todo['Title']; ?></td>
                <td><?php echo $todo['Description']; ?></td>
                <td><?php echo $todo['categoryName']; ?></td>
                <td><form action="." method="post">
                    <input type="hidden" name="action"
                           value="delete_todo">
                    <input type="hidden" name="item_num"
                           value="<?php echo $todo['ItemNum']; ?>">
                    <input type="submit" value="Delete">
                </form></td>
            </tr>
            <?php endforeach; ?>
        </table>

        <p>
            <a href="?action=show_add_form">Add ToDo</a>
        </p>
        <p>
            <a href="?action=list_categories">View/Add/Delete Categories</a>
        </p>
    </section>

    <aside>
        <!-- display a list of categories -->
        <h2>Categories</h2>
        <nav>
        <ul>
                <li>
                    <a href="?category_id=NULL"> View All Categories</a>
                </li>
            <?php foreach ($categories as $category) : ?>
                <li>
                <a href="?category_id=<?php echo $category['categoryID']; ?>">
                    <?php echo $category['categoryName']; ?>
                </a>
                </li>
            <?php endforeach; ?>
        </ul>
        </nav>
    </aside>

</main>
<?php include 'footer.php'; ?>