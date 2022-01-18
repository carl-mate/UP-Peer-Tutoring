<?php include("has-session-top.html"); include("server.php"); // if user is not logged in, they cannot access this page
if(empty($_SESSION['upmail'])){
    header('location: login.php');
}



include("tutor-sidebar.html");
?>

<section class="home-section">
    <nav>
        <div class="sidebar-button">
           <i class='bx bx-menu sidebarBtn' ></i> 
            <span class="dashboard">Dashboard</span>
        </div>
        <div class="profile-details">
            <img src="images/user.png" alt="">
            <span class="user"><?=$_SESSION['upmail']?></span>
           <!--<i class='bx bx-chevron-down' ></i>--> 
        </div>
    </nav>

    <div class="home-content">
        <div class="overview-boxes">
            <div class="box">
                <div class="left-side">
                    <div class="box_topic">
<?php
$schedQuery = "SELECT date, start_time, end_time
        FROM available_time at
        JOIN tutor_available_time tat
        ON at.available_time_id=tat.available_time_id
        JOIN student s 
        ON s.student_id=tat.tutor_id
        WHERE s.upmail='$upmail'";
$schedResult = mysqli_query($db, $schedQuery);

$i = 1;
?>
 <!--Table here --->
<table>
<caption>Viewing all Available Time</caption>
<tr><th>#</th><th>Date</th><th>Start time</th><th>End time</th></tr>
<?php
foreach($schedResult as $row){
    $date = $row['date'];
    $start_time = $row['start_time'];
    $end_time = $row['end_time'];
?>
 <tr><td><?=$i?></td><td><?=$date?></td><td><?=$start_time?></td><td><?=$end_time?></td></tr>
<?php 
    $i++;
} ?>
    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>

<script src="script.js"></script>
</body>
</html>
