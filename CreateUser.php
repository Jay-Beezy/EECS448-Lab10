<?php

// Interacting with php
$mysqli = new mysqli("mysql.eecs.ku.edu", "jakebeesley", "ap9beeC3", "jakebeesley");

$name = $_POST["username"];

// Check for if user already exists
$isDuplicate = false;

// Check for empty username
$isEmpty = false;

// Connection checker
if ($mysqli->connect_errno) {
   printf("Connect failed: %s\n", $mysqli->connect_error);
   exit();
}

// Check empty string
if ($name == "") {
   echo "Username field can not be empty<br/>";
   $isEmpty = true;
}
else {
     $query = "SELECT user_id FROM Users";
}

if ( $result = $mysqli->query($query)) {
   while ($row = $result->fetch_assoc()) {
         if ($row["user_id"]==$name) {
            $isDuplicate = true;
         }
   }
   // Free result set
   $result->free();
}

if($isDuplicate) {
        echo "Username already exists";
}
else{
        $query = "INSERT INTO Users VALUES('" . $name . "');";

        if($result = $mysqli->query($query)) {
                   if($isEmpty == false){
                               echo "User has been successfully added<br/>";
                   }
                   else {
                                echo "User has not been successfully added<br/>";
                   }
}
        else {
                   echo "User has not been successfully added";
        }
}

// Close the connection
$mysqli->close();

?>

<!DOCTYPE HTML>
<html>
<link rel="stylesheet" href="myStyle.css">
</html>
