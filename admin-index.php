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
            <div class="box">
                <div class="left-side">
                    <div class="box_topic">
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
                        <h3>Welcome, Admin!</h3>
                        <p><strong>Pending Requests</strong>, display all pending requests from students who want to become a tutor.</p>
                        <p><strong>View Sessions</strong>, list down all the the tutorial sessions between the tutors and tutees.</p>
                        <p><strong>View Accounts</strong>, list down all the registered accounts.</p>
                        <p><strong>View Subjects</strong>, view all the available subjects that a tutor can teach.</p>
                        <p><strong>Add Subjects</strong>, add a new subject for a specific program that a tutor can teach.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>

<script src="script.js"></script>
</body>
</html>
