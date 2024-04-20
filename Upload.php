<?php
// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
    // Check if a file was uploaded without errors
    if (isset($_FILES["image"]) && $_FILES["image"]["error"] == 0) {
        $targetDir = "uploads/"; // Directory where you want to store the uploaded images
        $targetFile = $targetDir . basename($_FILES["image"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($targetFile,PATHINFO_EXTENSION));

        // Check if the file already exists
        if (file_exists($targetFile)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }

        // Check file size
        if ($_FILES["image"]["size"] > 5000000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }

        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        } else {
            // if everything is ok, try to upload file
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
                // File uploaded successfully, now insert image name into database
                $imageName = basename($_FILES["image"]["name"]);
                // Your database connection and insert query here
                // Example: $sql = "INSERT INTO images (image_name) VALUES ('$imageName')";
                echo "The file ". htmlspecialchars( basename( $_FILES["image"]["name"])). " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    } else {
        echo "No file was uploaded.";
    }
}
?>
<script>
    function previewImage() {
        var fileInput = document.getElementById('image');
        var file = fileInput.files[0];
        var fileReader = new FileReader();

        fileReader.onload = function(e) {
            var img = document.createElement('img');
            img.src = e.target.result;
            img.style.maxWidth = '100%';
            img.style.maxHeight = '200px'; // Adjust as needed
            document.getElementById('file-preview').innerHTML = '';
            document.getElementById('file-preview').appendChild(img);
            document.getElementById('file-preview').style.display = 'block';
            document.getElementById('undo-container').style.display = 'block';
        };

        fileReader.readAsDataURL(file);
    }

    function clearSelection() {
        document.getElementById('image').value = '';
        document.getElementById('file-preview').innerHTML = '';
        document.getElementById('file-preview').style.display = 'none';
        document.getElementById('undo-container').style.display = 'none';
    }
</script>

