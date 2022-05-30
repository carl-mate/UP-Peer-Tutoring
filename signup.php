<?php include("no-session-top.html"); include("server.php"); ?>
<div class="signup-box">
      <h1 id="signup">Sign Up</h1>
      <form action="signup.php" method="post">
    	<?php include('errors.php'); ?>

        <div class="text_field">
            <label>First Name</label>
            <input type="text" name="firstname" required />
        </div>
        <div class="text_field">
            <label>Last Name</label>
            <input type="text" name="lastname" required />
        </div>
        <div class="select_field">
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
        </div>
        <div class="select_field">
            <label>Year level</label>
            <select name="yearlevel">
                <option selected="selected">1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
            </select>
        </div>
        <div class="text_field">
            <label>UPVTC E-Mail</label>
            <input type="email" name="upmail" required />
        </div>
        <div class="text_field">
            <label>Password</label>
            <input type="password" name="password" required />
        </div>
       <div class="text_field">
            <label>Confirm Password</label>
            <input type="password" name="confirmpassword" required />
        </div>
                <input type="submit" value="Sign Up" name="signup" />
        <div class="signup_link">
            <p>Already have an account? <a href="login.php">Login here</a></p>
        </div>
      </form>
</div>
      </body>
</html>

