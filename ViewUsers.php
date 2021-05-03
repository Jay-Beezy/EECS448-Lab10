<?php

// Interacting with php
$mysqli = new mysqli("mysql.eecs.ku.edu", "jakebeesley", "ap9beeC3", "jakebeesley");

$query = "SELECT user_id FROM Users";

// Connection checker
if ($mysqli->connect_errno) {
   printf("Connect failed: %s\n", $mysqli->connect_error);
   exit();
}

echo "<table>";
echo "<h1>List of all users:</h1>";
if ($result = $mysqli->query($query)) {
   while($row = $result->fetch_assoc()) {
              echo "<li>", $row["user_id"], "</li>";
   }
   // Free result set
   $result->free();
}

echo "</table>";

// Close the connection
$mysqli->close();

?>


<!DOCTYPE HTML>
<html>
<link rel="stylesheet" href="myStyle.css">
</html>