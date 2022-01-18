<?php include("has-session-top.html"); include("server.php"); // if user is not logged in, they cannot access this page
if(empty($_SESSION['upmail'])){
    header('location: login.php');
}

$upmail = $_SESSION['upmail'];
// check if user is also a tutor
$isTutor = 0;
$query = "SELECT isTutor FROM student WHERE upmail='$upmail'";
$result = mysqli_query($db, $query);

foreach($result as $row){
    $isTutor = $row['isTutor'];
}

if(!$isTutor){ // If user is not a tutor, they cannot access this page
    header('location: tutee-index.php');
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
//Find all the tutors' pending booking requests
$query = "SELECT at.date, at.start_time, at.end_time, at.subject, at.student_id  
        FROM available_time at
        JOIN tutor_available_time tat
        ON at.available_time_id=tat.available_time_id
        JOIN student s 
        ON s.student_id=tat.tutor_id
        WHERE s.upmail='$upmail'";
$result = mysqli_query($db, $query);
$i = 1;
?>
 <!--Table here --->
<table>
<caption>Viewing all bookings</caption>
<tr><th>#</th><th>Tutee</th><th>Contact</th><th>Date</th><th>Start time</th><th>End time</th><th>Subject</th><th>Status</th></tr>
<?php
foreach($result as $bookingRow){
    $date = $bookingRow['date'];
    $start_time = $bookingRow['start_time'];
    $end_time = $bookingRow['end_time'];
    $student_id = $bookingRow['student_id'];
    $subject = $bookingRow['subject'];

    //Get the student_id name
    $studentNameQuery = "SELECT first_name, last_name, upmail FROM student WHERE student_id='$student_id'";
    $studentNameResult = mysqli_query($db, $studentNameQuery);
    $studentName = "";
    $studentUPMail = "";
    foreach($studentNameResult as $row){
        $studentName = $row['first_name'] . " " . $row['last_name'];;
        $studentUPMail = $row['upmail'];
    }
?>
    <tr><td><?=$i?></td><td><?=$studentName?></td><td><a href="gmail.com"><?=$studentUPMail?></a></td><td><?=$date?></td><td><?=$start_time?></td><td><?=$end_time?></td><td><?=$subject?></td>
    <td>
    <form action="tutor-my-bookings.php" method="post">
        <select name="status">
            <option>Ongoing</option>
            <option>Completed</option>
        </select>
        <button type="submit" value="confirm" name="confirmstatus">Confirm</button>
    </form>
    </td>
    </tr>
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
