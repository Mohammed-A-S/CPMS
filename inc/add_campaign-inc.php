<?php
if (isset($_POST['add_campaign']))
{
	$sql = "SELECT * FROM users WHERE EMAIL='$user_email'";
	$query = mysqli_query($conn, $sql);
	$user_info = mysqli_fetch_array($query);

	$USER_ID = $user_info['ID'];
	$campaign_name = $_POST['campaign_name'];
	$campaign_amount = $_POST['campaign_amount'];

	$campaign = "INSERT INTO campaigns(FOUNDER_ID, C_NAME, A_REQUIRED, A_RECORDED, A_PAID, C_STATUS, C_MESSAGE)
				VALUES ('$USER_ID', '$campaign_name', '$campaign_amount', 0, 0, 'IN PROCESS', '')";
	$campaign_query = mysqli_query($conn, $campaign);
	
	if($campaign_query)
	{
		header ("location: Campaigns.php");
	}
}