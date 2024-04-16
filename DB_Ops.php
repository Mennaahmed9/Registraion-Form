<?php
session_start();

// Initializing variables
$fullName="";
$userName="";
$birthDate="";
$phoneNumber=0;
$address="";
$email="";
$password="";
$confirmPassword="";
$errors=array();

// Connect to the database
$database = mysqli_connect('localhost','root','','registrationwebsiteuser');

// Register user
if ($_SERVER && isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"] == "POST") {
    // receive all input values from the form
    $fullName = $_POST['$fullName'];
    $userName = $_POST['userName'];
    $birthDate = $_POST['birthDate'];
    $phoneNumber = $_POST['phoneNumber'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];


    // Check if user already exists
    $userCheckQuery = "Select * From users where username ='$username' Limit 1";
    $result = mysqli_query($database,$userCheckQuery);
    $user = mysqli_fetch_assoc($result);
    if ($user) {
            array_push($errors, "Username already exists");
    }

    // No errors found then continue registeration process
    if (count($errors) == 0) {
    // Insert user data into the database
    $query = "INSERT INTO users (username, email, password, full_name, birth_date, phone_number, address) 
                VALUES ('$userName', '$email', '$password', '$fullName', '$birthDate', '$phoneNumber', '$address')";
    mysqli_query($database, $query);

    // Set session variables and redirect to success page
    $_SESSION['username'] = $userName;
    $_SESSION['success'] = "You are now registered and logged in";
    header('location: index.php'); // Redirect to success page
    }
}
?>
