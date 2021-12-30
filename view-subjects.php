<?php include("top.html"); include("server.php");

// if user is not logged in, they cannot access this page
if(empty($_SESSION['adminEmail'])){
    header('location: admin-login.php');
}
?>

<p id="result">Viewing all subjects.</p>
<?php
//Fetch all subjects (subjects are a weak entity which depends on available tutors)
$query = "SELECT * FROM subject";
$result = mysqli_query($db, $query);

$i = 1;
?>
 <!--Table here --->
<table>
<tr><th>#</th><th>Subject</th></tr>
<?php 
while($row = mysqli_fetch_array($result)){
?>
    <tr><td><?=$i?></td><td><?=$row['title']?></td></tr>
<?php 
    $i++; 
} 
?>
</table>
<div class="container">
     <div class="center">
        <p><a href="admin-index.php" class="button">Back</a></p>
     </div>
</div>

</body>
</html>
