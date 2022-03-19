<?php include 'header.php'; ?>
<main>
    <form action="." method="get" class="filters_sort">
    <input type="hidden" name="action" value="list_vehicles">
        <div>
            <label for="make_filter"></label>
            <select name="make_filter" id="make_filter">
                <option value="NULL">View All Makes</option>
                <?php foreach ($makes_list as $make) : ?>
                    <option value="<?php echo $make['Make_id']; ?>"
                    <?php if($make_filter == $make['Make_id']) echo 'selected'; ?>>
                        <?php echo $make['Name']; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div>
            <label for="type_filter"></label>
            <select name="type_filter" id="type_filter">
                <option value="NULL">View All Types</option>
                <?php foreach ($types_list as $type) : ?>
                    <option value="<?php echo $type['Type_id']; ?>"
                    <?php if($type_filter == $type['Type_id']) echo 'selected'; ?>>
                        <?php echo $type['Name']; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div>
            <label for="class_filter"></label>
            <select name="class_filter" id="class_filter">
                <option value="NULL">View All Classes</option>
                <?php foreach ($classes_list as $class) : ?>
                    <option value="<?php echo $class['Class_id']; ?>"
                    <?php if($class_filter == $class['Class_id']) echo 'selected'; ?>>
                        <?php echo $class['Name']; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="sorters">
            <span>Sort by:</span>
            <input type="radio" name="sort" id="sort" value="price" checked>
            <label for="sort_by_price">Price</label>

            <input type="radio" name="sort" id="sort" value="year" 
                <?php if($sort == 'year') echo 'checked'; ?>>
            <label for="sort_by_year">Year</label>
        </div>
        <input class="button" type="submit" value="Submit">
    </form>

    <section>
        <?php if($vehicles_list == NULL){ ?>
            <br><p>NO VEHICLES IN THIS CATEGORY!</p><br>
        <?php }else { ?>
        <table>
            <tr>
                <th>Year</th>
                <th>Make</th>
                <th>Model</th>
                <th>Type</th>
                <th>Class</th>
                <th>Price</th>
                <th>&nbsp;</th>
            </tr>
            <?php foreach ($vehicles_list as $vehicle): ?>
                <?php $make = get_make_name($vehicle['Make_id'])?>
                <?php $type = get_type_name($vehicle['Type_id'])?>
                <?php $class = get_class_name($vehicle['Class_id'])?>
            <tr>
                <td><?php echo $vehicle['Year']; ?></td>
                <td><?php echo $make ?></td>
                <td><?php echo $vehicle['Model']; ?></td>
                <td><?php echo $type ?></td>
                <td><?php echo $class ?></td>
                <td><?php echo "$",$vehicle['Price']; ?></td>
                <td><form action="." method="post">
                    <input type="hidden" name="action"
                           value="delete_vehicle">
                    <input type="hidden" name="vehicle_id"
                           value="<?php echo $vehicle['Vehicle_id']; ?>">
                    <input type="submit" value="Delete">
                </form></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php  }?>
    </section> 
</main>
<?php include 'footer.php'; ?>
