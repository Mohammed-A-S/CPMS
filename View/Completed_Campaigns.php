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
	$sql = "SELECT * FROM campaigns WHERE C_STATUS = 'COMPLETED'";
	$sql_query = mysqli_query($conn, $sql);
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
					<h1>Completed Campaigns</h1> 
				</div>
			</div>

			<div class="table-data">
				<div class="order">
					<h3>Completed Campaigns</h3>
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
							<?php while ($row = mysqli_fetch_array($sql_query)):?>
							<tr>
								<td><a href="Campaign_Page.php?page= <?php echo $row['ID'];?>"><?php echo $row['C_NAME']; ?> Campaign</a></td>
								<td><p class="A_REQUIRED"><?php echo $row['A_REQUIRED'];?></p></td>
								<td><p class="A_PAID"><?php echo $row['A_PAID'];?></p></td>
								<td><span class="status completed"><?php echo $row['C_STATUS']; ?></span></td>
							</tr>
							<?php endwhile;?>
						</tbody>
					</table>
				</div>
			</div>
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	

	<script src="../Script/script.js"></script>
</body>
</html>