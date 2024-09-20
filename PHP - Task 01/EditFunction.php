<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "internship";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
}

if (isset($_POST['Editsubmit'])) {
    $id = $_POST['id'];
    $FirstName = $_POST['FirstName'];
    $LastName = $_POST['LastName'];
    $Email = $_POST['Email'];
    $password = $_POST['password'];
    $ConPassword = $_POST['ConPassword'];
    $number = $_POST['number'];
    $address = $_POST['address'];
    $image = $_POST['image'];
    $status = $_POST['status'];

    $hashPassword = password_hash($password, PASSWORD_DEFAULT);

    $sql = "UPDATE testing SET firstName='$FirstName',lastName='$LastName',email='$Email',password='$hashPassword',phoneNumber='$number',address='$address',image='$image',status='$status' WHERE id=$id";

    if ($conn->query($sql) == TRUE) {
        header('Location: ./update.php');
    } else {
        echo "error";
    }
}
