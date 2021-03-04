<?php require('header.php'); ?>

<main class="container">
    <section>
        <h4 class="mt-2">Add Vehicle</h4>
        <form action="../admin/index.php" method="POST">
            <label for="new_vehicle_make">
                Make:
            </label>
            <select id="new_vehicle_make" name="new_vehicle_make">
                <?php foreach ($makes as $make) { ?>
                    <option value="<?php echo $make['id']; ?>">
                        <?php echo $make['make'] ?>
                    </option>
                <?php } ?>
            </select>
            <label for="new_vehicle_type">
                Type:
            </label>
            <select id="new_vehicle_type" name="new_vehicle_type">
                <?php foreach ($types as $type) { ?>
                    <option value="<?php echo $type['id']; ?>">
                        <?php echo $type['type'] ?>
                    </option>
                <?php } ?>
            </select>
            <label for="new_vehicle_class">
                Class:
            </label>
            <select id="new_vehicle_class" name="new_vehicle_class">
                <?php foreach ($classes as $class) { ?>
                    <option value="<?php echo $class['id']; ?>">
                        <?php echo $class['class'] ?>
                    </option>
                <?php } ?>
            </select>
            <label for="new_vehicle_year">
                Year:
            </label>
            <input class="form-control m-1" type="text" name="new_vehicle_year">
           <label for="new_vehicle_model">
                Model:
            </label>
            <input class="form-control m-1" type="text" name="new_vehicle_model">
            <label for="new_vehicle_price">
                Price:
            </label>
            <input class="form-control m-1" type="text" name="new_vehicle_price">
            <input type="hidden" name="action" value="add_vehicle">
            <button class="btn btn-primary m-1">Add Item</button>
        </form>
        <a href="../admin/index.php?action=list_vehicles">View Full Vehicle List</a>
    </section>
</main>

<?php require('footer.php'); ?>