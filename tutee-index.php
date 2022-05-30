<?php include("has-session-top.html"); include("server.php"); // if user is not logged in, they cannot access this page
if(empty($_SESSION['upmail'])){
    header('location: login.php');
}

include("tutee-sidebar.html");
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
                    <div class="box_topic">Booked Sessions</div>
                    <div class="number">
<?php
//Get the student_id of the tutee
$tuteeQuery = "SELECT student_id FROM student WHERE upmail='$upmail'";  # Value of $upmail is already defined in tutee-sidebar.html
$tuteeResult = mysqli_query($db, $tuteeQuery);
$tuteeID = 0;

foreach($tuteeResult as $row){
    $tuteeID = $row['student_id'];
}

//Fetch the count of the tutee's previous tutorial sessions 
$sessionsQuery = "SELECT count(*) as numOfTutorialSessions FROM tutorial_session WHERE tutee_id=$tuteeID";
$sessionsResult = mysqli_query($db, $sessionsQuery);

$numOfTutorialSessions = 0;

while($row = mysqli_fetch_array($sessionsResult)){
    $numOfTutorialSessions = $row['numOfTutorialSessions'];
}
?>
                    <?=$numOfTutorialSessions?>

                    </div>
                </div>
                <i class='bx bx-list-ul icon' ></i>
            </div>
        </div>
<?php
$query = "SELECT * from news";
$result = mysqli_query($db, $query);

while($row = mysqli_fetch_array($result)){
    $title = $row['title'];
    $body = $row['body'];
    $forTutee = $row['forTutee'];

    // display the news if it is visible to tutor
    if($forTutee == '1'){
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
