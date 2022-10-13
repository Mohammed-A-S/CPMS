<?php
$a_record = "SELECT * FROM campaigns WHERE ID = '$c_id'";
$a_record_query = mysqli_query($conn, $a_record);
$a_record_fetch = mysqli_fetch_array($a_record_query);
$PAID = $a_record_fetch['A_PAID'];
$TOTAL = $a_record_fetch['A_REQUIRED'];

//for showing the number of rows that have the same condition
$a_participants = "SELECT * FROM participants WHERE C_ID = '$c_id'";
$a_participants_query = mysqli_query($conn, $a_participants);
$a_participants_fetch = mysqli_fetch_array($a_participants_query);
$num_participants = mysqli_num_rows($a_participants_query);

//for calculate in Percentage
$count1 = $PAID / $TOTAL;
$count2 = $count1 * 100;
$count = number_format($count2, 1);

//for show how much remaining from the main amount
$remain = $TOTAL - $PAID;
?>
<ul class="box-info">
    <li>
        <i class='bx bxs-calendar-check' style="font-size: 70px; color: #4adbdb;"></i>
        <span class="text">
            <h3><?php echo $remain;?> Left of <?php echo $row9['A_REQUIRED'];?></h3>
            <div class="progress">
                <div class="progress-bar" style="width: <?php echo $count;?>%;">
                    <p><?php echo $count;?>%</p>
                </div>
            </div>
        </span>
    </li>
    <li>
        <i class='bx bxs-group' style="font-size: 70px; color: #4adbdb"></i>
        <span class="text">
            <h3>Participants</h3>
            <h2><?php echo $num_participants;?></h2>
        </span>
    </li>
    <li>
        <i class='bx bx-dollar-circle' style="font-size: 70px; color: #4adbdb"></i>
        <span class="text">
            <h3>Record Amount</h3>
            <h2><?php echo $row9['A_RECORDED'];?>SR</h2>
        </span>
    </li>
    <li>
        <i class='bx bxs-dollar-circle' style="font-size: 70px; color: #4adbdb"></i>
        <span class="text">
            <h3>Paid Amount</h3>
            <h2><?php echo $row9['A_PAID'];?>SR</h2>
        </span>
    </li>
</ul>
