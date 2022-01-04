<?php include("top.html"); include("server.php"); 
// if user is not logged in, they cannot access this page
    if(empty($_SESSION['upmail'])){
        header('location: login.php');
    }

$query = "SELECT first_name, last_name, program FROM tutee WHERE upmail='" . $_SESSION['upmail'] . "'";
$result = mysqli_query($db, $query);

$first_name = "";
$last_name = "";
foreach($result as $row){
    $first_name = $row['first_name'];
    $last_name = $row['last_name'];
}

?>
<h1>Find and connect with a tutor!</h1>


<div class="sidebar">
    <div class="logo-details">
        <i class='bx bx-book-open'></i>
        <span class="logo_name">UP Peer Tutoring</span>
    </div>
    <ul class="nav-links">
        <li>
            <a href="#">
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
                    <div class="content">
    <p class="big-paragraph">Hello, <strong><?=$first_name . " " . $last_name?></strong>. What subject do you need help with?</p>
<?php

$program = "";
foreach($result as $row){
    $program = $row['program'];
}

$titleArray = array();
$titleQuery = "SELECT title FROM subject WHERE program='$program'";
$titleResult = mysqli_query($db, $titleQuery);

foreach($titleResult as $row){
    $titleArray[] = $row['title'];
}
?>

<form action="list-tutor.php" method="get">
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

