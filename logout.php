
<?php
session_start();

if (!isset($_SESSION["start_time"])) {
    header("Location: index.html");
    exit();
}

$start_time = $_SESSION["start_time"];
$end_time = time();

$duration = $end_time - $start_time;

$minutes = floor($duration / 60);
$seconds = $duration % 60;

session_unset();
session_destroy();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Logout Page</title>
</head>
<body>

    <h1>Thank You!</h1>
    <p>You have successfully logged out.</p>

    <p>
        Duration of Usage:
        <?php
        echo $minutes . " minutes and "
             . $seconds . " seconds";
        ?>
    </p>

</body>
</html>
