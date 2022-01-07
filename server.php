<?php
	session_start();

	$firstname = "";
	$lastname = "";
	$upmail = "";
	$errors = array();
	// connect to database
	$db = mysqli_connect('localhost', 'root', 'Mu612216');
    mysqli_select_db($db, 'tutor');

	// if register button is clicked
	if(isset($_POST['signup'])){
		$firstname = mysqli_real_escape_string($db, $_POST['firstname']);
		$lastname = mysqli_real_escape_string($db, $_POST['lastname']);
		$upmail = mysqli_real_escape_string($db, $_POST['upmail']);
		$program = mysqli_real_escape_string($db, $_POST['program']);
		$yearlevel = mysqli_real_escape_string($db, $_POST['yearlevel']);
		$password = mysqli_real_escape_string($db, $_POST['password']);
		$confirmpassword = mysqli_real_escape_string($db, $_POST['confirmpassword']);
		$checkUniqueness = "SELECT * FROM tutee WHERE upmail = '$upmail' LIMIT 1";
		$resultUniqueness = mysqli_query($db, $checkUniqueness);

		// make sure all fields are filled
		if(empty($firstname)){
			array_push($errors, "First name is required.");	// add error message to errors array
		}
        if(empty($lastname)){
			array_push($errors, "Last name is required.");	// add error message to errors array
		}
		if(empty($upmail)){
			array_push($errors, "Email is required.");	// add error message to errors array
		}
		if(empty($password)){
			array_push($errors, "Password is required.");	// add error message to errors array
		}
		if($password != $confirmpassword){
			array_push($errors, "The two passwords do not match.");	// add error message to errors array
		}
		
		// check if upmail is unique and does not already exist in db
		if(mysqli_num_rows($resultUniqueness) > 0){
			array_push($errors, "Email has already been registered.");
		}
		// check if upmail is valid
		if(checkEmailValidity($upmail) == false){
			array_push($errors, "Invalid email.");
		}

		// if there are no errors, save user to database
		if(count($errors) == 0){
			$password = md5($password);	// encrypt password before storing in database (security)
			$sql = "INSERT INTO tutee (first_name, last_name, upmail, program, year_level, password)
					VALUES('$firstname', '$lastname', '$upmail', '$program', '$yearlevel', '$password')";
			mysqli_query($db, $sql);
			$_SESSION['upmail'] = $upmail;
			$_SESSION['success'] = "You are now logged in.";
			header('location: index.php'); // redirect to home
		}
	}

	// login
	if(isset($_POST['login'])){
		$upmail = mysqli_real_escape_string($db, $_POST['upmail']);
		$password = mysqli_real_escape_string($db, $_POST['password']);

		// make sure all fields are filled
		if(empty($upmail)){
			array_push($errors, "UP Mail is required.");	// add error message to errors array
		}
		if(empty($password)){
			array_push($errors, "Password is required.");	// add error message to errors array
		}

		if(count($errors) == 0){
			$password = md5($password);		// encrypt password before comparing to database
			$query = "SELECT * FROM tutee WHERE upmail='$upmail' AND password='$password'";
			$result = mysqli_query($db, $query);
			if(mysqli_num_rows($result) == 1){
				// log user in
                echo "SUCCESS";
				$_SESSION['upmail'] = $upmail;
				$_SESSION['success'] = "You are now logged in.";
				header('location: index.php');		// redirect to home
			} else{
				array_push($errors, "Incorrect upmail/password combination.");
			}
		}
	}

	// admin login
	if(isset($_POST['admin-login'])){
		$adminEmail = mysqli_real_escape_string($db, $_POST['adminEmail']);
		$adminPassword = mysqli_real_escape_string($db, $_POST['adminPassword']);

		// make sure all fields are filled
		if(empty($adminEmail)){
			array_push($errors, "Admin Email is required.");	// add error message to errors array
		}
		if(empty($adminPassword)){
			array_push($errors, "Admin Password is required.");	// add error message to errors array
		}

		if(count($errors) == 0){
			//$adminPassword = md5($adminPassword);		// encrypt password before comparing to database
			$query = "SELECT * FROM admin WHERE upmail='$adminEmail' AND password='$adminPassword'";
			$result = mysqli_query($db, $query);
			if(mysqli_num_rows($result) == 1){
				// log user in
                echo "SUCCESS";
				$_SESSION['adminEmail'] = $adminEmail;
				$_SESSION['success'] = "You are now logged in.";
				header('location: admin-index.php');		// redirect to home
			} else{
				array_push($errors, "Incorrect email/password combination.");
			}
		}
	}

    // log session
	if(isset($_POST['logsession'])){
		$tutor_upmail = mysqli_real_escape_string($db, $_POST['upmail']);
		$date = mysqli_real_escape_string($db, $_POST['date']);
		$start_time = mysqli_real_escape_string($db, $_POST['starttime']);
		$end_time = mysqli_real_escape_string($db, $_POST['endtime']);
		$subject = mysqli_real_escape_string($db, $_POST['subject']);

		// make sure all fields are filled
		if(empty($tutor_upmail)){
			array_push($errors, "Tutor's UP Mail is required.");	// add error message to errors array
        } else{
            //Check if tutor_upmail exists
            $checkIfUPMailExists = "SELECT upmail FROM tutor WHERE upmail='$tutor_upmail'";
            $checkIfUPMailExistsResult = mysqli_query($db, $checkIfUPMailExists);

            if(mysqli_num_rows($checkIfUPMailExistsResult) == 0){
			    array_push($errors, "UP Mail does not exist.");
		    }
        }
		if(empty($date)){
			array_push($errors, "Date is required.");	// add error message to errors array
		}
        if(empty($start_time)){
			array_push($errors, "Start time is required.");	// add error message to errors array
		}
        if(empty($end_time)){
			array_push($errors, "End time is required.");	// add error message to errors array
		}
        if(empty($subject)){
			array_push($errors, "Subject is required.");	// add error message to errors array
		}
        	    

        //Get the tutor_id of tutor_upmail
        $tutorIDQuery = "SELECT tutor_id FROM tutor WHERE upmail='" . $tutor_upmail . "'";
        $tutorIDResult = mysqli_query($db, $tutorIDQuery);

        $tutorID = 0;
        foreach($tutorIDResult as $row){
            $tutorID = $row['tutor_id'];
        }

        //Get the tutee_id of $_SESSION['upmail']
        $tuteeIDQuery = "SELECT tutee_id FROM tutee WHERE upmail='" . $_SESSION['upmail'] . "'";
        $tuteeIDResult = mysqli_query($db, $tuteeIDQuery);

        $tuteeID = 0;
        foreach($tuteeIDResult as $row){
            $tuteeID = $row['tutee_id'];
        }

	    if(count($errors) == 0){
			$sql = "INSERT INTO tutorial_session (tutor_id, tutee_id, date, start_time, end_time, subject)
					VALUES('$tutorID', '$tuteeID', '$date', '$start_time', '$end_time', '$subject')";
			mysqli_query($db, $sql);
			$_SESSION['success'] = "Thank you for logging session.";
			header('location: index.php'); // redirect to home
		}
	}

    // add subject for admins
	if(isset($_POST['addsubject'])){
		$title = mysqli_real_escape_string($db, $_POST['title']);
		$uppercaseTitle = strtoupper($title);
		$program = mysqli_real_escape_string($db, $_POST['program']);
		$checkUniqueness = "SELECT * FROM subject WHERE title = '$title' AND program = '$program' LIMIT 1";
		$resultUniqueness = mysqli_query($db, $checkUniqueness);

		// make sure all fields are filled
		if(empty($title)){
			array_push($errors, "Title is required.");	// add error message to errors array
		}

		// check if subject/program combination is unique and does not already exist in db
		if(mysqli_num_rows($resultUniqueness) > 0){
			array_push($errors, "Subject-Program combination already exists."); // add error message to array
		}

		// if there are no errors, save subject to database
		if(count($errors) == 0){
			$sql = "INSERT INTO subject (title, program)
					VALUES('$uppercaseTitle', '$program')";
			mysqli_query($db, $sql);
			$_SESSION['success'] = "Subject added succesfully.";
			header('location: admin-index.php'); // redirect to home
		}
	}

	// logout
	if(isset($_GET['logout'])){
		session_destroy();
		unset($_SESSION['upmail']);
		header('location: login.php');
	}

	// admin logout
	if(isset($_GET['admin-logout'])){
		session_destroy();
		unset($_SESSION['adminEmail']);
		header('location: admin-login.php');
	}

	// function to check if inputted email is a valid upmail
	function checkEmailValidity($upmail){
		if(strpos($upmail, '@up.edu.ph')){
			return true;
		} else{
			return false;
		}
	}
?>
