<?php
session_start();
$user_email = $_SESSION['userEmail'];

include '../inc/conn.php';

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

	<title>All Campaigns</title>
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
					<h1>All Campaigns</h1> 
				</div>
			</div>

			<div class="table-data">
				<div class="order">
					<h3>All Campaigns</h3>
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
							<tr>
								<td><a href="Campaign_Page.html">John Doe</a></td>
								<td>22000</td>
								<td>15800</td>
								<td><span class="status completed">Completed</span></td>
							</tr>
							<tr>
								<td><a href="Campaign_Page.html">John Doe</a></td>
								<td>15000</td>
								<td>12200</td>
								<td><span class="status pending">Pending</span></td>
							</tr>
							<tr>
								<td><a href="Campaign_Page.html">John Doe</a></td>								
								<td>2450</td>
								<td>1250</td>
								<td><span class="status process">Process</span></td>
							</tr>
							<tr>
								<td><a href="Campaign_Page.html">John Doe</a></td>								
								<td>10000</td>
								<td>5000</td>
								<td><span class="status pending">Pending</span></td>
							</tr>
							<tr>
								<td><a href="Campaign_Page.html">John Doe</a></td>								
								<td>7550</td>
								<td>5850</td>
								<td><span class="status completed">Completed</span></td>
							</tr>
						</tbody>
					</table>
					<br><br>
						<div class="adding-new-campaign">
							<button class="aadd_botton"  name="add_campaign">
								<i class='bx bx-plus'></i>
								<p> Adding New Campaign</p>
							</button>
						</div>
				</div>
			</div>
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	

	<script src="../Script/script.js"></script>
</body>
</html>