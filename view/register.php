<?php require('header.php'); ?>

<main class="container">
    <form action="./index.php" method=GET>
        <div class="form-group">
            <label for="firstname">Please enter your first name:</label>
            <input class="form-control" type="text" id="firstname" name="firstname">
            <input type="hidden" name="action" value="register">
            <input class="btn btn-primary" type="submit">
        </div>
    </form>
</main>

<?php require('footer.php'); ?>