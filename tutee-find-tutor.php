<?php include("has-session-top.html"); include("server.php"); 
// if user is not logged in, they cannot access this page
if(empty($_SESSION['upmail'])){
    header('location: login.php');
}

include("tutee-sidebar.html");

$studentQuery = "SELECT first_name, last_name, program FROM student WHERE upmail='$upmail'";
$studentResult = mysqli_query($db, $studentQuery);

$first_name = "";
$last_name = "";
foreach($studentResult as $row){
    $first_name = $row['first_name'];
    $last_name = $row['last_name'];
}
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
    <p class="big-paragraph">Hello, <strong><?=$first_name . " " . $last_name?></strong>. What subject do you need help with?</p>
<?php

$program = "";
foreach($studentResult as $row){
    $program = $row['program'];
}

$titleArray = array();
$titleQuery = "SELECT title FROM subject WHERE program='$program'";
$titleResult = mysqli_query($db, $titleQuery);

foreach($titleResult as $row){
    $titleArray[] = $row['title'];
}
?>

<form action="tutee-list-tutor.php" method="get">
    <div class="select_field">
    <select name="subject">
    <option selected="selected"><?=$titleArray[0]?></option>
<?php
for($i = 1; $i < count($titleArray); $i++) {
?>
    <option><?=$titleArray[$i]?></option>
<?php } ?>
    </select>
    </div>
        <input type="submit" value="Find Tutor" name="find" />
    </div>

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

