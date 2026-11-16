
<?php
session_start();

if (!isset($_SESSION["start_time"])) {
    header("Location: index.html");
    exit();
}

$duration = time() - $_SESSION["start_time"];

$minutes = floor($duration / 60);
$seconds = $duration % 60;

session_unset();
session_destroy();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Logout Page</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h1>Thank You!</h1>
    <p>You have successfully logged out.</p>

    <h3>Duration of Usage</h3>

    <p class="duration">
        <?php
        echo "$minutes minutes and $seconds seconds";
        ?>
    </p>

    <a href="index.html" class="btn">
        Back to Login
    </a>
</div>

</body>
</html>
