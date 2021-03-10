<?php require('header.php'); ?>

<main class="container">
    <section class="mt-2 mb-2">
        <form action="index.php" method="GET">
            <div class="d-flex flex-wrap">
                <label for="makeId" class="d-flex align-items-center">
                    <h4 class="mb-2">Make:</h4>
                    <select id="makeId" name="makeId" class="me-2 ms-1 mb-2">
                        <option value="all">View All Makes</option>
                        <?php foreach ($makes as $make) { ?>
                            <option value="<?php echo $make['id'] ?>">
                                <?php echo $make['make'] ?>
                            </option>
                        <?php } ?>
                    </select>
                </label>
                <label for="typeId" class="d-flex align-items-center">
                    <h4 class="mb-1">Type:</h4>
                    <select id="typeId" name="typeId" class="me-2 ms-1 mb-1">
                        <option value="all">View All Types</option>
                        <?php foreach ($types as $type) { ?>
                            <option value="<?php echo $type['id'] ?>">
                                <?php echo $type['type'] ?>
                            </option>
                        <?php } ?>
                    </select>
                </label>
                <label for="classId" class="d-flex align-items-center">
                    <h4>Class:</h4>
                    <select id="classId" name="classId" class="me-2 ms-1">
                        <option value="all">View All Classes</option>
                        <?php foreach ($classes as $class) { ?>
                            <option value="<?php echo $class['id'] ?>">
                                <?php echo $class['class'] ?>
                            </option>
                        <?php } ?>
                    </select>

                </label>
            </div>
            <label for="sortMethod">
                <p>Sort By: </p>
            </label>
            <input type="radio" id="price" name="sortMethod" value="price">
            <label for="price">Price</label>
            <input type="radio" id="year" name="sortMethod" value="year">
            <label for="year">Year</label>
            <button type="submit" class="btn btn-primary ms-2">Submit</button>
        </form>
    </section>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Year</th>
                    <th scope="col">Make</th>
                    <th scope="col">Model</th>
                    <th scope="col">Type</th>
                    <th scope="col">Class</th>
                    <th scope="col">Price</th>
                    <th scope="col">Remove</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($vehicles as $vehicle) {
                    $makeId = $vehicle['make_id'];
                    $typeId = $vehicle['type_id'];
                    $classId = $vehicle['class_id']; ?>
                    <tr>
                        <td><?php echo $vehicle['year'] ?></td>
                        <td><?php echo get_make_by_id($makeId) ?></td>
                        <td><?php echo $vehicle['model'] ?></td>
                        <td><?php echo get_type_by_id($typeId) ?></td>
                        <td><?php echo get_class_by_id($classId) ?></td>
                        <td><?php echo '$' . number_format($vehicle['price'], 2) ?></td>
                        <td>
                            <form action="index.php" method="POST">
                                <input type="hidden" name="vehicle_id" value="<?php echo $vehicle['vehicleID']; ?>">
                                <input type="hidden" name="action" value="delete_vehicle">
                                <button class="btn-close" aria-label="Delete"></button>
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

    </div>
    <section>
        <p><a href="index.php?action=show_add_vehicle_form">Click here</a> to add a vehicle</p>
        <p><a href="index.php?action=show_makes_form">View/Edit Vehicle Makes</a></p>
        <p><a href="index.php?action=show_types_form">View/Edit Vehicle Types</a></p>
        <p><a href="index.php?action=show_classes_form">View/Edit Vehicle Classes</a></p>
    </section>

</main>

<?php require('footer.php'); ?>