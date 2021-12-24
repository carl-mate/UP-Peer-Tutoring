<?php include("top.html"); include("server.php");

    // if user is not logged in, they cannot access this page
	if(empty($_SESSION['adminEmail'])){
		header('location: admin-login.php');
	}

// Display tutors by program (BS in Computer Science, BS in Biology)

$programArray = array();
$programQuery = "SELECT DISTINCT program FROM tutor";
$programResult = mysqli_query($db, $programQuery);

foreach($programResult as $row){
    $programArray[] = $row['program'];
}

?>
<div class = "content">
	<p class="big-paragraph">Hello, <strong>Admin</strong>. Which program and student type do you wish to view?</p>
	<form action="list-accounts.php" method="get">
		<label>Program</label>
	    <select name="program">
	    	<option selected="selected"><?=$programArray[0]?></option>
		<?php
		for($i = 1; $i < count($programArray); $i++) {
		?>
		    <option><?=$programArray[$i]?></option>
		<?php } ?>
	    </select>
	    <label>Student Type</label>
	    <select name="studentType">
	    	<option selected="selected">Tutor</option>
	    	<option>Tutee</option>
	    </select>

		<input type="submit" name="view" />
	    </div>
	</form>
</div>

<div class="container">
     <div class="center">
        <p><a href="admin-index.php" class="button">Back</a></p>
     </div>
</div>

</body>
</html>