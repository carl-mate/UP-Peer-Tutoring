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
<div class="content">
      <h1 id="log">Add Available Time</h1>
      <form action="tutor-add-available-time.php" method="post">
        <?php include('errors.php'); ?>
        <div class="text_field">
            <label>Date</label>
            <input type="date" name="date" required />
        </div>
        <div class="text_field">
            <label>Start time</label>
            <input type="time" name="starttime" required />
        </div>
        <div class="text_field">
            <label>End time</label>
            <input type="time" name="endtime" required />
        </div>
        <input type="submit" value="Add" name="tutoraddavailabletime" /> 
      </form>
</div>
            </div>
        </div>
    </div>

</section>

<script src="script.js"></script>
</body>
</html>
