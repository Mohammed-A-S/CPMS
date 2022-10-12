<?php
if (isset($_POST['Submit']))
{
    $FN = $_POST['firstName'];
    $MN = $_POST['middleName'];
    $LN = $_POST['lastName'];
    $EM = $_POST['Email'];
    $PA = $_POST['Password'];
    
    $user_register_query = "SELECT EMAIL FROM users WHERE EMAIL='$EM'";
    $user_register_result = mysqli_query($conn, $user_register_query);
    $rows11 = mysqli_num_rows($user_register_result);

    if ($rows11 === 1)
    {
        echo "error";
    }
    else
    {
        $sql = "INSERT INTO users(F_NAME, M_NAME, L_NAME, EMAIL, PWD)
            VALUES ('$FN', '$MN', '$LN', '$EM', '$PA')";
        $RESULT = mysqli_query($conn, $sql);
    }
}