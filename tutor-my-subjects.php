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
        <div class="big-boxes">
            <div class="box">
<?php
//Fetch all subjects that the tutor teaches 
$subjectQuery = "SELECT title 
    FROM subject s 
    JOIN tutor_teaches tt 
    ON s.subject_id=tt.subject_id 
    JOIN student st 
    ON st.student_id=tt.tutor_id 
    WHERE upmail='$upmail'";
$subjectResult = mysqli_query($db, $subjectQuery);
$i = 1;
?>
 <!--Table here --->
<table>
<caption>Viewing all subjects</caption>
<tr><th>#</th><th>Title</th></tr>
<?php 
while($row = mysqli_fetch_array($subjectResult)){
?>
    <tr><td><?=$i?></td><td><?=$row['title']?></td></tr>
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
