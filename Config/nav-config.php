<nav>
    <i class='bx bx-border-left' style="color: white; font-size: 30px;"></i>
    <a href="#" class="Proflie">
        <i class='bx bxs-user-circle' style="font-size: 40px; top: 0px; left: -50px; position: absolute;"></i>
        <span>
            <?php
                //print the username in the up of the page
                $user_email = $_SESSION['userEmail'];
                
                $sql = "SELECT * FROM users WHERE EMAIL='$user_email'";
                $query = mysqli_query($conn, $sql);
                
                $fetch = mysqli_fetch_assoc($query);
                echo $fetch['F_NAME'];
            ?>
        </span> 
    </a>
</nav>