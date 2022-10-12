<?php
session_start();
include "../inc/conn.php";
$c_id = $_SESSION['CamPAGE'];

if (isset($_GET['Paid_check']))
{
    $paid = $_GET['Paid_check'];
    
    //for adding the status with "paid" money to the "paid amount" in the campaigns
    $c_p = "SELECT * FROM campaigns WHERE ID='$c_id'";
    $c_p_query = mysqli_query($conn, $c_p);
    $c_p_fetch = mysqli_fetch_array($c_p_query);

    $p_p = "SELECT * FROM participants WHERE ID='$paid' AND C_ID = '$c_id'";
    $p_p_query = mysqli_query($conn, $p_p);
    $p_p_fetch = mysqli_fetch_array($p_p_query);
    $stat = $p_p_fetch['P_STATUS'];

    $collect = $c_p_fetch['A_PAID'] + $p_p_fetch['M_TO_PAY'];
    if($stat == 'Paid')
    {
        header("location: ../View/Campaign_Page.php");
    }
    else
    {
        $sql_participants = "UPDATE participants SET P_STATUS= 'Paid' WHERE ID = '$paid' AND C_ID = '$c_id'";
        $sql_participants_query = mysqli_query($conn, $sql_participants);

        $SQL = "UPDATE campaigns SET A_PAID = '$collect' WHERE ID = '$c_id'";
        $SQL_query = mysqli_query($conn, $SQL);

        $collect = $c_p_fetch['A_PAID'] + $p_p_fetch['M_TO_PAY'];
        
        header("location: ../View/Campaign_Page.php");
    }
}


if (isset($_GET['Not_Paid_Check']))
{
    $not_paid = $_GET['Not_Paid_Check'];

    //for dividing the status with "not paid" money to the "paid amount" in the campaigns
    $c_p2 = "SELECT * FROM campaigns WHERE ID='$c_id'";
    $c_p2_query = mysqli_query($conn, $c_p2);
    $c_p2_fetch = mysqli_fetch_array($c_p2_query);

    $p_p2 = "SELECT * FROM participants WHERE ID='$not_paid' AND C_ID = '$c_id'";
    $p_p2_query = mysqli_query($conn, $p_p2);
    $p_p2_fetch = mysqli_fetch_array($p_p2_query);
    $stat2 = $p_p2_fetch['P_STATUS'];
    
    if($stat2 === 'Not Paid')
    {
        header("location: ../View/Campaign_Page.php");
    }
    else
    {
        $uncollect = $c_p2_fetch['A_PAID'] - $p_p2_fetch['M_TO_PAY'];
        if($uncollect <= 0)
        {
            $uncollect = 0;
        }
        else
        {
            $uncollect;
        }
        
        $sql_participants = "UPDATE participants SET P_STATUS= 'Not Paid' WHERE ID = '$not_paid' AND C_ID = '$c_id '";
        $sql_participants_query = mysqli_query($conn, $sql_participants);

        $SQL = "UPDATE campaigns SET A_PAID = '$uncollect' WHERE ID = '$c_id'";
        $SQL_query = mysqli_query($conn, $SQL);

        header("location: ../View/Campaign_Page.php");
    }
}