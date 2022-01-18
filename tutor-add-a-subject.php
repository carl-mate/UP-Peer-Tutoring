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

$programQuery = "SELECT first_name, last_name, program FROM student WHERE upmail='" . $_SESSION['upmail'] . "'";
$programResult = mysqli_query($db, $programQuery);

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
            <div class="box">
                <div class="left-side">
                    <div class="box_topic">
<div class="content">
      <h1 id="signup">Add Subject</h1>
      <form action="tutor-add-a-subject.php" method="post">
        <?php include('errors.php'); ?>
        <div class="select_field">
            <label>Subjects Available to Your Program</label>
<?php
$program = "";
foreach($programResult as $row){
    $program = $row['program'];
}

$titleArray = array();
$titleQuery = "SELECT title FROM subject WHERE program='$program'";
$titleResult = mysqli_query($db, $titleQuery);

foreach($titleResult as $row){
    $titleArray[] = $row['title'];
}
?>
            <select name="title">
            <option selected="selected"><?=$titleArray[0]?></option>
<?php
for($i = 1; $i < count($titleArray); $i++) {
?>
    <option><?=$titleArray[$i]?></option>
<?php } ?>
        </select>
        </div>
        <input type="submit" value="Add" name="tutoraddsubject" />
      </form>
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
