<?php include("top.html"); include("server.php");

    // if user is not logged in, they cannot access this page
	if(empty($_SESSION['adminEmail'])){
		header('location: admin-login.php');
	}
?>

<p id="result">Viewing all sessions.</p>

<?php
	$query = "SELECT tutee_id, first_name, last_name, program FROM tutee";
	$result = mysqli_query($db, $query);

	$tutee_id = 0;
	$first_name = "";
	$last_name = "";
	foreach($result as $row){
	    $tutee_id = $row['tutee_id'];
	    $first_name = $row['first_name'];
	    $last_name = $row['last_name'];
	    ?>
	    <!-- display the tutee's name -->
	    <p id="result"><strong><?=$first_name . " " . $last_name . "'s "?></strong>sessions.</p>
	    <?php
	    //Find all sessions of the tutee  
		$sessionQuery = "SELECT * FROM tutorial_session WHERE tutee_id=$tutee_id";
		$sessionResult = mysqli_query($db, $sessionQuery);

		foreach($sessionResult as $sessionResultRow){
		$tutor_id = $sessionResultRow['tutor_id'];
		$tutorNameQuery = "SELECT first_name, last_name
		    FROM tutor 
		    WHERE tutor_id=$tutor_id";
		$tutorNameResult = mysqli_query($db, $tutorNameQuery);


		foreach($tutorNameResult as $tutorNameRow){
		?>
		<div class="match">
		        <p>
		        <img src="images/user.png" width=150 alt="User" /><span><?=$tutorNameRow['first_name'] . " " . $tutorNameRow['last_name']?></span>
		        </p>

		        <ul>
		            <li><?="<strong>Date: </strong>" . $sessionResultRow['date']?></li>
		            <li><?="<strong>Start time: </strong>" . date('h:i:s a', strtotime($sessionResultRow['start_time']))?></li>
		            <li><?="<strong>End time: </strong>" . date('h:i:s a', strtotime($sessionResultRow['end_time']))?></li>
		            <li><?="<strong>Subject: </strong>" . $sessionResultRow['subject']?></li>
		        </ul>
		</div>
		<?php }
		} ?>
		
	<?php } ?>
	<div class="container">
		     <div class="center">
		        <p><a href="admin-index.php" class="button">Back</a></p>
		     </div>
	</div>

</body>
</html>

