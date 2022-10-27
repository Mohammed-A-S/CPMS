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
	$sql = "SELECT * FROM users WHERE EMAIL = '$user_email'";
	$query = mysqli_query($conn, $sql);
	$raw = mysqli_fetch_array($query);
	$founder_id = $raw['ID'];

	$campaigns = "SELECT * FROM campaigns WHERE FOUNDER_ID = '$founder_id' AND C_STATUS = 'IN PROCESS'";
	$campaigns_query = mysqli_query($conn, $campaigns);
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
					<i class='bx bxs-dollar-circle'></i>
					<h1>Campaigns</h1> 
				</div>
			</div>


			<div class="table-data">
				<div class="order">
					<h3>Campaigns</h3>
					<table>
						<thead>
							<tr>
								<th><i class='bx bx-transfer-alt bx-rotate-270' ></i></i>Camping name</th>
								<th><i class='bx bx-transfer-alt bx-rotate-270' ></i></i>Wanted amount</th>
								<th><i class='bx bx-transfer-alt bx-rotate-270' ></i></i>Payed amount</th>
								<th><i class='bx bx-transfer-alt bx-rotate-270' ></i></i>Status</th>
							</tr>
						</thead>
						<tbody>
							<?php while($campaigns_row = mysqli_fetch_array($campaigns_query)):?>
							<tr>
								<td><a href="Campaign_Page.php?page= <?php echo $campaigns_row['ID'];?>"><?php echo $campaigns_row['C_NAME']; ?> Campaign</a></td>
								<td><p class="A_REQUIRED"><?php echo $campaigns_row['A_REQUIRED'];?></p></td>
								<td><p class="A_PAID"><?php echo $campaigns_row['A_PAID'];?></p></td>
								<td><span class="status process"><?php echo $campaigns_row['C_STATUS']; ?></span></td>
							</tr>
							<?php endwhile; ?>
						</tbody>
					</table>
					<a href="New_Campaigns.php" class="adding-campaign">
						<i class='bx bx-plus'></i>
						<p> Adding New Campaign</p>
					</a>
				</div>
			</div>
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	

	<script src="../Script/script.js"></script>
</body>
</html>