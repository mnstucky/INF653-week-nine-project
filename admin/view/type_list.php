<?php require('header.php'); ?>

<main class="container">
    <section class="mt-2 mb-2">
        <h2>Vehicle Type List</h2>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Remove</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($types as $type) { ?>
                    <tr>
                        <td><?php echo $type['type']; ?></td>
                        <td>
                            <form action="index.php" method="POST">
                                <input type="hidden" name="type_id" value="<?php echo $type['id']; ?>">
                                <input type="hidden" name="action" value="delete_type">
                                <button class="btn-close" aria-label="Delete"></button>
                            </form>
                        </td>

                    </tr>
                <?php } ?>
            </tbody>
        </table>

    </section>
    <section>
        <h2>Add Type</h2>
        <form action="../admin/index.php" method="POST">
            <label for="new_type">
                Type:
            </label>
            <input class="form-control m-1" type="text" name="new_type">
            <input type="hidden" name="action" value="add_type">
            <button class="btn btn-primary m-1">Add Type</button>
        </form>
        <a href="../admin/index.php?action=list_vehicles">View Full Vehicle List</a>
    </section>
    <section>
        <p><a href="index.php?action=show_add_vehicle_form">Click here</a> to add a vehicle</p>
        <p><a href="index.php?action=show_makes_form">View/Edit Vehicle Makes</a></p>
        <p><a href="index.php?action=show_classes_form">View/Edit Vehicle Classes</a></p>
    </section>

</main>

<?php require('footer.php'); ?>