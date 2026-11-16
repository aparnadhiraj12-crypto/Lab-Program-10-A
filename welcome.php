
<?php
session_start();
date_default_timezone_set("Asia/Kolkata");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
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

$name = htmlspecialchars($_SESSION["username"]);
$start_time = date("h:i:s A", $_SESSION["start_time"]);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Welcome Page</title>
</head>
<body>

    <div style="text-align:right;">
        Start Time: <?php echo $start_time; ?>
    </div>

    <h1>Hello, <?php echo $name; ?>!</h1>
    <p>Welcome to the website.</p>

    <form action="logout.php" method="post">
        <input type="submit" value="Logout">
    </form>

</body>
</html>
