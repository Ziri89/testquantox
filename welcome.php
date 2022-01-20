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
    <div>
    <title>Search Bar</title>
        <form method="post">
        <label>Search</label>
        <input type="text" name="search">
        <input type="submit" name="submit">
        </form>
<?php
require('dbConnect.php');


if (isset($_POST["submit"])) {
	$str = $_POST["search"];
    $mysqli = mysqli_connect("localhost", "root", "", "quantox","3308");

    $query = "SELECT * FROM `search` WHERE Name = '$str'";

    $result = mysqli_query($mysqli, $query);

/* fetch associative array */
    while ($row = mysqli_fetch_row($result)) {
    printf("%s (%s)\n", $row[0], $row[1]);
    }
    }
		?>

		<br><br><br>
		
 