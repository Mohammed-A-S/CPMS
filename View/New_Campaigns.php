<?php
session_start();
$user_email = $_SESSION['userEmail'];

include '../inc/conn.php';
if(!isset($user_email))
{
	header('location: signin.php');
}
else
{
	include '../inc/add_campaign-inc.php';
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="../Style/style.css">
	<title>CPMS</title>
</head>
<body>
	<!-- SIDEBAR -->
	<?php include '../Config/sidebar-config.php'; ?>
	<!-- SIDEBAR -->

	
	<!-- CONTENT -->
	<section id="content">
		<!-- NAVBAR -->
		<?php include '../Config/nav-config.php'; ?>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
			<div class="head-title">
				<div class="left">
					<i class='bx bx-plus-medical'></i>
					<h1>Add Campaign</h1> 
				</div>
			</div>


			<div class="table-data">
				<div class="order">
					<h3>Add Campaign</h3>
					<form class="New-C-form" action="New_campaigns.php" method="POST">
						<label for="">Campaign Name</label>
						<input type="text" name="campaign_name" required>
						<br><br>
						<label for="">Amount To Reach</label>
						<input type="text" name="campaign_amount" required>
						<br><br>
						<div class="adding-new-campaign">
							<button class="aadd_botton"  name="add_campaign">
								<i class='bx bx-plus'></i>
								<p> Adding New Campaign</p>
							</button>
						</div>
					</form>
				</div>
			</div>
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	

	<script src="../Script/script.js"></script>
</body>
</html>