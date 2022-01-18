<?php include("has-session-top.html"); include("server.php"); ?>

<?php
if(isset($_GET['subject'])){
    $subject = $_GET['subject'];
}
?>

<!--<p id="result">Available tutors for <strong><?=$subject?></strong>.</p>-->
<?php

//Find all tutors that teaches the given subject
$tutorQuery = "SELECT s.student_id, s.first_name, s.last_name, s.upmail, s.program, s.year_level
    FROM student s
    JOIN tutor_teaches tt
    ON s.student_id=tt.tutor_id
    JOIN subject su
    ON tt.subject_id=su.subject_id
    WHERE title='$subject'";
$tutorResult = mysqli_query($db, $tutorQuery);

include("tutee-sidebar.html");
//Get the student_id of the tutee
$tuteeQuery = "SELECT student_id FROM student WHERE upmail='$upmail'";  # Value of $upmail is already defined in tutee-sidebar.html
$tuteeResult = mysqli_query($db, $tuteeQuery);
$tuteeID = 0;
foreach($tuteeResult as $row){
    $tuteeID = $row['student_id'];
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
        <div class="overview-boxes">
            <div class="box">
                <div class="left-side">
                    <div class="box_topic">
<p id="result">Available tutors for <strong><?=$subject?></strong>.</p><br /><br />
<?php
$i = 1;
foreach($tutorResult as $row){
    $tutorID = $row['student_id'];
    $tutorUPMail = $row['upmail'];
    $tutorProgram = $row['program'];
    $tutorYearLevel = $row['year_level'];
?>
<div class="match">
        <p>
        <img src="images/user.png" width=150 alt="User" /><span><?=$row['first_name'] . " " . $row['last_name']?></span>
        </p>

        <ul>
            <li><?="<strong>UP Mail: </strong>" . $tutorUPMail?></li>
            <li><?="<strong>Program: </strong>" . $tutorProgram?></li>
            <li><?="<strong>Year Level: </strong>" . $tutorYearLevel?></li>
<?php 
    //List the available schedule(s) of each tutor
    $schedQuery = "SELECT at.available_time_id, at.date, at.start_time, at.end_time
        FROM available_time at
        JOIN tutor_available_time tat
        ON at.available_time_id=tat.available_time_id AND at.isBooked = 0
        JOIN student s
        ON s.student_id=tat.tutor_id
        WHERE s.upmail='$tutorUPMail'";
    $schedResult = mysqli_query($db, $schedQuery);
?>
            <li><?="<strong>Available Schedule: </strong>"?>
                <ul>
<?php
    if(mysqli_num_rows($schedResult) > 0) {
        foreach($schedResult as $schedRow){
            $availableTimeID = $schedRow['available_time_id'];
            $date = $schedRow['date'];
            $startTime = $schedRow['start_time'];
            $endTime = $schedRow['end_time'];
?>
                    <li><?="<strong>Date: </strong>" . $date . "<br />" . "<strong> From: </strong>" . date('h:i:s a', strtotime($startTime)) . "<strong> to </strong>" . date('h:i:s a', strtotime($endTime)) . " "?>
                    <form action="tutee-list-tutor.php" method="get"><button type="submit" name="book" value="<?=$tutorID . "," . $tuteeID . "," . $date . "," . $startTime . "," . $endTime . "," . $subject . "," . $availableTimeID?>">Book This Schedule</button></form>
                    </li>
<?php }
    } else{
?>
    <h4>Fully booked!</h4>
<?php
    }
}?>
                </ul>
            <li>
                <a href=<?="https://mail.google.com/mail/?view=cm&fs=1&to=" . $row['upmail'] . "&su=UP_Tacloban_Peer_Tutoring_Program&body=Hello!"?>>Contact</a>
            </li>
        </ul>
</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>

<script src="script.js"></script>

</body>
</html>
