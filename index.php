<?php include("top.html"); include("server.php");

    // if user is not logged in, they cannot access this page
	if(empty($_SESSION['upmail'])){
        echo("REACHED HERE");
		header('location: login.php');
	}
?>

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
                    <p>
                    Find Tutor
                    </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>

<script src="script.js"></script>
</body>
</html>
