<?php
session_start();

if (isset($_POST['submit'])) {

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "internship";

    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection Failed: " . $conn->connect_error);
    }

    $FirstName = $_POST['FirstName'];
    $LastName = $_POST['LastName'];
    $Email = $_POST['Email'];
    $password = $_POST['password'];
    $ConPassword = $_POST['ConPassword'];
    $number = $_POST['number'];
    $address = $_POST['address'];
    $image = $_POST['image'];
    $status = $_POST['status'];

    if (empty($FirstName)) {
        $_SESSION['error'] = "First Name is required.";
        header("Location: " . $_SERVER['HTTP_REFERER']);
    }
    if ($password !== $ConPassword) {
        $_SESSION['error'] = "Password and Confirm Password do not match.";
        header("Location: " . $_SERVER['HTTP_REFERER']);
    }
    if (
        !preg_match('/[A-Z]/', $password) || !preg_match('/[a-z]/', $password) ||
        !preg_match('/[0-9]/', $password) || !preg_match('/[@$!%*?&]/', $password)
    ) {
        $_SESSION['error'] = "Password must include uppercase, lowercase, numbers, and special characters.";
        header("Location: " . $_SERVER['HTTP_REFERER']);
    }
    if (!preg_match('/^\d{10}$/', $number)) {
        $_SESSION['error'] = "Phone Number must be 10 digits long.";
        header("Location: " . $_SERVER['HTTP_REFERER']);
    }


    $hashPassword = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO testing(firstName,lastName,email,password,phoneNumber,address,image,status)VALUES('$FirstName','$LastName','$Email','$hashPassword','$number','$address','$image','$status')";

    if ($conn->query($sql) == TRUE) {
        $_SESSION['success'];
        echo '<script>alert("Registration Successfull");window.location.href=" ' . $_SERVER['HTTP_REFERER'] . ' "</script>';
    } else {
        echo 'No';
    }
} else {
    $_SESSION['error'] = 'Please Fill the Registration Form';
    header('Location: ./index.php');
}
