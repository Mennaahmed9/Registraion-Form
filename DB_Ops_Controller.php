<?php
session_start();
include('DB_ops.php');

$database = mysqli_connect('localhost', 'root', '', 'registrationwebsiteuser');
$db_ops = new DB_ops($database);

if (isset($_POST['registerUser'])) {
    $name = mysqli_real_escape_string($database, $_POST['name']);
    $user = mysqli_real_escape_string($database, $_POST['user']);
    $birthdate = mysqli_real_escape_string($database, $_POST['birthdate']);
    $phone = mysqli_real_escape_string($database, $_POST['phone']);
    $address = mysqli_real_escape_string($database, $_POST['address']);
    $email = mysqli_real_escape_string($database, $_POST['email']);
    $password = mysqli_real_escape_string($database, $_POST['password']);
    $confirm_password = mysqli_real_escape_string($database, $_POST['confirm_password']);

    $result = $db_ops->registerUser($name, $user, $birthdate, $phone, $address, $email, $password, $confirm_password);
    if (strpos($result, 'successfully') !== false) {
        $_SESSION['user'] = $user;
        $_SESSION['success'] = "You are now registered!";
        // header('location: index.php'); // Redirect to success page
    } else {
        $_SESSION['registration_data'] = $_POST;
        $_SESSION['status'] = $result;
    }
}

