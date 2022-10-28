<?php
include '../inc/conn.php';
include '../Inc/registration-inc.php';
session_start();
if(session_destroy())
{
    header('Locaation: signin.php');
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Create Account | CPMS </title>
        <link rel="stylesheet" href="../Style/signup_.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div class="container">
            <div class="text">Create Account</div>
            <form action="../View/signup.php" method="POST">
            <div class="form-row">
                <div class="input-data">
                    <input type="text" name="firstName" required>
                    <div class="underline"></div>
                    <label for="">First Name</label>
                </div>
                <div class="input-data">
                    <input type="text" name="middleName" required>
                    <div class="underline"></div>
                    <label for="">Middle Name</label>
                </div>
                <div class="input-data">
                    <input type="text" name="lastName" required>
                    <div class="underline"></div>
                    <label for="">Last Name</label>
                </div>
            </div>
            <div class="form-row">
                <div class="input-data">
                    <input type="text" name="Email" required>
                    <div class="underline"></div>
                    <label for="">Email</label>
                </div>
                <div class="input-data">
                    <input type="text" name="Password" required>
                    <div class="underline"></div>
                    <label for="">Password</label>
                </div>
                
            </div>
            <div class="form-row submit-btn">
                <div class="input-data">
                    <div class="inner"></div>
                    <input type="submit" name="Submit" value="Sign up">
                </div>
                <div class="signin">If you already have an account <a href="../View/signin.php">Sign in Now</a></div> 
            </div>
            
            </form>
        </div>
    </body>
</html>