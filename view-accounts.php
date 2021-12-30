<?php include("top.html"); include("server.php");

    // if user is not logged in, they cannot access this page
	if(empty($_SESSION['adminEmail'])){
		header('location: admin-login.php');
	}
?>

<p id="result">Viewing all accounts.</p>
<?php
//Fetch all tutees
$tuteeQuery = "SELECT * FROM tutee";
$tuteeResult = mysqli_query($db, $tuteeQuery);

$i = 1;
?>
<table>
<tr><th>#</th><th>First Name</th><th>Last Name</th><th>UP Mail</th><th>Program</th><th>Year Level</th><th>Type</th></tr>
<?php
while($row = mysqli_fetch_array($tuteeResult)){
?>
    <tr><td><?=$i?></td><td><?=$row['first_name']?></td><td><?=$row['last_name']?></td><td><?=$row['upmail']?></td><td><?=$row['program']?></td><td><?=$row['year_level']?></td><td>Tutee</td></tr>
<?php
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
