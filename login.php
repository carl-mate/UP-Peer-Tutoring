<?php include("no-session-top.html"); include("server.php"); ?>
 <div class="login-box">
      <h1 id="login">Login</h1>
      <form action="login.php" method="post">
    	<?php include('errors.php'); ?>

        <div class="text_field">
            <label>UP Mail</label>
            <input type="email" name="upmail" required />
        </div>
        <div class="text_field">
            <label>Password</label>
            <input type="password" name="password" required />
        </div>
        <input type="submit" value="Login" name="login" />
        <div class="signup_link">
           <p>Don't have an account? <a href="signup.php">Sign Up Here</a></p><br />
           <p>Are you an admin? <a href="admin-login.php">Log In Here</a></p>
        </div>
      </form>
 </div>
    <!--<p class="p-below">Don't have an account? <a href="signup.php">Sign Up Here</a></p>
    <p class="p-below">Are you an admin? <a href="admin-login.php">Log In Here</a></p>-->
  </body>
</html>
