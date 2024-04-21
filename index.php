<?php include "DB_Ops.php"?>
<?php include "Upload.php"?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Page</title>
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/all.css">
</head>
<body>
    <?php include "header.php"?>
    <div class="container">
        <div class="box box-form">
            <h3>Registration Form</h3>
            <form id="userForm" action= "" method = "post" enctype="multipart/form-data">
                <div class="input-field">
                    <label for="name"><span style="color:red;">*</span>Full Name:</label>
                    <input type="text" name="name" id="name" pattern="[a-zA-Z\s]+" required value="<?php echo isset($_SESSION['registration_data']['name']) ? $_SESSION['registration_data']['name'] : ''; ?>">

                </div>
                <!-- <br> -->
                <div class="input-field">
                    <label for="user"><span style="color:red;">*</span>User Name:</label>
                    <input type="text" name="user" id="user" required value="<?php echo isset($_SESSION['registration_data']['user']) ? $_SESSION['registration_data']['user'] : ''; ?>">
                    <span id="username_status" style="color: red;"></span>
                </div>
                <?php
                if (isset($_SESSION['status'])) {
                // Display the warning message
                echo '<div class="alert">' . $_SESSION['status'] . '</div>';
                // Unset or clear the session variable after displaying the message
                unset($_SESSION['status']);
            }
            ?>

                <!-- <br> -->
                <div class="input-field">
                    <label for="birthdate"><span style="color:red;">*</span>BirthDate:</label>
                    <input type="date" name="birthdate" id="birthdate" required value="<?php echo isset($_SESSION['registration_data']['birthdate']) ? $_SESSION['registration_data']['birthdate'] : ''; ?>">
                </div>
                <div class="input-field">
                <button type="submit" name="checkActors">Check Actors Born on this Day</button>
                </div>
                <!-- <br> -->
                <div class="input-field">
                    <label for="phone"><span style="color:red;">*</span>Phone Number</label>
                    <input type="text" name="phone" id="phone" required value="<?php echo isset($_SESSION['registration_data']['phone']) ? $_SESSION['registration_data']['phone'] : ''; ?>">
                </div>
                <div class="input-field">
                    <label for="address"><span style="color:red;">*</span>Address:</label>
                    <input type="text" name="address" id="address" required value="<?php echo isset($_SESSION['registration_data']['address']) ? $_SESSION['registration_data']['address'] : ''; ?>"> 
                </div>
                <div class="input-field">
                    <label for="email"><span style="color:red;">*</span>Email:</label>
                    <input type="email" name="email" id="email" required value="<?php echo isset($_SESSION['registration_data']['email']) ? $_SESSION['registration_data']['email'] : ''; ?>">
                </div>
                <div class="input-field">
                    <label for="password"><span style="color:red;">*</span>Password:</label>
                    <input type="password" name="password" id="password" pattern="(?=.*\d)(?=.*[!@#$%^&*/]).{8,}" required oninput="checkPasswordMatch()" value="<?php echo isset($_SESSION['registration_data']['password']) ? $_SESSION['registration_data']['password'] : ''; ?>">
                </div>
                <div class="input-field">
                    <label for="confirm_password"><span style="color:red;">*</span>Confirm Password:</label>
                    <input type="password" name="confirm_password" id="confirm_password" pattern="(?=.*\d)(?=.*[!@#$%^&*/]).{8,}" required oninput="checkPasswordMatch()" value="<?php echo isset($_SESSION['registration_data']['confirm_password']) ? $_SESSION['registration_data']['confirm_password'] : ''; ?>">
                    <span id="password_match" style="color: red;"></span><br>
                </div>
                <div class="input-field">
                    <label for="image"><span style="color:red;">*</span>Image:</label>
                    <label class="file-input-wrapper">
                        <i class="fas fa-upload"></i> Choose File
                        <input type="file" name="image" id="image" value="<?php echo isset($_SESSION['registration_data']['image']) ? $_SESSION['registration_data']['image'] : ''; ?>" accept="image/png, image/jpeg, image/jpg" onchange="previewImage()">
                    </label>
                    <div id="file-preview"></div>
                    <div id="undo-container" style="display: none;">
                        <span class="undo-button" onclick="clearSelection()">Clear Selection</span>
                    </div>
                </div>
                <div class="input-field">
                    <button type="submit" id="registerButton" name = "registerUser">Register</button>
                </div>
            </form>

        </div>
    </div>

    <script>
        window.onload = function() {
    // Clear form fields when the page is loaded
    <?php
    unset($_SESSION['registration_data']);
    ?>

    };
        function checkPasswordMatch() {
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('confirm_password').value;
            const passwordMatchError = document.getElementById('password_match');
            if (password !== confirmPassword) {
                passwordMatchError.innerText = 'Password does not match';
            } else {
                passwordMatchError.innerText = '';
            }
        }

        // Prevent form submission if passwords don't match
        document.getElementById('userForm').addEventListener('submit', function(event) {
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('confirm_password').value;
            if (password !== confirmPassword) {
                event.preventDefault(); // Prevent form submission
                document.getElementById('password_match').innerText = 'Password does not match';
            }
        });

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
    <?php include "footer.php"?>

</body>
</html>
