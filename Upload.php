<?php
// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["registerUser"])) {
    // Check if a file was uploaded without errors
    if (isset($_FILES["image"]) && $_FILES["image"]["error"] == 0) {
        $targetDir = "uploads/"; // Directory where you want to store the uploaded images
        $targetFile = $targetDir . basename($_FILES["image"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($targetFile,PATHINFO_EXTENSION));
        {
            // Form validation that everything was filled correctly by the user
            $database = mysqli_connect('localhost', 'root', '', 'registrationwebsiteuser');

                if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
                    // File uploaded successfully, now insert image name into database
                    $imageName = basename($_FILES["image"]["name"]);
                    // Your database connection and insert query here
                    // Example: $sql = "INSERT INTO images (image_name) VALUES ('$imageName')";
                    $user = mysqli_real_escape_string($database, $_POST['user']);
                    $query = "INSERT INTO image (Username,ImageName)VALUES ('$user','$imageName')";
                    // Execute the SQL query
                    if (mysqli_query($database, $query)) {
//                        echo "The file ". htmlspecialchars( basename( $_FILES["image"]["name"])). " has been uploaded.";
                    } else {
                        echo "Error: " . mysqli_error($database);
                    }
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
        }
    } else {
        echo "No file was uploaded.";
    }
}
?>

