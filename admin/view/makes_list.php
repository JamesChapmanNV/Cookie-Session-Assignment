<?php include 'header.php'; ?>
<main>

    <h1>Vehicle Makes List</h1>
    <?php if($makes_list == NULL){ ?>
            <br><p>NO MAKES!</p><br>
    <?php }else { ?>
    <table>
        <?php foreach($makes_list as $make) : ?>
        <tr>
            <td><?php echo $make['Name']; ?></td>
            <td>
                <form action="." method="post">
                    <input type="hidden" name="action" value="delete_make" />
                    <input type="hidden" name="make_id"
                           value="<?php echo $make['Make_id']; ?>"/>
                    <input type="submit" value="Delete"/>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
    <?php } ?>

    <h2>Add Vehicle Make</h2>
    <form id="add_make_form"
          action="." method="post">
        <input type="hidden" name="action" value="add_make" />

        <label>Name:</label>
        <input type="text" name="name" />
        <input type="submit" value="Add"/>
    </form>

</main>
<?php include 'footer.php'; ?>