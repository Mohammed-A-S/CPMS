<?php
include '../inc/conn.php';

if(isset($_GET['share']))
{
    $c_id = $_GET['share'];
    $show_campaigns = "SELECT * FROM campaigns WHERE ID = '$c_id'";
    $show_campaigns_query = mysqli_query($conn, $show_campaigns);
	$row9 = mysqli_fetch_array($show_campaigns_query);
	$founder_id = $row9['FOUNDER_ID'];
	$id_c = $row9['ID'];

	$founder_name = "SELECT * FROM users WHERE ID='$founder_id'";
	$founder_name_query = mysqli_query($conn, $founder_name);
	$row3 = mysqli_fetch_array($founder_name_query);

	//if campaign is completed redirect the location 
	if($row9['C_STATUS'] == 'COMPLETED')
	{
		header('location: thanks.php');
	}
	elseif($row9['C_STATUS'] == 'CANCELED')
	{
		header('location: Canceled.php');
	}
}


if(isset($_POST['add_campaign']))
{
	$PFN = $_POST['P_F_N'];
    $PLN = $_POST['P_L_N'];
    $M2P = $_POST['M_2_P'];
	$CID = $_POST['c_id'];

	$add_participants = "INSERT INTO participants(F_NAME, L_NAME, M_TO_PAY, P_STATUS, C_ID)
						VALUES ('$PFN', '$PLN', '$M2P', 'Not Paid', '$CID')";
	$add_participants_query = mysqli_query($conn, $add_participants);

	$a_record = "SELECT * FROM campaigns WHERE ID = '$CID'";
    $a_record_query = mysqli_query($conn, $a_record);
	$a_record_fetch = mysqli_fetch_array($a_record_query);
	$old_record = $a_record_fetch['A_RECORDED'];

	$sum = $old_record + $M2P;

	$add_campaigns = "UPDATE campaigns SET A_RECORDED = '$sum' WHERE ID = '$CID'";
	$add_campaigns_query = mysqli_query($conn, $add_campaigns);

	header("location: Thanks.php");
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
<body class="Body">
	<!-- CONTENT -->
	<section id="Share_content">
		
		<!-- MAIN -->
		<main>
			<div class="head-title">
				<div class="left">
					<h1><?php $id_c; echo $row9['C_NAME'];?> Campaign</h1> 
				</div>
				<div class="left">
					<h1><?php echo $row3['F_NAME'];?></h1> 
				</div>
			</div>

			<!-- info-box -->
			<?php include "../Config/info_box-config.php";?>
			<!-- info-box -->

			<div class="table-data">
				<div class="order">
					<h3>Form of New Participant</h3>
					<form class="New-C-form" action="Shearing_Link.php" method="POST">
						<label for="">Participant First Name</label>
						<input type="text" name="P_F_N">
						<br>
						<label for="">Participant Last Name</label>
						<input type="text" name="P_L_N">
						<br>
						<label for="">Amount To Pay</label>
						<input type="text" name="M_2_P">

						<input type="number" value="<?php echo $id_c;?>" name="c_id" style="display: none;">
						<br>
						<div class="adding-new-campaign" style="margin-right: 1%;">
							<button class="aadd_botton"  name="add_campaign">
								<i class='bx bx-plus'></i>
								<p>Involving To This Campaign</p>
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