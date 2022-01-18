<?php include("no-session-top.html"); include("server.php"); ?>
 <div class="login-box">
      <h1 id="login">Admin Login</h1>
      <form action="admin-login.php" method="post">
    	<?php include('errors.php'); ?>
        <div class="text_field"> 
            <label>Username</label>
            <input type="text" name="adminEmail" required />
        </div>
        <div class="text_field">
            <label>Password</label>
            <input type="password" name="adminPassword" placeholder="" />
        </div>
        <input type="submit" name="admin-login" />
        <div class="signup_link">
            <p>Not an admin? <a href="login.php">Log In Here</a></p>
        </div>
      </form>
 </div>
  </body>
</html>
