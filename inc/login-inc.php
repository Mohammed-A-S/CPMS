<?php
if (isset($_POST['Submit']))
{
    session_start();
    $_SESSION['userEmail'] = $_POST['Email'];
    $user_pwd = $_POST['Password'];

    $user_email = $_SESSION['userEmail'];

    $user_login_query = "SELECT * FROM users WHERE EMAIL='$user_email' AND PWD='$user_pwd'";
    $user_login_result = mysqli_query($conn, $user_login_query);
    $rows1 = mysqli_num_rows($user_login_result);

    if($rows1 === 1)
    {
        header ("location: Campaigns.php");
    }
    else
    {
        echo 'INVALID EMAIL OR PASSWORD!';
    }
}