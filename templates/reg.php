<?php
function register()
{
    require_once "config.php";
 
    $username = stripslashes($_REQUEST['fullname']);
    //escapes special characters in a string
    $username = mysqli_real_escape_string($conn, $username);
    $email    = stripslashes($_REQUEST['email']);
    $email    = mysqli_real_escape_string($conn, $email);
    $password = stripslashes($_REQUEST['password']);
    $password = mysqli_real_escape_string($conn, $password);
    
	// Check if username is empty
        // If there were no errors, go ahead and insert into the database
            $user_avatar = 	"";
            $query    = "INSERT into `registerform` (firstname, email, password1)
            VALUES ('$username','$email', '" . md5($password) . "')";
            $result   = mysqli_query($conn, $query);
            if ($result) {
                //  setcookie($cookie_name, $cookie_value, time() + (86400), "/"); // 86400 = 1 day
                header("location: log.php");
            } else {
                echo "Something went wrong... cannot redirect!";

                echo "$password";
                echo "$username";
                echo "$email";
            }
        
    
    mysqli_close($conn);
}
if (array_key_exists('rege', $_POST)) {
    register();
}
    ?>
    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,400;1,400&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400&family=Poppins:ital,wght@0,100;0,200;0,400;1,400&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="reg.css">
        <title>Registration Page</title>
    </head>
    <body>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 col-sm-12 col-lg-12">
                    <img src="logbg5.png" alt="Background Image" class="img-fluid" >
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="reg-container">
                        <form>
                            <h2 class="h2">Register here</h2>
                            <div class="mb-3">
                                <label for="inputname3" class="form-label"></label>
                                <input type="userName" class="form-control" name="fullname" id="userName" placeholder="Username" required minlength="5">
                            </div>
                            <div class="mb-3">
                                <label for="inputEmail3" class="form-label"></label>
                                <input type="email" class="form-control" name="email" id="email" placeholder="Email" required pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}">
                            </div>
                            <div class="mb-3">
                                <label for="inputPassword3" class="form-label"></label>
                                <input type="password" class="form-control" name="password" onInput="check()" id="password" placeholder="Password" required minlength="8">
                            </div>
                            <div class="mb-3">
                                <label for="inputPassword3" class="form-label"></label>
                                <input type="password" class="form-control"  name="confirmpassword" id="confirmPassword" placeholder="Confirm Password" required minlength="8">
                            </div>
                            <div class="row">
                                <div class="btn-group">
                                    <button type="submit" class="btn btn-primary btn-md" id="button" name='rege' onclick="validatePassword()"><a href="log.php">Register</a></button>
                                    <button type="submit" class="btn btn-primary btn-md" id="button"><a href="log.php">Login</a></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    
        <script>
            function validateForm() {
                
                const userName = document.getElementById("userName").value;
                const email = document.getElementById("email").value;
               
                const password = document.getElementById("password").value;
                const confirmPassword = document.getElementById("confirmPassword").value;
    
              
                
                if (userName.length < 5) {
                    alert("Username must be 5 characters long !");
                    return false;
                }
    
                if (!email.includes("@")) {
                    alert("Enter a valid email address");
                    return false;
                }
    
                if (password === "password" || password === userName || password.length < 8) {
                    alert("Password is not strong");
                    return false;
                }
    
                if (password !== confirmPassword) {
                    alert("Passwords do not match");
                    return false;
                }
    
                return true;
            }
        </script>
    </body>
</html>