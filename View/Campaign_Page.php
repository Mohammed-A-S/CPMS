<?php
error_reporting(0);
session_start();
$user_email = $_SESSION['userEmail'];
$c_id = $_SESSION['CamPAGE'];


include '../inc/conn.php';

	$show_campaigns = "SELECT * FROM campaigns WHERE ID = '$c_id'";
    $show_campaigns_query = mysqli_query($conn, $show_campaigns);

    if($show_campaigns_query)
    {
		$row9 = mysqli_fetch_array($show_campaigns_query);
        $ID = $row9['ID'];
        $C_F = $row9['C_FOUNDER'];
        $C_N = $row9['C_NAME'];
        $A_R = $row9['A_REQUIRED'];
        $A_RC = $row9['A_RECORDED'];
        $A_P = $row9['A_PAID'];
        $C_S = $row9['C_STATUS'];
        $C_M = $row9['C_MESSAGE'];
	}

if(isset($_GET['page']))
{
    $_SESSION['CamPAGE'] = $_GET['page'];
	$c_id = $_SESSION['CamPAGE'];
    $show_campaigns = "SELECT * FROM campaigns WHERE ID = '$c_id'";
    $show_campaigns_query = mysqli_query($conn, $show_campaigns);

    if($show_campaigns_query)
    {
		//--------------------------------------------------------
		$show_participants = "SELECT * FROM participants WHERE C_ID = '$c_id'";
		$show_participants_query = mysqli_query($conn, $show_participants);
    }
}

	$show_participantss = "SELECT * FROM participants WHERE C_ID = '$c_id'";
    $show_participantss_query = mysqli_query($conn, $show_participantss); //it used in the while loop
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
	<!-- jQuery -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

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
					<h1><?php echo $C_N;?> Campaign</h1> 
				</div>
				<a href="Shearing_Link.php?share= <?php echo $c_id;?>" class="btn-download">
					<i class='bx bxs-share'></i>
					<span class="text">SHARE LINK</span>
				</a>
			</div>

			<!-- info-box -->
			<?php include "../Config/info_box-config.php";?>
			<!-- info-box -->


			<div class="table-data">
				<div class="order">
					<h3>All Campaigns</h3>
					<table>
						<thead>
							<tr>
								<th><i class='bx bx-transfer-alt bx-rotate-270' ></i></i>Participant Name</th>
								<th><i class='bx bx-transfer-alt bx-rotate-270' ></i></i>Paid Amount</th>
								<th><i class='bx bx-transfer-alt bx-rotate-270' ></i></i>Status</th>
								<th><i class='bx bx-transfer-alt bx-rotate-270' ></i></i>Options</th>
							</tr>
						</thead>
						<tbody>
							<?php while ($row2 = mysqli_fetch_array($show_participantss_query)):?>
							<tr>
								<td style="color: #3C91E6; font-weight: bolder"><?php echo $row2['F_NAME'] . "  " . $row2['L_NAME'];?></td>
								<td style="font-weight:bolder;"><?php echo $row2['M_TO_PAY'];?></td>
								<td style="font-weight:bolder;"><?php echo $row2['P_STATUS'];?></td>
								<td class="status_of_paid">
									<?php //if($C_S == "Not Paid"): ?>
									<a href="../inc/update_paid.php?Paid_check= <?php echo $row2["ID"];?>" class="paid_button" id="paid" name="Paid_check"><p>Paid</p></a>
									<?php //else:?>
									<a href="../inc/update_paid.php?Not_Paid_Check= <?php echo $row2["ID"];?>" class="not_paid_button" id="not_paid" name="Not_Paid_Check"><p>Not Paid</p></a>
									<?php //endif;?>						
								</td>
							</tr>
							<?php endwhile; ?>
						</tbody>
					</table>
					<br><br>
					<a href="../inc/update_paid.php?cancle= <?php echo $c_id;?>" class="cancle-campaign">
						<button class="cancle_botton"  name="cancle_campaign">
							<i class='bx bx-plus'></i>
							<p> Cancle The Campaign</p>
						</button>
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