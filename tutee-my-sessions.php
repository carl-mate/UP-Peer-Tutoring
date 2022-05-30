<?php include("has-session-top.html"); include("server.php"); 
// if user is not logged in, they cannot access this page
if(empty($_SESSION['upmail'])){
    header('location: login.php');
}

include("tutee-sidebar.html");
//Get the student_id, first_name, last_name, and program of the tutee
$tuteeQuery = "SELECT student_id, first_name, last_name, program FROM student WHERE upmail='$upmail'";  # Value of $upmail is already defined in tutee-sidebar.html
$tuteeResult = mysqli_query($db, $tuteeQuery);
$tuteeID = 0;
$firstName = "";
$lastName = "";
foreach($tuteeResult as $row){
    $tuteeID = $row['student_id'];
    $firstName = $row['first_name'];
    $lastName = $row['last_name'];
}
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
        <div class="big-boxes">
            <div class="box">
<?php
//Find all sessions of the tutee  
$sessionQuery = "SELECT * FROM tutorial_session WHERE tutee_id=$tuteeID";
$sessionResult = mysqli_query($db, $sessionQuery);
$i = 1;
?>
 <!--Table here --->
<table>
<caption><strong><?=$firstName . " " . $lastName . "'s "?></strong>sessions.</caption>
<tr><th>#</th><th>Tutor</th><th>Date</th><th>Start time</th><th>End time</th><th>Subject</th><th>Status</th></tr>
<?php
foreach($sessionResult as $sessionResultRow){
    $tutorID = $sessionResultRow['tutor_id'];
    $date = $sessionResultRow['date'];
    $startTime = $sessionResultRow['start_time'];
    $endTime = $sessionResultRow['end_time'];
    $subject = $sessionResultRow['subject'];
    $status = $sessionResultRow['status'];

    //Get the tutor's name
    $tutorNameQuery = "SELECT first_name, last_name
        FROM student 
        WHERE student_id=$tutorID";
    $tutorNameResult = mysqli_query($db, $tutorNameQuery);
    foreach($tutorNameResult as $tutorNameRow){
        $tutorFirstName = $tutorNameRow['first_name'];
        $tutorLastName = $tutorNameRow['last_name'];
?>
    <tr><td><?=$i?></td><td><?=$tutorFirstName . " " . $tutorLastName?></td><td><?=$date?></td><td><?=date('h:i:s a', strtotime($startTime))?></td><td><?=date('h:i:s a', strtotime($endTime))?></td><td><?=$subject?></td><td><?=$status?></td></tr>
<?php
       $i++;
    }
} ?>    
</table>
            </div>
        </div>
    </div>

</section>

<script src="script.js"></script>
</body>
</html>





