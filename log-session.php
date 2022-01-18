<?php include("has-session-top.html"); include("server.php"); 
// if user is not logged in, they cannot access this page
if(empty($_SESSION['upmail'])){
    header('location: login.php');
}

$programQuery = "SELECT program FROM tutee WHERE upmail='" . $_SESSION['upmail'] . "'";
$programResult = mysqli_query($db, $programQuery);

$program = "";
foreach($programResult as $row){
    $program = $row['program'];
}

$titleArray = array();
$titleQuery = "SELECT title FROM subject WHERE program='$program'";
$titleResult = mysqli_query($db, $titleQuery);
$emails = "SELECT * FROM tutor";
$emailResult = mysqli_query($db, $emails);

foreach($titleResult as $row){
    $titleArray[] = $row['title'];
}
?>

<div class="sidebar">
    <div class="logo-details">
        <img src="images/tutor.png" alt="banner logo" />
        <span class="logo_name">UP Peer Tutoring</span>
    </div>
    <ul class="nav-links">
        <li>
            <a href="index.php">
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
      <h1 id="log">Log Session</h1>
      <form action="log-session.php" method="post">
        <?php include('errors.php'); ?>

        <div class="text_field">
            <label>Tutor's UP Mail</label>
            <input type="email" name="upmail" required />
        </div>
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

        <div class="select_field">
            <label>Subject</label>
            <select name="subject">
            <option selected="selected"><?=$titleArray[0]?></option>
<?php
for($i = 1; $i < count($titleArray); $i++) {
?>
    <option><?=$titleArray[$i]?></option>
<?php } ?>
    </select>
        </div>
        <input type="submit" value="Log Session" name="logsession" /> 
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

