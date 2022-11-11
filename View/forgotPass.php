<?php
session_start();
// error_reporting(0);
$error = array();
require "Mail.php";

include '../inc/conn.php';

$mode = "enter_email";
if(isset($_GET['mode']))
{
    $mode =$_GET['mode'];
}

//somthing is posted
if(count($_POST) > 0)
{
    switch($mode)
    {
        case 'enter_email':
            $_email = $_POST['Email'];

            //validate email
            if(!filter_var($_email,FILTER_VALIDATE_EMAIL))
            {
                $error[] = "please enter a valid email";
            }
            elseif(!valid_email($_email))
            {
                $error[] = "That email was not found";
            }
            else
            {
                $_SESSION['Forgot']['Email'] = $_email;
                send_email($_email);
                header("Location: forgotPass.php?mode=enter_code");
                die;
            }
        break;

        case 'enter_code':
            $_code = $_POST['Code'];
            $_result = is_code_correct($_code);

            if($_result == "the code is correct")
            {
                $_SESSION['Forgot']['Code'] = $_code;
                header("Location: forgotPass.php?mode=enter_password");
                die;
            }
            else
            {
                $error[] = $_result;
            }
        break;

        case 'enter_password':
            $password = $_POST['newPass'];
            $password2 = $_POST['ConfirmPass'];

            if($password !== $password2)
            {
                $error[] = "password do not match";
            } 
            elseif(!isset($_SESSION['Forgot']['Email']) || !isset($_SESSION['Forgot']['Code'])) 
            {
                header("Location: forgotPass.php");
                die;
            } 
            else
            { 
                save_password($password);
                if(isset($_SESSION['Forgot']))
                {
                    unset($_SESSION['Forgot']);
                }
                header("Location: signin.php");
                die;
            }
        break;

        default:
        break;
    }
    }
    function send_email($_email)
    {
        global $conn;

        $_expire = time() / (60);
        $_code = rand(10000,99999);
        $_email = addslashes($_email);
        
        $forgot_Password_query = "INSERT INTO re_set (EMAIL, CODE, EXPIRE) VALUE ('$_email', '$_code', '$_expire')";
        mysqli_query($conn,$forgot_Password_query);   
        send_mail($_email,'RESET PASSWORD',"Your code is " . $_code);
        //send email here
        //mail($_mail, 'website: RESET PASSWORD' , 'your code is' . $_code);
    }

    function save_password($password)
    {
        global $conn;
        //$password = password_hash($password, PASSWORD_DEFAULT);
        $_email = addslashes($_SESSION['Forgot']['Email']);

        $forgot_Password_query = "UPDATE users SET PWD = '$password' WHERE EMAIL = '$_email' LIMIT 1";
        mysqli_query($conn,$forgot_Password_query);   
        //send email here
        //mail($_mail, 'website: RESET PASSWORD' , 'your code is' . $_code);
    }

    function valid_email($_email)
    {
        global $conn;
        $_email = addslashes($_email);
        
        $forgot_Password_query = "SELECT * FROM users WHERE EMAIL = '$_email' limit 1";
        $_result = mysqli_query($conn,$forgot_Password_query);   
        if($_result)
        {
            if(mysqli_num_rows($_result) > 0)
            {
                return true;
            }
        }
        return false;
    }

    function is_code_correct($_code)
    {
        global $conn;

        $_code = addslashes($_code);
        $_expire = time() * (60);
        $_email = addslashes($_SESSION['Forgot']['Email']);

        $forgot_Password_query = "SELECT * FROM re_set WHERE CODE = '$_code' && EMAIL = '$_email' order by id desc limit 1";
        $_result = mysqli_query($conn,$forgot_Password_query);   
        if($_result)
        {
            if(mysqli_num_rows($_result) > 0)
            {
                $_row = mysqli_fetch_assoc($_result);
                if($_row['expire'] = $_expire)
                {
                    return "the code is correct";
                    die;
                }
                else
                {
                    return "the code is expired";
                    die;
                }
            }
        }
        return "the code is incorrect";
    } 
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
    <?php

    switch($mode){
        case 'enter_email':
            ?>
            <div class="center"> 
                <div class="container">
                <div class="text">
                Checking Email
                </div>
                    <form action="../View/forgotPass.php?mode=enter_email" method="POST">
                        <div class="data">
                        <input type="text" name="Email" placeholder="Email" required>
                        </div>
                        <div class="error">
                        <?php
                                foreach($error as $err){
                                    echo $err . "<br>";
                                }
                        ?>
                        </div>
                        <div class="forgot-pass">
                            <a href="../View/signin.php">Login to your account</a>
                        </div>
                        <div class="btn">
                        <div class="inner"></div>
                        <button type="submit" name="forgotPass">Check</button>
                    </form>
                </div>
            </div>
            <?php
        break;

        case 'enter_code':
            ?>
            <div class="center"> 
                <div class="container">
                <div class="text">
                Checking Code
                </div>
                    <form action="../View/forgotPass.php?mode=enter_code" method="POST">
                    
                        <div class="data">
                        <input type="text" name="Code" placeholder="Enter the code" required>
                        </div>
                        <div class="error">
                        <?php
                                foreach($error as $err){
                                    echo $err . "<br>";
                                }
                        ?>
                        </div>
                        <div class="forgot-pass">
                            <a href="../View/forgotPass.php?mode=enter_email"> Back </a>
                        </div>
                        <div class="btn">
                        <div class="inner"></div>
                        <button type="submit" name="forgotPass">Verify</button>
                    </form>
                </div>
            </div>
            <?php
        break;

        case 'enter_password':
            ?>
            <div class="center"> 
                <div class="container">
                <div class="text">
                Reset Password
                </div>
                    <form action="../View/forgotPass.php?mode=enter_password"  method="POST">
                    
                        <div class="data">
                        <input type="text" name="newPass" placeholder="New Password" required>
                        <br><br>
                        <input type="text" name="ConfirmPass" placeholder="Confirm Password" required>
                        </div>
                        <br>
                        <div class="error">
                        <?php
                                foreach($error as $err){
                                    echo $err . "<br>";
                                }
                        ?>
                        </div>
                        <div class="btn">
                        <div class="inner"></div>
                        <button type="submit" name="forgotPass">Save new password</button>
                    </form>
                </div>
            </div>
            <?php
        break;

        default:

        break;
    }

        ?>  
    </body>
</html>