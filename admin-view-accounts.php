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
        <div class="big-boxes">
            <div class="box">
<?php
//Fetch all tutee
$tuteeQuery = "SELECT * FROM student WHERE isTutor=0 OR isTutor=1";
$tuteeResult = mysqli_query($db, $tuteeQuery);

//Fetch all tutors
$tutorQuery = "SELECT * FROM student WHERE isTutor=1";
$tutorResult = mysqli_query($db, $tutorQuery);
$i = 1;
?>
<table>
<caption>Tutees</caption>
<tr><th>#</th><th>Student ID</th><th>First Name</th><th>Last Name</th><th>UP Mail</th><th>Program</th><th>Year Level</th></tr>
<?php
while($row = mysqli_fetch_array($tuteeResult)){
    $tuteeID = $row['student_id'];
    $tuteeFirstName = $row['first_name'];
    $tuteeLastName = $row['last_name'];
    $tuteeUPMail = $row['upmail'];
    $tuteeProgram = $row['program'];
    $tuteeYearLevel = $row['year_level'];
?>
    <tr><td><?=$i?></td><td><?=$tuteeID?></td><td><?=$tuteeFirstName?></td><td><?=$tuteeLastName?></td><td><?=$tuteeUPMail?></td><td><?=$tuteeProgram?></td><td><?=$tuteeYearLevel?></td></tr>
<?php
    $i++;
}
$i = 1;
?>
</table>

<table>
<caption>Tutors</caption>
<tr><th>#</th><th>Student ID</th><th>First Name</th><th>Last Name</th><th>UP Mail</th><th>Program</th><th>Year Level</th></tr>
<?php
while($row = mysqli_fetch_array($tutorResult)){
    $tutorID = $row['student_id'];
    $tutorFirstName = $row['first_name'];
    $tutorLastName = $row['last_name'];
    $tutorUPMail = $row['upmail'];
    $tutorProgram = $row['program'];
    $tutorYearLevel = $row['year_level'];
?>
    <tr><td><?=$i?></td><td><?=$tutorID?></td><td><?=$tutorFirstName?></td><td><?=$tutorLastName?></td><td><?=$tutorUPMail?></td><td><?=$tutorProgram?></td><td><?=$tutorYearLevel?></td></tr>
<?php
    $i++;
}
?>
</table>
            </div>
        </div>
    </div>

</section>

<script src="script.js"></script>

</body>
</html>
