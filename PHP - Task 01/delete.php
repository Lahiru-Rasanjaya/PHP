<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "internship";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
}

$id = $_GET['id'];

$sql = "DELETE FROM testing WHERE id=$id";

if ($conn->query($sql) == TRUE) {
    header("Location: ./update.php");
} else {
    echo "error";
}
