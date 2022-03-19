<?php include 'header.php'; ?>
<main>

    <h1>Vehicle Types List</h1>
    <?php if($types_list == NULL){ ?>
            <br><p>NO TYPES!</p><br>
    <?php }else { ?>
    <table>
        <?php foreach($types_list as $type) : ?>
        <tr>
            <td><?php echo $type['Name']; ?></td>
            <td>
                <form action="." method="post">
                    <input type="hidden" name="action" value="delete_type" />
                    <input type="hidden" name="type_id"
                           value="<?php echo $type['Type_id']; ?>"/>
                    <input type="submit" value="Delete"/>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
    <?php } ?>

    <h2>Add Vehicle Type</h2>
    <form id="add_type_form"
          action="." method="post">
        <input type="hidden" name="action" value="add_type" />

        <label>Name:</label>
        <input type="text" name="name" />
        <input type="submit" value="Add"/>
    </form>

</main>
<?php include 'footer.php'; ?>