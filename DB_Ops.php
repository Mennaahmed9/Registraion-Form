<?php
class DB_ops {
    private $database;

    public function __construct($database) {
        $this->database = $database;
    }

    public function registerUser($name, $user, $birthdate, $phone, $address, $email, $password, $confirm_password) {
        // Form validation that everything was filled correctly by the user
        $errors = array();
        if (empty($name)) {
            array_push($errors, "Full name is required");
        }
        if (empty($user)) {
            array_push($errors, "Username is required");
        }
        if (empty($birthdate)) {
            array_push($errors, "Birth Date is required");
        }
        if (empty($phone)) {
            array_push($errors, "Phone number is required");
        }
        if (empty($address)) {
            array_push($errors, "Address is required");
        }
        if (empty($email)) {
            array_push($errors, "Email is required");
        }
        if (empty($password)) {
            array_push($errors, "Password is required");
        }
        if (empty($confirm_password)) {
            array_push($errors, "Confirming your password is required");
        }
        if ($password != $confirm_password) {
            array_push($errors, "The two passwords do not match");
        }

        // Check if user already exists
        $userCheckQuery = "SELECT * FROM users WHERE Username = '$user' LIMIT 1";
        $result = mysqli_query($this->database, $userCheckQuery);

        if ($result && mysqli_num_rows($result) > 0) {
            return "Username already taken. Please try another one!";
        } else {
            // No errors found then continue registration process
            $password = md5($password);
            $query = "INSERT INTO users (`Full Name`, `Username`, `BirthDate`, `PhoneNumber`, `Address`, `Email`, `Password`) 
                      VALUES ('$name', '$user', '$birthdate', '$phone', '$address', '$email', '$password')";
            if (mysqli_query($this->database, $query)) {
                return "User inserted successfully!";
            } else {
                return "Error: " . mysqli_error($this->database);
            }
        }
    }
}
