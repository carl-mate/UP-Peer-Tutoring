<?php include("top.html"); include("server.php"); 

// if user is not logged in, they cannot access this page
    if(empty($_SESSION['adminEmail'])){
        header('location: admin-login.php');
    }
?>

<div class="signup-box">
      <h1 id="signup">Add subject</h1>
      <form action="add-subject.php" method="post">
    	<?php include('errors.php'); ?>
        <label>Title</label>
        <input type="text" name="title" placeholder="" style="text-transform: uppercase" />
        <label>Program</label>
        <select name="program">
            <option selected="selected">BS in Computer Science</option>
            <option>BS in Biology</option>
            <option>BS in Accountancy</option>
            <option>BS in Management</option>
            <option>BA in Communication Arts</option>
            <option>BA in Psychology</option>
            <option>BA in Economics</option>
            <option>BA in Political Science</option>
        </select>
        <input type="submit" name="add" />
      </form>
</div>
</body>
</html>