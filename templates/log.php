<?php  
function login11()
{
    require_once "config.php";
    // username and password sent from form 
    //session_start();
    // Set session variables

    //header("location: index22.html");
    $myusername = mysqli_real_escape_string($conn, $_POST['email']);
    $mypassword = mysqli_real_escape_string($conn, $_POST['password']);

    //$phpVariable = $myusername;
    //$_SESSION["name"] = $myusername;
    $sql = "SELECT userid  FROM registerform WHERE email = '$myusername' and password1 = '" . md5($mypassword) . "'";
	// SELECT userid FROM registerform WHERE email = 'ghoshramprasad123@gmail.com' and password1 = '4641999a7679fcaef2df';
	// SELECT email FROM registerform WHERE email = 'ghoshramprasad123@gmail.com' and password1 = 'dacxz';
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    //$active = $row['active'];
    $count = mysqli_num_rows($result);
    // If result matched $myusername and $mypassword, table row must be 1 row

    if ($count == 1) {
      header("location: reg.html");
    } else {
        $error = "Your Login Name or Password is invalid";
		echo "<script>alert('Your Login Name or Password is invalid')</script>";
		// echo $myusername;
		// echo md5($mypassword);
		// echo $count;
    }
	
}
if (array_key_exists('lo', $_POST)) {
    
	login11();
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
    <link rel="stylesheet" href="log2.css">
    <title>Login Page</title>
</head>
<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 col-sm-12 col-lg-12">
                <img src="/static/logbg.png" alt="Background Image" class="img-fluid" >
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="login-container">
                    <form action="log.php", method="post">
                        <h2 class="h2">Login</h2>
                        <div class="mb-3">
                            <label for="inputEmail3" class="form-label"></label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                        </div>
                        <div class="mb-3">
                            <label for="inputPassword3" class="form-label"></label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                        </div>
                        <div class="row">
                            <div class="btn-group">
                                <button type="submit" class="btn btn-primary btn-md"><a href="reg.html" id="button"  name="lo">Sign in</a></button>
                                <button type="submit" class="btn btn-primary btn-md"><a href="reg.php" id="button">Register</a></button>
                            </div>
                        </div>


                        
                        
                        
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function validateForm() {
            
           
            const email = document.getElementById("email").value;
           
            if (!email.includes("@")) {
                alert("Enter a valid email address");
                return false;
            }
        }

           
    </script>
</body>
</html>