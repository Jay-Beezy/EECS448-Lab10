<?php

// Interacting with php
$mysqli = new mysqli("mysql.eecs.ku.edu", "jakebeesley", "ap9beeC3", "jakebeesley");

$user_name = $_POST["username"];
$post_text = $_POST["post"];
$isUser = false;

// Connection checker
if ($mysqli->connect_errno) {
   printf("Connect failed: %s\n", $mysqli->connect_error);
   exit();
}

if ($post_text == "") {
        echo "Post field can not be empty <br/>";
}
else {
        $userQuery = "SELECT user_id FROM Users";
        if ($result = $mysqli->query($userQuery)) {
                while($row = $result->fetch_assoc()) {
                        if($row["user_id"] == $user_name){
                                $isUser = true;
                        }
                }
                $result->free();
        }
        if ($isUser == true) {
                $postQuery = "INSERT INTO Posts (content, author_id) VALUES ('$post_text', '$user_name')";
                if($mysqli->query($postQuery)){
                        echo "Your post has been successfully added!<br/>";
                }
                else {
                     echo "Your post has not been added<br/>";
                }
        }
        else {
                echo "Username does not exist<br/>";
        }
}

$mysqli->close();

?>

<!DOCTYPE HTML>
<html>
<link rel="stylesheet" href="myStyle.css">
</html>
