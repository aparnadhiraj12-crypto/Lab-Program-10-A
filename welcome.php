<?php
session_start();
date_default_timezone_set("Asia/Kolkata");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = trim($_POST["username"] ?? "");

    if ($name === "") {
        header("Location: index.html");
        exit();
    }

    $_SESSION["username"] = $name;
    $_SESSION["start_time"] = time();
}

if (!isset($_SESSION["username"])) {
    header("Location: index.html");
    exit();
}

$name = htmlspecialchars(
    $_SESSION["username"],
    ENT_QUOTES,
    "UTF-8"
);

$start = date("h:i:s A", $_SESSION["start_time"]);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Welcome Page</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="start-time">
    Start Time: <?php echo $start; ?>
</div>

<div class="container">
    <h1>Hello, <?php echo $name; ?>!</h1>

    <p>You have successfully logged in.</p>

    <form action="logout.php" method="POST">
        <button type="submit">Logout</button>
    </form>
</div>

</body>
</html>

