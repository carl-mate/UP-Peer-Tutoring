<?php include("top.html"); include("server.php");

    // if user is not logged in, they cannot access this page
	if(empty($_SESSION['upmail'])){
		header('location: login.php');
	}
?>

<h1>Find and connect with a tutor!</h1>
<div class="content">
			<?php if(isset($_SESSION['success'])): ?>
				<div class="error success">
					<h4>
						<?php 
							echo $_SESSION['success'];
							unset($_SESSION['success']);
						 ?>
					</h4>
				</div>
			<?php endif ?>

			<?php if(isset($_SESSION['upmail'])): ?>
				<p class="big-paragraph">Welcome! <strong><?=$_SESSION['upmail']?></strong></p>
                <div class="container">
                    <div class="center">
                    <a href="find-tutor.php" class="button">Find a tutor!</a>
                    <a href="log-session.php" class="button">Log a session</a>
                    <a href="my-sessions.php" class="button">My sessions</a>
                    <a href="index.php?logout='1'" class="button">Logout</a>
                    </div>
                </div>
            <?php endif ?>
        </div>
</body>
</html>
