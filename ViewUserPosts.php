<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

// Interacting with php
$mysqli = new mysqli("mysql.eecs.ku.edu", "jakebeesley", "ap9beeC3", "jakebeesley");

$username = $_POST["username"];
$query = "SELECT content FROM Posts WHERE author_id='$username' ORDER BY 'post_id'";


echo "<table>";
// Connection checker
if ($mysqli->connect_errno) {
   printf("Connect failed: %s\n", $mysqli->connect_error);
   exit();
}

echo "<h5>User Selected : " . $username . "</h5>";
echo "<h1>Posts:</h1>";

if($result = $mysqli->query($query)) {
 while($row = $result->fetch_assoc()){
            echo "<li>".$row["content"]."</li>";
 }
 // Free result set
 $result->free();
}


// Close the connection
$mysqli->close();

echo "</table>";

?>

<!DOCTYPE HTML>
<html>
<link rel="stylesheet" href="myStyle.css">
</html>
