<?php
if (isset($_POST['add_campaign']))
{
	$sql = "SELECT * FROM users WHERE EMAIL='$user_email'";
	$query = mysqli_query($conn, $sql);
	$user_info = mysqli_fetch_array($query);

	$USER_NAME = $user_info['F_NAME'];
	$campaign_name = $_POST['campaign_name'];
	$campaign_amount = $_POST['campaign_amount'];

	$campaign = "INSERT INTO campaigns(C_FOUNDER, C_NAME, A_REQUIRED, A_RECORDED, A_PAID, C_STATUS, C_MESSAGE)
				VALUES ('$USER_NAME', '$campaign_name', '$campaign_amount', 0, 0, 'IN PROCESS', '')";
	$campaign_query = mysqli_query($conn, $campaign);
	
	if($campaign_query)
	{
		header ("location: All_Campaigns.php");
	}
	else
	{
		echo "!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!$$$$";
	}
}