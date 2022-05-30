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
<?php
//Fetch all subjects (subjects are a weak entity which depends on available tutors)
$query = "SELECT * FROM subject";
$result = mysqli_query($db, $query);

$i = 1;
?>
 <!--Table here --->
<table>
<caption>Viewing all subjects</caption>
<tr><th>#</th><th>Subject Title</th><th>Program</th></tr>
<?php 
while($row = mysqli_fetch_array($result)){
?>
    <tr><td><?=$i?></td><td><?=$row['title']?></td><td><?=$row['program']?></td></tr>
<?php 
    $i++; 
} 
?>
</table>                    
            </div>
        </div>
    </div>

</section>
<script src="script.js"></script>

</body>
</html>
