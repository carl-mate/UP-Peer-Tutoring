<?php include("top.html"); include("server.php");

    // if user is not logged in, they cannot access this page
	if(empty($_SESSION['adminEmail'])){
		header('location: admin-login.php');
	}
?>

<p id="result">Add subject.</p>
<div class="signup-box">
      <h1 id="signup">Add Subject</h1>
      <form action="add-subject.php" method="post">
    	<?php include('errors.php'); ?>
        <label>Subject</label>
        <input type="text" name="subject" placeholder="" />
        <input type="submit" name="addsubject" />
      </form>
</div>

<div class="container">
     <div class="center">
        <p><a href="admin-index.php" class="button">Back</a></p>
     </div>
</div>
