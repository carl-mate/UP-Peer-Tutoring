<?php include("has-session-top.html"); include("server.php"); 
// if user is not logged in, they cannot access this page
if(empty($_SESSION['upmail'])){
    header('location: login.php');
}

$query = "SELECT tutee_id, first_name, last_name, program FROM tutee WHERE upmail='" . $_SESSION['upmail'] . "'";
$result = mysqli_query($db, $query);

$tutee_id = 0;
$first_name = "";
$last_name = "";
foreach($result as $row){
    $tutee_id = $row['tutee_id'];
    $first_name = $row['first_name'];
    $last_name = $row['last_name'];
}
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
                    <p id="result"><strong><?=$first_name . " " . $last_name . "'s "?></strong>sessions.</p><br /><br />

<?php

//Find all sessions of the tutee  
$sessionQuery = "SELECT * FROM tutorial_session WHERE tutee_id=$tutee_id";
$sessionResult = mysqli_query($db, $sessionQuery);

foreach($sessionResult as $sessionResultRow){
    $tutor_id = $sessionResultRow['tutor_id'];
    $tutorNameQuery = "SELECT first_name, last_name
        FROM tutor 
        WHERE tutor_id=$tutor_id";
    $tutorNameResult = mysqli_query($db, $tutorNameQuery);


    foreach($tutorNameResult as $tutorNameRow){
?>
<div class="match">
        <p>
        <img src="images/user.png" width=150 alt="User" /><span><?=$tutorNameRow['first_name'] . " " . $tutorNameRow['last_name']?></span>
        </p>

        <ul>
            <li><?="<strong>Date: </strong>" . $sessionResultRow['date']?></li>
            <li><?="<strong>Start time: </strong>" . date('h:i:s a', strtotime($sessionResultRow['start_time']))?></li>
            <li><?="<strong>End time: </strong>" . date('h:i:s a', strtotime($sessionResultRow['end_time']))?></li>
            <li><?="<strong>Subject: </strong>" . $sessionResultRow['subject']?></li>
        </ul>
</div>
<?php }
} ?>                    </div>
                </div>
            </div>
        </div>
    </div>

</section>

<script src="script.js"></script>
</body>
</html>





