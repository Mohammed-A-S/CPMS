<?php
session_start();
$c_id = $_SESSION['CamPAGE'];
include '../inc/conn.php';
$show_campaigns = "SELECT * FROM campaigns WHERE ID = '$c_id'";
$show_campaigns_query = mysqli_query($conn, $show_campaigns);

$row9 = mysqli_fetch_array($show_campaigns_query);
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
<body class="Body">
	<!-- CONTENT -->
	<section id="Share_content">
		
		<!-- MAIN -->
		<main>
			<div class="head-title">
				<div class="left">
					<h1><?php echo $row9['C_NAME'];?> Campaign</h1> 
				</div>
				<div class="left">
					<h1><?php echo $row9['C_FOUNDER'];?></h1> 
				</div>
			</div>

			<!-- info-box -->
			<?php include "../Config/info_box-config.php";?>
			<!-- info-box -->

			<div class="table-data">
				<div class="order">
					<h3>Form of New Participant</h3>
					<h1>Thank You !!</h1>
				</div>
			</div>
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	

	<script src="../Script/script.js"></script>
</body>
</html>