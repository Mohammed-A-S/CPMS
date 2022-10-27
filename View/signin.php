<?php
include '../inc/conn.php';
include '../Inc/login-inc.php';

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Login | CPMS</title>
        <link rel="stylesheet" href="../Style/signin_.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    </head>
    <body>
        <div class="center"> 
            <div class="container">
            <div class="text">
                Login
            </div>
            <p style="color:red; margin-top:20px;"><?php echo $error; ?></p>
            <form action="../View/signin.php" method="POST">
                <div class="data">
                    <label>Email </label> 
                    <input type="text" name="Email" placeholder="Enter your username" >
                </div>
                <div class="data">
                    <label>Password</label>
                    <input type="password" name="Password" placeholder="Enter your password" >
                </div>
                <div class="forgot-pass">
                    <a href="#">Forgot Password?</a>
                </div>
                <div class="btn">
                    <div class="inner"></div>
                    <button type="submit" name="Submit">Sign in</button>
                </div>
                <div class="signup-link">
                    If you don't have an account <a href="../View/signup.php">Sign up now</a>
                </div>
            
            </form>
            </div>
        </div>
    </body>
</html>