<?php include("top.html"); include("server.php");

// if user is not logged in, they cannot access this page
if(empty($_SESSION['adminEmail'])){
    header('location: admin-login.php');
}
?>

<p id="result">Add a tutor.</p>

<div class="signup-box">
      <h1 id="signup">Add Tutor</h1>
      <form action="add-tutors.php" method="post">
    	<?php include('errors.php'); ?>
        <label>First Name</label>
        <input type="text" name="firstname" placeholder="" />
        <label>Last Name</label>
        <input type="text" name="lastname" placeholder="" />
        <label>Program</label>
        <select name="program">
            <option selected="selected">BS in Computer Science</option>
            <option>BS in Biology</option>
        </select>
        <label>Year level</label>
        <select name="yearlevel">
            <option selected="selected">1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
        </select>
        <label>UP Mail</label>
        <input type="email" name="upmail" placeholder="jprizal@up.edu.ph" />
        <label>Tutor's Subject</label>
        <input type="text" name="tutorsubject" placeholder="" />
        <input type="submit" name="addtutor" />
      </form>
</div>
<div class="container">
     <div class="center">
        <p><a href="admin-index.php" class="button">Back</a></p>
     </div>
</div>
<?php


