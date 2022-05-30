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
                    <div class="box_topic">Pending Requests</div>
                    <div class="number">
<?php
//Fetch the count of all students with pending approval (i.e., tutor applicants)
$studentQuery = "SELECT count(*) as numOfPendingRequests FROM student WHERE isPendingApproval=1";
$studentResult = mysqli_query($db, $studentQuery);

$numOfPendingRequests = 0;

while($row = mysqli_fetch_array($studentResult)){
    $numOfPendingRequests = $row['numOfPendingRequests'];
}
?>
                    <?=$numOfPendingRequests?>
                    </div>
                </div>
                    <i class='bx bx-alarm-exclamation icon'></i>
            </div>

            <div class="box">
                <div class="left-side">
                    <div class="box_topic">Tutorial Sessions</div>
                    <div class="number">
<?php
//Fetch the count of all tutorial sessions 
$studentQuery = "SELECT count(*) as numOfTutorialSessions FROM tutorial_session";
$studentResult = mysqli_query($db, $studentQuery);

$numOfTutorialSessions = 0;

while($row = mysqli_fetch_array($studentResult)){
    $numOfTutorialSessions = $row['numOfTutorialSessions'];
}
?>
                    <?=$numOfTutorialSessions?>
                    </div>
                </div>
                    <i class='bx bx-notepad icon' ></i>
            </div>

            <div class="box">
                <div class="left-side">
                    <div class="box_topic">Accounts</div>
                    <div class="number">
<?php
//Fetch the count of all registered accounts 
$studentQuery = "SELECT count(*) as numOfAccounts FROM student";
$studentResult = mysqli_query($db, $studentQuery);

$numOfAccounts = 0;

while($row = mysqli_fetch_array($studentResult)){
    $numOfAccounts = $row['numOfAccounts'];
}
?>
                    <?=$numOfAccounts?>
                    </div>
                </div>
                <i class='bx bx-group icon' ></i>
            </div>

            <div class="box">
                <div class="left-side">
                    <div class="box_topic">Subjects</div>
                    <div class="number">
<?php
//Fetch the count of all registered accounts 
$studentQuery = "SELECT count(*) as numOfSubjects FROM subject";
$studentResult = mysqli_query($db, $studentQuery);

$numOfSubjects = 0;

while($row = mysqli_fetch_array($studentResult)){
    $numOfSubjects = $row['numOfSubjects'];
}
?>
                    <?=$numOfSubjects?>
                    </div>
                </div>
                <i class='bx bx-layer icon' ></i>
            </div>

        </div>
    </div>

</section>

<script src="script.js"></script>
</body>
</html>
