<?php include 'header.php'; ?>
<main>

    <h1>Vehicle Classes List</h1>
    <?php if($classes_list == NULL){ ?>
            <br><p>NO CLASSES!</p><br>
    <?php }else { ?>
    <table>
        <?php foreach($classes_list as $class) : ?>
        <tr>
            <td><?php echo $class['Name']; ?></td>
            <td>
                <form action="." method="post">
                    <input type="hidden" name="action" value="delete_class" />
                    <input type="hidden" name="class_id"
                           value="<?php echo $class['Class_id']; ?>"/>
                    <input type="submit" value="Delete"/>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
    <?php } ?>

    <h2>Add Vehicle Class</h2>
    <form id="add_class_form"
          action="." method="post">
        <input type="hidden" name="action" value="add_class" />

        <label>Name:</label>
        <input type="text" name="name" />
        <input type="submit" value="Add"/>
    </form>

</main>
<?php include 'footer.php'; ?>