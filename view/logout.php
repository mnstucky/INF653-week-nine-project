<?php

require('header.php');
$firstname = $_SESSION['userid'];
$_SESSIOn = array();
session_destroy();

$name = session_name();
$expire = strtotime('-1 year');
$params = session_get_cookie_params();
$path = $params['path'];
$domain = $params['domain'];
$secure = $params['secure'];
$httponly = $params['httponly'];
setcookie($name, '', $expire, $path, $domain, $secure, $httponly);


?>

<main class="container">
    <h2>Thank you for signing out, <?php echo $firstname ?>.</h2>
    <p><a href="./index.php?action=list_vehicles">Click here</a> to view our vehicle list.</p>
</main>

<?php require('footer.php'); ?>