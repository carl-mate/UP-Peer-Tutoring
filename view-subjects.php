<?php include("top.html"); include("server.php");

    // if user is not logged in, they cannot access this page
	if(empty($_SESSION['adminEmail'])){
		header('location: admin-login.php');
	}
?>

<p id="result">Viewing all subjects.</p>

<?php
	$query = "SELECT subject_id, title, program FROM subject";
	$result = mysqli_query($db, $query);

	$subject_id = 0;
	$first_name = "";
	$last_name = "";
	foreach($result as $row){
	    $subject_id = $row['subject_id'];
	    $title = $row['title'];
	    $program = $row['program'];
	    ?>
	    <!-- display the tutee's name -->
	    <!-- <p id="result"><strong><?=$first_name . " " . $last_name . "'s "?></strong>sessions.</p> -->
		<div class="match">
		        <p>
		        <img src="images/user.png" width=150 alt="User" /><span><?=$title?></span>
		        </p>

		        <ul>
		            <li><?="<strong>Subject ID: </strong>" . $subject_id?></li>
		            <li><?="<strong>Program: </strong>" . $program?></li>
		            <li>
                		<a href="delete-subject.php?id=<?=$row['subject_id']?>">Delete Subject</a>
            		</li>
		        </ul>
		</div>
		<?php }?>
	<div class="container">
		<div class="center">
			<p><a href="add-subject.php" class="button">Add Subject</a></p>
			<p><a href="admin-index.php" class="button">Back</a></p>
		</div>
	</div>

</body>
</html>

