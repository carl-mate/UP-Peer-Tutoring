<?php include("top.html"); include("server.php"); ?>
 <div class="login-box">
      <h1 id="login">Admin Login</h1>
      <form action="admin-login.php" method="post">
    	<?php include('errors.php'); ?>

        <label>UP Mail</label>
        <input type="email" name="adminEmail" placeholder="" />
        <label>Password</label>
        <input type="password" name="adminPassword" placeholder="" />
        <input type="submit" name="admin-login" />
      </form>
 </div>
    <p class="p-below">Not an admin? <a href="login.php">Log In Here</a></p>
  </body>
</html>
