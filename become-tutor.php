<?php include("has-session-top.html"); include("server.php");

// if user is not logged in, they cannot access this page
if(empty($_SESSION['upmail'])){
    echo("REACHED HERE");
    header('location: login.php');
}

include("tutee-sidebar.html");
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
      <?php include('errors.php'); ?>
      <h3>Welcome, <?=$_SESSION['upmail']?></h3>
        <p>Becoming a tutor is a great way to help your peers in their academics. It requires your dedication, commitment, and love for teaching. By clicking agree, your request will be forwarded to the administrator. We will send you an email after reviewing your request.</p>
      <form action="become-tutor.php" method="post">
            <div class="checkbox_field">
                <input type="checkbox" id="agree" name="agree" value="agree" required />
                <label for="agree">I agree</label>
            </div>
        <input type="submit" value="Confirm" name="pendingrequest" />
      </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>

<script src="script.js"></script>
</body>
</html>
