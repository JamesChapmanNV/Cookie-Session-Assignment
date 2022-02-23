<?php include 'header.php'; ?>
<main>
    <form action=".">
        <label for="categoryDropdown">Categories:</label>
            <select name="category_id" id="categoryDropdown">
                <option value="NULL"> View All Categories</a></option>
                <?php foreach ($categories as $category) : ?>
                    <option value="<?php echo $category['categoryID']; ?>">
                        <?php echo $category['categoryName']; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        <input type="submit" value="Submit">
    </form>

    <section>
        <h2><?php echo $category_name; ?></h2>
        <?php if($todos == NULL){ ?>
            <br><p>NO TODO'S IN THIS CATEGORY!</p><br>
        <?php }else { ?>
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
        <?php  }?>
        <p>
            <a href="?action=show_add_form">Add ToDo</a>
        </p>
        <p>
            <a href="?action=list_categories">View/Add/Delete Categories</a>
        </p>
    </section>
    <aside>
                    <a href="?category_id=NULL"> View All ToDo's</a>
    </aside>   
</main>
<?php include 'footer.php'; ?>