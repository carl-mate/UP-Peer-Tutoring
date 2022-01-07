<?php include("no-session-top.html"); include("server.php"); ?>
 <div class="login-box">
      <h1 id="login">Admin Login</h1>
      <form action="admin-login.php" method="post">
    	<?php include('errors.php'); ?>
        <div class="text_field"> 
            <input type="email" name="adminEmail" required />
            <label>UP Mail</label>
        </div>
        <div class="text_field">
            <input type="password" name="adminPassword" placeholder="" />
            <label>Password</label>
        </div>
        <input type="submit" name="admin-login" />
        <div class="signup_link">
            <p>Not an admin? <a href="login.php">Log In Here</a></p>
        </div>
      </form>
 </div>
  </body>
</html>
