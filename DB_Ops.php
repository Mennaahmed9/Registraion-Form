<?php
session_start();

// Initializing variables
$name="";
$user="";
$birthdate="";
$phone=0;
$address="";
$email="";
$password="";
$confirm_password="";
$errors=array();

// Connect to the database
$database = mysqli_connect('localhost','root','','registrationwebsiteuser');

// Register user
if (isset($_POST['registerUser'])) {
    // receive all input values from the form
    $name = mysqli_real_escape_string($database,$_POST['name']);
    $user = mysqli_real_escape_string($database,$_POST['user']);
    $birthdate = mysqli_real_escape_string($database,$_POST['birthdate']);
    $phone = mysqli_real_escape_string($database,$_POST['phone']);
    $address = mysqli_real_escape_string($database,$_POST['address']);
    $email = mysqli_real_escape_string($database,$_POST['email']);
    $password = mysqli_real_escape_string($database,$_POST['password']);
    $confirm_password = mysqli_real_escape_string($database,$_POST['confirm_password']);

    // Form validation that everything was filled correctly by the user
    if(empty($name)){
        array_push($errors, "Full name is required");
    }
    if(empty($user)){
        array_push($errors, "Username is required");
    }
    if(empty($birthdate)){
        array_push($errors, "Birth Date is required");
    }
    if(empty($phone)){
        array_push($errors, "Phone number is required");
    }
    if(empty($address)){
        array_push($errors, "Address is required");
    }
    if(empty($email)){
        array_push($errors, "Email is required");
    }
    if(empty($password)){
        array_push($errors, "Password is required");
    }
    if(empty($confirm_password)){
        array_push($errors, "Confirming your password is required");
    }
    if($password != $confirm_password){
        array_push($errors, "The two passwords do not match");
    }

    // Check if user already exists
    $userCheckQuery = "SELECT * FROM users WHERE Username = '$user' LIMIT 1";

// Execute the SQL query on the database
$result = mysqli_query($database, $userCheckQuery);

// Check for query execution success or failure
if ($result) {
    // Query executed successfully
    // Check if any rows are returned
    if (mysqli_num_rows($result) > 0) {
        // Fetch the user data
        $foundUser = mysqli_fetch_assoc($result);
        // Now you can use $user array to access user data
        // print_r($foundUser);
    } else {
        // No matching user found
        // echo "No user found!";
    }
} else {
    // Query execution failed
    // Print error message
    // echo "Error: " . mysqli_error($database);
}

    // print_r($foundUser);
    if ($foundUser) {

        if($foundUser['Username'] == $user){
            array_push($errors, "Username already exists");
        }
    }
    else{
    // print_r($errors);
    // No errors found then continue registration process
    // if (count($errors) == 0) {
    // Place password in database encrypted
    $password = md5($password);
    // Insert user data into the database
    $query = "INSERT INTO users (`Full Name`, `Username`, `BirthDate`, `PhoneNumber`, `Address`, `Email`, `Password`) 
          VALUES ('$name', '$user', '$birthdate', '$phone', '$address', '$email', '$password')";


    // Execute the SQL query
    if (mysqli_query($database, $query)) {
        echo "User inserted successfully.";
    } else {
        echo "Error: " . mysqli_error($database);
    }


    // Set session variables and redirect to success page
    $_SESSION['user'] = $user;
    $_SESSION['success'] = "You are now registered!";
    // header('location: index.php'); // Redirect to success page
    // exit();
}
    
}
?>
