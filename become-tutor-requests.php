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
//Fetch all students with pending approval
$studentQuery = "SELECT * FROM student WHERE isPendingApproval=1";
$studentResult = mysqli_query($db, $studentQuery);

$i = 1;
?>
<table>
<caption>Pending Approval for Tutor</caption>
<tr><th>#</th><th>Student ID</th><th>First Name</th><th>Last Name</th><th>UP Mail</th><th>Program</th><th>Year Level</th><th>Action</th></tr>
<?php
while($row = mysqli_fetch_array($studentResult)){
    $studentID = $row['student_id'];
    $studentFirstName = $row['first_name'];
    $studentLastName = $row['last_name'];
    $studentUPMail = $row['upmail'];
    $studentProgram = $row['program'];
    $studentYearLevel = $row['year_level'];
?>
    <tr><td><?=$i?></td><td><?=$studentID?></td><td><?=$studentFirstName?></td><td><?=$studentLastName?></td><td><?=$studentUPMail?></td><td><?=$studentProgram?></td><td><?=$studentYearLevel?></td>
    <td>
    <form action="become-tutor-requests.php" method="post">
        <input type="radio" name="acceptreject" value="Accept" checked="checked"/> Accept
        <input type="radio" name="acceptreject" value="Reject" /> Reject
        <button type="submit" value="<?=$studentID?>" name="pendingapproval">Confirm</button>
    </form>
    </td>
    </tr>
<?php
    $i++;
}
$i = 1;
?>
                    
            </div>
        </div>
    </div>

</section>

<script src="script.js"></script>
</body>
</html>
