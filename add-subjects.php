<?php include("top.html"); include("server.php");

// if user is not logged in, they cannot access this page
if(empty($_SESSION['adminEmail'])){
    header('location: admin-login.php');
}
?>

<div class="sidebar">
    <div class="logo-details">
        <img src="images/tutor.png" alt="banner logo" />
        <span class="logo_name">UP Peer Tutoring</span>
    </div>
    <ul class="nav-links">
        <li>
            <a href="admin-index.php">
                <i class='bx bx-grid-alt' ></i>
                <span class="link_name">Dashboard</span>
            </a>
        </li>
        <li>
            <a href="view-sessions.php">
                <i class='bx bx-notepad' ></i>
                <span class="link_name">View Sessions</span>
            </a>
        </li>
        <li>
            <a href="view-accounts.php">
                <i class='bx bx-group' ></i>
                <span class="link_name">View Accounts</span>
            </a>
        </li>
        <li>
            <a href="view-subjects.php">
                <i class='bx bx-layer' ></i>
                <span class="link_name">View Subjects</span>
            </a>
        </li>
        <li>
            <a href="add-subjects.php">
                <i class='bx bx-layer-plus' ></i>
                <span class="link_name">Add Subjects</span>
            </a>
        </li>
        <li>
            <a href="admin-index.php?admin-logout='1'">
                <i class='bx bx-log-out' ></i>
                <span class="link_name">Logout</span>
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
      <form action="add-subject.php" method="post">
        <?php include('errors.php'); ?>
        <div class="text_field">
            <label>Title</label>
            <input type="text" name="title" required />
        </div>
        <div class="select_field">
            <label>Program</label>
            <select name="program">
            <option selected="selected">BS in Computer Science</option>
            <option>BS in Biology</option>
            <option>BS in Accountancy</option>
            <option>BS in Management</option>
            <option>BA in Communication Arts</option>
            <option>BA in Psychology</option>
            <option>BA in Economics</option>
            <option>BA in Political Science</option>
        </select>
        </div>
        <input type="submit" value="Add" name="addsubject" />
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

