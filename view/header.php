<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP&display=swap" rel="stylesheet">
    <style type="text/css">
        body {
            font-family: "Noto Sans", sans-serif;
        }

        .navbar {
            background: #ECE9E6;
            /* fallback for old browsers */
            background: -webkit-linear-gradient(to left, #FFFFFF, #ECE9E6);
            /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to left, #FFFFFF, #ECE9E6);
            /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
            /* Credit for gradient: https://uigradients.com/#Clouds */
        }
    </style>
    <title>Zippy Used Autos</title>
</head>

<body>
    <header class="container">
        <nav class="navbar navbar-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php?action=list_vehicles">
                    <h1>Zippy Used Autos</h1>
                </a>
                <?php if ($action != 'register') {
                    $lifetime = 60 * 60 * 24;
                    session_set_cookie_params($lifetime, '/');
                    session_start();
                    if ($action != 'logout') {
                        if (isset($_SESSION['userid'])) { ?>
                            <p>Welcome <?php echo $_SESSION['userid']; ?>! (<a href="./index.php?action=logout">Sign Out</a>)</p>
                        <?php } else { ?>
                            <a class="nav-item" href="./index.php?action=register">Register</a>
                        <?php }
                    }
                } ?>
            </div>
        </nav>
    </header>