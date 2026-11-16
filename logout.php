<?php
session_start();
date_default_timezone_set("Asia/Kolkata");

// Check if session exists
if (!isset($_SESSION["start_time"])) {
    header("Location: index.html");
    exit();
}

// Get session information
$start_time = $_SESSION["start_time"];
$end_time = time();

// Calculate duration
$duration = $end_time - $start_time;

$hours = floor($duration / 3600);
$minutes = floor(($duration % 3600) / 60);
$seconds = $duration % 60;

// Destroy session
$_SESSION = array();

if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();

    setcookie(
        session_name(),
        "",
        time() - 42000,
        $params["path"],
        $params["domain"],
        $params["secure"],
        $params["httponly"]
    );
}

session_destroy();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

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
        echo $hours . " hours, "
           . $minutes . " minutes and "
           . $seconds . " seconds";
        ?>
    </p>

    <a href="index.html" class="btn">
        Back to Login
    </a>

</div>

</body>
</html>
