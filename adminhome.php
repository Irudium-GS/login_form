<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin dashboard</title>
</head>
<body>
    <centre>
        <h1>THIS IS admin panel</h1>
        <a href="logout.php">logout</a>
        <?php echo $_SESSION["username"] ?>
    </centre>
</body>
</html>