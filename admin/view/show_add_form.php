<?php include 'header.php'; ?>
<main>
    <section> 
        <h1>Add Vehicle</h1>
        <form action="." method="post" id="add_vehicle_form">
            <input type="hidden" name="action" value="add_vehicle">

            <label>Make:</label>
            <select name="make_id">
            <?php foreach ($makes_list as $make) : ?>
                <option value="<?php echo $make['Make_id']; ?>">
                    <?php echo $make['Name']; ?>
                </option>
            <?php endforeach; ?>
            </select>
            <br>
            
            <label>Type:</label>
            <select name="type_id">
            <?php foreach ($types_list as $type) : ?>
                <option value="<?php echo $type['Type_id']; ?>">
                    <?php echo $type['Name']; ?>
                </option>
            <?php endforeach; ?>
            </select>
            <br>

            <label>Class:</label>
            <select name="class_id">
            <?php foreach ($classes_list as $class) : ?>
                <option value="<?php echo $class['Class_id']; ?>">
                    <?php echo $class['Name']; ?>
                </option>
            <?php endforeach; ?>
            </select>
            <br>

            <label>Year:</label>
            <input type="text" name="year"/>
            <br>

            <label>Model:</label>
            <input type="text" name="model"/>
            <br>

            <label>Price:</label>
            <input type="text" name="price"/>
            <br>

            <label>&nbsp;</label>
            <input type="submit" value="submit" name="add_vehicle"  />
            <br>
        </form>
    </section> 
</main>
<?php include 'footer.php'; ?>
