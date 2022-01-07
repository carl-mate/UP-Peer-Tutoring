<?php include("has-session-top.html"); include("server.php");

// if user is not logged in, they cannot access this page
if(empty($_SESSION['adminEmail'])){
    header('location: admin-login.php');
}
?>
<div class="sidebar">
    <div class="logo-details">
        <img src="images/tutor.png" alt="banner logo" />
        <span class="logo_name">UP Peer Tutoring</span>
    </div>
    <ul class="nav-links">
        <li>
            <a href="admin-index.php">
                <i class='bx bx-grid-alt' ></i>
                <span class="link_name">Dashboard</span>
            </a>
        </li>
        <li>
            <a href="view-sessions.php">
                <i class='bx bx-notepad' ></i>
                <span class="link_name">View Sessions</span>
            </a>
        </li>
        <li>
            <a href="view-accounts.php">
                <i class='bx bx-group' ></i>
                <span class="link_name">View Accounts</span>
            </a>
        </li>
        <li>
            <a href="view-subjects.php">
                <i class='bx bx-layer' ></i>
                <span class="link_name">View Subjects</span>
            </a>
        </li>
        <li>
            <a href="add-subjects.php">
                <i class='bx bx-layer-plus' ></i>
                <span class="link_name">Add Subjects</span>
            </a>
        </li>
        <li>
            <a href="admin-index.php?admin-logout='1'">
                <i class='bx bx-log-out' ></i>
                <span class="link_name">Logout</span>
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
//Fetch all tutees
$tuteeQuery = "SELECT * FROM tutee";
$tuteeResult = mysqli_query($db, $tuteeQuery);

//Fetch all tutors
$tutorQuery = "SELECT * FROM tutor";
$tutorResult = mysqli_query($db, $tutorQuery);

$i = 1;
?>
<table>
<caption>Tutees</caption>
<tr><th>#</th><th>First Name</th><th>Last Name</th><th>UP Mail</th><th>Program</th><th>Year Level</th></tr>
<?php
while($row = mysqli_fetch_array($tuteeResult)){
?>
    <tr><td><?=$i?></td><td><?=$row['first_name']?></td><td><?=$row['last_name']?></td><td><?=$row['upmail']?></td><td><?=$row['program']?></td><td><?=$row['year_level']?></td><td></tr>
<?php
    $i++;
}
$i = 1;
?>
</table>

<table>
<caption>Tutors</caption>
<tr><th>#</th><th>First Name</th><th>Last Name</th><th>UP Mail</th><th>Program</th><th>Year Level</th></tr>
<?php
while($row = mysqli_fetch_array($tutorResult)){
?>
    <tr><td><?=$i?></td><td><?=$row['first_name']?></td><td><?=$row['last_name']?></td><td><?=$row['upmail']?></td><td><?=$row['program']?></td><td><?=$row['year_level']?></td></tr>
<?php
    $i++;
}
?>
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
