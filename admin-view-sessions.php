<?php include("has-session-top.html"); include("server.php");

// if user is not logged in, they cannot access this page
if(empty($_SESSION['adminEmail'])){
    header('location: admin-login.php');
}

include("admin-sidebar.html");
?>

<section class="home-section">
    <nav>
        <div class="sidebar-button">
           <i class='bx bx-menu sidebarBtn' ></i> 
            <span class="dashboard">Dashboard</span>
        </div>
        <div class="profile-details">
            <img src="images/user.png" alt="">
            <span class="user">Admin</span>
           <!--<i class='bx bx-chevron-down' ></i>--> 
        </div>
    </nav>

    <div class="home-content">
        <div class="overview-boxes">
            <div class="box">
                <div class="left-side">
                    <div class="box_topic">
<?php
//Fetch all tutorial_session
$query = "SELECT * FROM tutorial_session";
$result = mysqli_query($db, $query);

$tutor_id = 0;
$tutee_id = 0;
$i = 1;
?>
 <!--Table here --->
<table>
<caption>Viewing all sessions</caption>
<tr><th>#</th><th>Tutor ID</th><th>Tutor</th><th>Tutee ID</th><th>Tutee</th><th>Date</th><th>Start time</th><th>End time</th><th>Subject</th><th>Status</th></tr>
<?php
foreach($result as $sessionRow){
    $tutorID = $sessionRow['tutor_id'];
    $tuteeID = $sessionRow['tutee_id'];
    $date = $sessionRow['date'];
    $startTime = $sessionRow['start_time'];
    $endTime = $sessionRow['end_time'];
    $subject = $sessionRow['subject'];
    $status = $sessionRow['status'];

    //Get the tutor_id name
    $tutorNameQuery = "SELECT first_name, last_name FROM student WHERE student_id='$tutorID'";
    $tutorNameResult = mysqli_query($db, $tutorNameQuery);
    $tutorName = "";
    foreach($tutorNameResult as $row){
        $tutorName = $row['first_name'] . " " . $row['last_name'];
    }
    //Get the tutee_id name
    $tuteeNameQuery = "SELECT first_name, last_name FROM student WHERE student_id='$tuteeID'";
    $tuteeNameResult = mysqli_query($db, $tuteeNameQuery);
    $tuteeName= "";
    foreach($tuteeNameResult as $row){
        $tuteeName = $row['first_name'] . " " . $row['last_name'];;
    }
?>
    <tr><td><?=$i?></td><td><?=$tutorID?></td><td><?=$tutorName?></td><td><?=$tuteeID?></td><td><?=$tuteeName?></td><td><?=$date?></td><td><?=$startTime?></td><td><?=$endTime?></td><td><?=$subject?></td><td><?=$status?></td></tr>
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

