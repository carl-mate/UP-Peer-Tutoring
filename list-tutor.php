<?php include("has-session-top.html"); include("server.php"); ?>

<?php
if(isset($_GET['subject'])){
    $subject = $_GET['subject'];
}
?>

<!--<p id="result">Available tutors for <strong><?=$subject?></strong>.</p>-->
<?php

//Find all tutors that teaches the given subject
$query = "SELECT t.tutor_id, t.first_name, t.last_name, t.upmail, t.program, t.year_level
    FROM tutor t
    JOIN tutor_teaches tt
    ON t.tutor_id=tt.tutor_id
    JOIN subject s
    ON tt.subject_id=s.subject_id
    WHERE title='$subject'";
$result = mysqli_query($db, $query);
?>

<div class="sidebar">
    <div class="logo-details">
        <img src="images/tutor.png" alt="banner logo" />
        <span class="logo_name">UP Peer Tutoring</span>
    </div>
    <ul class="nav-links">
        <li>
            <a href="index.php">
                <i class='bx bx-grid-alt' ></i>
                <span class="link_name">Dashboard</span>
            </a>
        </li>
        <li>
            <a href="find-tutor.php">
                <i class='bx bx-user-circle' ></i>
                <span class="link_name">Find Tutor</span>
            </a>
        </li>
        <li>
            <a href="log-session.php">
                <i class='bx bx-pencil' ></i>
                <span class="link_name">Log Session</span>
            </a>
        </li>
        <li>
            <a href="my-sessions.php">
                <i class='bx bx-list-ul' ></i>
                <span class="link_name">My Sessions</span>
            </a>
        </li>
        <li>
            <a href="index.php?logout='1'">
                <i class='bx bx-log-out' ></i>
                <span class="link_name">Log out</span>
            </a>
        </li>
    </ul>
</div>

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
foreach($result as $row){
?>
<div class="match">
        <p>
        <img src="images/user.png" width=150 alt="User" /><span><?=$row['first_name'] . " " . $row['last_name']?></span>
        </p>

        <ul>
            <li><?="<strong>UP Mail: </strong>" . $row['upmail']?></li>
            <li><?="<strong>Program: </strong>" . $row['program']?></li>
            <li><?="<strong>Year Level: </strong>" . $row['year_level']?></li>

<?php 
    //List the available schedule(s) of each tutor
    $tutor_id = $row['tutor_id'];
    $schedQuery = "SELECT date, start_time, end_time
        FROM available_time at
        JOIN tutor_available_time tat
        ON at.available_time_id=tat.available_time_id
        JOIN tutor t
        ON t.tutor_id=tat.tutor_id
        WHERE t.tutor_id=$tutor_id";
    $schedResult = mysqli_query($db, $schedQuery);
?>
            <li><?="<strong>Available Schedule: </strong>"?>
                <ul>
<?php
    foreach($schedResult as $schedRow){
?>
                    <li><?="<strong>Date: </strong>" . $schedRow['date'] . "<strong> From: </strong>" . date('h:i:s a', strtotime($schedRow['start_time'])) . "<strong> to </strong>" . date('h:i:s a', strtotime($schedRow['end_time']))?></li>
<?php } ?>
                </ul>

            <li>
                <a href=<?="https://mail.google.com/mail/?view=cm&fs=1&to=" . $row['upmail'] . "&su=UP_Tacloban_Peer_Tutoring_Program&body=Hello!"?>>Contact</a>
            </li>
        </ul>
</div>
<?php } ?>                    </div>
                </div>
            </div>
        </div>
    </div>

</section>

<script src="script.js"></script>

</body>
</html>



