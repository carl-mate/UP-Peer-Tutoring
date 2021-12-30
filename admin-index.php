<?php include("top.html"); include("server.php");

    // if user is not logged in, they cannot access this page
	if(empty($_SESSION['adminEmail'])){
		header('location: admin-login.php');
	}
?>

<h1>Admin Page</h1>
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

			<?php if(isset($_SESSION['adminEmail'])): ?>
				<?php include('errors.php'); ?>
				<p class="big-paragraph">Welcome! <strong><?=$_SESSION['adminEmail']?></strong></p>
                <div class="container">
                    <div class="center">
                    <a href="view-sessions.php" class="button">View sessions</a>
                    <a href="view-accounts.php" class="button">View accounts</a>
                    <a href="view-subjects.php" class="button">View subjects</a>
                    <a href="add-tutors.php" class="button">Add tutors</a>
                    <a href="add-subjects.php" class="button">Add subjects</a>
                    <a href="" class="button">Remove accounts</a>
                    <a href="admin-index.php?admin-logout='1'" class="button">Logout</a>
                    </div>
                </div>
            <?php endif ?>
        </div>
</body>
</html>
