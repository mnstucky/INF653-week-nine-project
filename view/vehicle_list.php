<?php require('header.php'); ?>

<main>
    <h1>Zippy Used Autos</h1>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Year</th>
                <th scope="col">Make</th>
                <th scope="col">Model</th>
                <th scope="col">Type</th>
                <th scope="col">Class</th>
                <th scope="col">Price</th>
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
                </tr>
            <?php } ?>
        </tbody>
    </table>
</main>

<?php require('footer.php'); ?>