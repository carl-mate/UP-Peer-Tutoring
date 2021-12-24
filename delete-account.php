<?php include("top.html"); include("server.php"); 

// if user is not logged in, they cannot access this page
    if(empty($_SESSION['adminEmail'])){
        header('location: admin-login.php');
    }
?>

<?php
if(isset($_GET['id'])){
    $id = $_GET['id'];
}
if(isset($_GET['studentType'])){
	$studentType = $_GET['studentType'];
}

if($studentType == "Tutor"){
	$query = "DELETE FROM tutor WHERE tutor_id = '$id'";
	$result = mysqli_query($db, $query);
} else if($studentType == "Tutee"){
	$query = "DELETE FROM tutee WHERE tutee_id = '$id'";
	$result = mysqli_query($db, $query);
}

if($result){
	$_SESSION['success'] = "Account successfully deleted!";
	header('location: admin-index.php'); // redirect to home
} else{
	array_push($errors, "Error deleting account. Account possibly has an ongoing session logged.");	// add error message to errors array
	if(count($errors) > 0): ?>
	<div class="error">
		<?php foreach($errors as $error): ?>
			<p><?php echo $error; ?></p>
		<?php endforeach ?>
	</div>
	<?php endif ?> <?php
}
?>

<div class="container">
     <div class="center">
        <p><a href="view-accounts.php" class="button">Back</a></p>
     </div>
</div>

</body>
</html>