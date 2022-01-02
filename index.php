<?php include("top.html"); include("server.php");

    // if user is not logged in, they cannot access this page
	if(empty($_SESSION['upmail'])){
		header('location: login.php');
	}
?>

<div class="sidebar">
    <div class="logo-details">
        <i class='bx bxl-c-plus-plus'></i>
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
            <a href="#">
                <i class='bx bx-box'></i>
                <span class="link_name">Product</span>
            </a>
        </li>
        <li>
            <a href="#">
                <i class='bx bx-list-ul' ></i>
                <span class="link_name">Order List</span>
            </a>
        </li>
        <li>
            <a href="#">
                <i class='bx bx-pie-chart-alt-2' ></i>
                <span class="link_name">Analytics</span>
            </a>
        </li>
        <li>
            <a href="#">
                <i class='bx bx-coin-stack' ></i>
                <span class="link_name">Stock</span>
            </a>
        </li>
        <li>
            <a href="#">
                <i class='bx bx-user' ></i>
                <span class="link_name">Team</span>
            </a>
        </li>
        <li>
            <a href="#">
                <i class='bx bx-message' ></i>
                <span class="link_name">Message</span>
            </a>
        </li>
        <li>
            <a href="#">
                <i class='bx bx-heart' ></i>
                <span class="link_name">Favorites</span>
            </a>
        </li>
        <li>
            <a href="#">
                <i class='bx bx-cog' ></i>
                <span class="link_name">Settings</span>
            </a>
        </li>
        <li>
            <a href="#">
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
            <span class="user">Admin</span>
           <i class='bx bx-chevron-down' ></i> 
        </div>
    </nav>

    <div class="home-content">
        <div class="overview-boxes">
            <div class="box">
                <div class="left-side">
                    <div class="box-topic">Welcome, Admin! Do something with your admin skills!</div>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="script.js"></script>
<!--
<div class="content">
//			<?php if(isset($_SESSION['success'])): ?>
				<div class="error success">
					<h4>
						<?php 
							echo $_SESSION['success'];
							unset($_SESSION['success']);
						 ?>
					</h4>
				</div>
			<?php endif ?>

			<?php if(isset($_SESSION['upmail'])): ?>
				<p class="big-paragraph">Welcome! <strong><?=$_SESSION['upmail']?></strong></p>
                <div class="container">
                    <div class="center">
                    <a href="find-tutor.php" class="button">Find a tutor!</a>
                    <a href="log-session.php" class="button">Log a session</a>
                    <a href="my-sessions.php" class="button">My sessions</a>
                    <a href="index.php?logout='1'" class="button">Logout</a>
                    </div>
                </div>
            <?php endif ?>
</div>
-->
</body>
</html>
