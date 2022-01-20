<?php

include("auth_session.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>welcome</title>
    <link rel="stylesheet" href="style.css" />
</head>
<body>
    <div class="form">
        <p>Hey, <?php echo $_SESSION['name']; ?>!</p>
        <p>Welcome.</p>
        <p><a href="logout.php">Logout</a></p>
    </div>
</body>
</html>