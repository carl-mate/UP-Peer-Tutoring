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
<?php if(isset($_SESSION['success'])): ?>
                <div class="error success">
                    <h4>
<?php 
echo $_SESSION['success'];
unset($_SESSION['success']);
?>
                    </h4>
                </div>
            <?php endif ?>
            <div class="box">
                <div class="left-side">
                    <div class="box_topic">My Bookings</div>
                    <div class="number">
<?php
//Find the count of all the tutor's bookings 
$query = "SELECT count(*) as numOfBookings  
        FROM available_time at
        JOIN tutor_available_time tat
        ON at.available_time_id=tat.available_time_id AND at.isBooked=1
        JOIN student s 
        ON s.student_id=tat.tutor_id
        WHERE s.upmail='$upmail'";
$result = mysqli_query($db, $query);

$numOfBookings = 0;

while($row = mysqli_fetch_array($result)){
    $numOfBookings = $row['numOfBookings'];
}

?>
                    <?=$numOfBookings?>
                    </div>
                </div>
                <i class='bx bx-list-ul icon' ></i>
            </div>

            <div class="box">
                <div class="left-side">
                    <div class="box_topic">My Schedules</div>
                    <div class="number">
<?php
//Find the count of all the tutor's available schedules 
$query = "SELECT count(*) as numOfSchedules
        FROM available_time at
        JOIN tutor_available_time tat
        ON at.available_time_id=tat.available_time_id
        JOIN student s 
        ON s.student_id=tat.tutor_id
        WHERE s.upmail='$upmail'";
$result = mysqli_query($db, $query);

$numOfSchedules = 0;

while($row = mysqli_fetch_array($result)){
    $numOfSchedules = $row['numOfSchedules'];
}

?>
                    <?=$numOfSchedules?>
                    </div>
                </div>
                <i class='bx bx-calendar-alt icon' ></i>
            </div>

            <div class="box">
                <div class="left-side">
                    <div class="box_topic">My Subjects</div>
                    <div class="number">
<?php
//Find the count of all the tutor's subjects 
$query = "SELECT count(*) as numOfSubjects 
    FROM subject s 
    JOIN tutor_teaches tt 
    ON s.subject_id=tt.subject_id 
    JOIN student st 
    ON st.student_id=tt.tutor_id 
    WHERE upmail='$upmail'";
$result = mysqli_query($db, $query);

$numOfSubjects = 0;

while($row = mysqli_fetch_array($result)){
    $numOfSubjects = $row['numOfSubjects'];
}

?>
                    <?=$numOfSubjects?>
                    </div>
                </div>
                <i class='bx bx-layer icon' ></i>
            </div>
        </div>
 <?php
$query = "SELECT * from news";
$result = mysqli_query($db, $query);

while($row = mysqli_fetch_array($result)){
    $title = $row['title'];
    $body = $row['body'];
    $forTutor = $row['forTutor'];

    // display the news if it is visible to tutor
    if($forTutor == '1'){
?>       
        <div class="big-boxes">
            <div class="news box">
               <div class="title"><?=$title?></div>
               <div class="body"><?=$body?></div>
            </div>
        </div>
<?php } 
} ?>

    </div>

</section>

<script src="script.js"></script>
</body>
</html>
