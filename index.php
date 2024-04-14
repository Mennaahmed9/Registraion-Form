<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Page</title>
    <link rel="stylesheet" href="style/style.css">
</head>
<body>
    <?php include "header.php"?>
    <div class="container">
        <div class="box box-form">
            <h3>Registration Form</h3>
            <form id="userForm" action= "" method = "post"> 
                <div class="input-field">
                    <label for="name"><span style="color:red;">*</span>Full Name:</label>
                    <input type="text" name="name" id="name" pattern="[a-zA-Z\s]+" required>
                </div>
                <!-- <br> -->
                <div class="input-field">
                    <label for="user"><span style="color:red;">*</span>User Name:</label>
                    <input type="text" name="user" id="user" required>
                </div>
                <!-- <br> -->
                <div class="input-field">
                    <label for="birthdate"><span style="color:red;">*</span>BirthDate:</label>
                    <input type="date" name="birthdate" id="birthdate" required>
                </div>
                <div class="input-field">
                <button type="submit" name="checkActors">Check Actors Born on this Day</button>
                </div>
                <!-- <br> -->
                <div class="input-field">
                    <label for="phone"><span style="color:red;">*</span>Phone Number</label>
                    <input type="text" name="phone" id="phone" required>
                </div>
                <div class="input-field">
                    <label for="address"><span style="color:red;">*</span>Address:</label>
                    <input type="text" name="address" id="address" required>
                </div>
                <div class="input-field">
                    <label for="email"><span style="color:red;">*</span>Email:</label>
                    <input type="email" name="email" id="email" required>
                </div>
                <div class="input-field">
                    <label for="password"><span style="color:red;">*</span>Password:</label>
                    <input type="password" name="password" id="password" pattern="(?=.*\d)(?=.*[!@#$%^&*]).{8,}" required oninput="checkPasswordMatch()">
                </div>
                <div class="input-field">
                    <label for="confirm_password"><span style="color:red;">*</span>Confirm Password:</label>
                    <input type="password" name="confirm_password" id="confirm_password" pattern="(?=.*\d)(?=.*[!@#$%^&*]).{8,}" required oninput="checkPasswordMatch()">
                    <span id="password_match" style="color: red;"></span><br>
                </div>
                <div class="input-field">
                    <label for="image"><span style="color:red;">*</span>Image:</label>
                    <input type="file"  name="image" id="image">
                </div>
                <div class="input-field">
                    <button type="submit">Register</button>
                </div>
            </form>

        </div>
    </div>

    <script>
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
  </script>
    <?php include "footer.php"?>

</body>
</html>