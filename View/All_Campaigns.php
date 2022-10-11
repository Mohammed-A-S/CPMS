<?php
include "../inc/connction.php";

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
	<section id="sidebar">
		<a href="#" class="brand">
			<i class='bx bx-command'></i>
			<span class="text">CPMS</span>
		</a>
		<ul class="side-menu top">
			<li>
				<a href="Campaigns.html">
					<i class='bx bxs-dollar-circle'></i>
					<span class="text">My Campaigns</span>
				</a>
			</li>
			<li>
				<a href="New_Campaigns.html">
					<i class='bx bx-plus-medical'></i>
					<span class="text">Add Campaign</span>
				</a>
			</li>
			<li>
				<a href="Completed_Campaigns.html">
					<i class='bx bxs-star'></i>
					<span class="text">Completed</span>
				</a>
			</li>
			<li>
				<a href="Uncompleted_Campaigns.html">
					<i class='bx bxs-star-half'></i>
					<span class="text">Uncompleted</span>
				</a>
			</li>
			<li>
				<a href="All_Campaigns.html">
					<i class='bx bxs-group' ></i>
					<span class="text">All Campaigns</span>
				</a>
			</li>
		</ul>
		<ul class="side-menu">
			<li>
				<a href="#" class="logout">
					<i class='bx bx-log-out'></i>
					<span class="text">Logout</span>
				</a>
			</li>
		</ul>
	</section>
	<!-- SIDEBAR -->
	<?php
	pg_fetch_array($table)
	?>

	<!-- CONTENT -->
	<section id="content">
		<!-- NAVBAR -->
		<nav>
			<i class='bx bx-border-left' style="color: white; font-size: 30px;"></i>
			<a href="#" class="Proflie">
				<i class='bx bxs-user-circle' style="font-size: 40px; top: 0px; left: -50px; position: absolute;"></i>
				<span>Khalid Sharahily</span> 
			</a>
		</nav>
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
					<a href="" class="adding-campaign">
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