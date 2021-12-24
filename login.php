<?php include("top.html"); include("server.php"); ?>
 <div class="login-box">
      <h1 id="login">Login</h1>
      <form action="login.php" method="post">
    	<?php include('errors.php'); ?>

        <label>UP Mail</label>
        <input type="email" name="upmail" placeholder="" />
        <label>Password</label>
        <input type="password" name="password" placeholder="" />
        <input type="submit" name="login" />
      </form>
 </div>
    <p class="p-below">Don't have an account? <a href="signup.php">Sign Up Here</a></p>
    <p class="p-below">Are you an admin? <a href="admin-login.php">Log In Here</a></p>
  </body>
</html>
