<?php include("top.html"); include("server.php"); ?>
<div class="signup-box">
      <h1 id="signup">Sign Up</h1>
      <form action="signup.php" method="post">
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
        <label>Password</label>
        <input type="password" name="password" placeholder="" />
        <label>Confirm Password</label>
        <input type="password" name="confirmpassword" placeholder="" />
        <input type="submit" name="signup" />
      </form>
</div>
    <p class="p-below">Already have an account? <a href="login.php">Login here</a>
    </p>
  </body>
</html>

