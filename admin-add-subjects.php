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
<div class="content">
      <h1 id="signup">Add Subject</h1>
      <form action="admin-add-subjects.php" method="post">
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

