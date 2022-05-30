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
        <div class="big-boxes">
            <div class="box">
<div class="content">
      <h1 id="signup">Add News</h1>
      <form action="admin-add-subjects.php" method="post">
        <?php include('errors.php'); ?>
        <div class="text_field">
            <label>Title</label>
            <input type="text" name="title" required />
        </div>
        <div class="text_area">
            <label>Body</label>
            <textarea type="text" name="body" required></textarea>
        </div>
        <div class="select_field">
            <label>Visible To</label>
            <select name="visibility">
            <option selected="selected">All</option>
            <option>Tutors</option>
            <option>Tutees</option>
            </select>
        </div>
        <input type="submit" value="Add" name="addnews" />
      </form>
</div>
            </div>
        </div>
    </div>

</section>

<script src="script.js"></script>
</body>
</html>

