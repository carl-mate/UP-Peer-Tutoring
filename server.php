<?php
	session_start();

	$firstname = "";
	$lastname = "";
	$upmail = "";
	$errors = array();
	// connect to database
    $servername = "localhost";
    $username = "root";
    $password = "Mu612216";
    $dbname = "peer_tutoring";

    $db = new mysqli($servername, $username, $password, $dbname);

    if($db->connect_error){
        die("Connection failed: " . $db->connect_error);
    }

	// if register button is clicked
	if(isset($_POST['signup'])){

		$firstname = mysqli_real_escape_string($db, $_POST['firstname']);
		$lastname = mysqli_real_escape_string($db, $_POST['lastname']);
		$upmail = mysqli_real_escape_string($db, $_POST['upmail']);
		$program = mysqli_real_escape_string($db, $_POST['program']);
		$yearlevel = mysqli_real_escape_string($db, $_POST['yearlevel']);
		$password = mysqli_real_escape_string($db, $_POST['password']);
		$confirmpassword = mysqli_real_escape_string($db, $_POST['confirmpassword']);
        $isTutor = 0; #Student is a tutee upon signing up
        $isPendingApproval = 0; #This will be set to true if student decides to be a tutor
		$checkUniqueness = "SELECT * FROM student WHERE upmail = '$upmail' LIMIT 1";
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
			$password = md5($password); // encrypt password before storing in database (security)
			$statement = $db->prepare("INSERT INTO student (first_name, last_name, upmail, program, year_level, password, isTutor, isPendingApproval)
									   VALUES(?, ?, ?, ?, ?, ?, ?, ?)");
			$statement->bind_param("ssssisii", $firstname, $lastname, $upmail, $program, $yearlevel, $password, $isTutor, $isPendingApproval);
			$statement->execute();
			$_SESSION['upmail'] = $upmail;
			$_SESSION['success'] = "You are now logged in.";
			header('location: tutee-index.php'); // redirect to home
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
			$password = md5($password);
			$statement = $db->prepare("SELECT * FROM student WHERE upmail=? AND password=?");
			$statement->bind_param("ss", $upmail, $password);
			$statement->execute();
			$statement->store_result();
			$statement->bind_result($student_id, $first_name, $last_name, $upmail, $program, $year_level, $password, $isTutor, $isPendingApproval);
			if($statement->num_rows() == 1){
				// log user in
                echo "SUCCESS";
				$_SESSION['upmail'] = $upmail;
				$_SESSION['success'] = "You are now logged in.";
				header('location: tutee-index.php');		// redirect to home
			} else{
				array_push($errors, "Incorrect upmail/password combination.");
			}
		}
	}

    // become tutor_upmail
    if(isset($_POST['pendingrequest'])){
		$upmail = mysqli_real_escape_string($db, $_SESSION['upmail']);
        $checkIfPending = "SELECT isPendingApproval FROM student WHERE upmail='$upmail'";
		$resultPending = mysqli_query($db, $checkIfPending);
        $isPendingApproval = 0;

        foreach($resultPending as $row){
            $isPendingApproval = $row['isPendingApproval'];
        }

        if($isPendingApproval != 0){
			array_push($errors, "You request is already being reviewed.");	// add error message to errors array
        }

        if(count($errors) == 0){
            $updatePendingRequest = "UPDATE student SET isPendingApproval=1 WHERE upmail='$upmail'";
            mysqli_query($db, $updatePendingRequest);
            $_SESSION['success'] = "Your request has been forwarded successfully.";
			header('location: tutee-index.php'); // redirect to home
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
			$statement = $db->prepare("SELECT * FROM admin WHERE username=? AND password=?");
			$statement->bind_param("ss", $adminEmail, $adminPassword);
			$statement->execute();
			$statement->store_result();
			$statement->bind_result($admin_id, $upmail, $password);
			if($statement->num_rows() == 1){
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

    //book available_time for tutee
    if(isset($_GET['book'])){
        $array = explode(",", $_GET['book']);
        $tutorID = $array[0];
        $tuteeID = $array[1];
        $date = $array[2];
        $startTime = $array[3];
        $endTime = $array[4];
        $subject = $array[5];
        $availableTimeID = $array[6];

        //update available_time
        $bookQuery = "UPDATE available_time SET isBooked='1', subject='$subject', student_id='$tuteeID' WHERE available_time_id='$availableTimeID'";
        mysqli_query($db, $bookQuery);

        //insert booked schedule into tutorial_session
        $tutSessionQuery = "INSERT INTO tutorial_session (tutor_id, tutee_id, date, start_time, end_time, subject, status)
                            VALUES('$tutorID', '$tuteeID', '$date', '$startTime', '$endTime', '$subject', 'ONGOING')";
        mysqli_query($db, $tutSessionQuery);

		$_SESSION['success'] = "Schedule has been booked successfully.";
        header('location: tutee-index.php');
    }

    // add subject for tutor
	if(isset($_POST['tutoraddsubject'])){
		$title = mysqli_real_escape_string($db, $_POST['title']);
        $tutor_upmail = $_SESSION['upmail'];


        //Get the program and student_id of the tutor
        $tutorQuery = "SELECT student_id, program FROM student WHERE upmail='$tutor_upmail'";
        $tutorResult = mysqli_query($db, $tutorQuery);
        $program = "";
        $tutorID = 0;
        foreach($tutorResult as $row){
            $program = $row['program'];
            $tutorID = $row['student_id'];
        }

        //Get the subject_id of the given title
        $subjectIDQuery = "SELECT subject_id FROM subject WHERE title='$title' AND program='$program'";
        $subjectIDResult = mysqli_query($db, $subjectIDQuery);
        $subjectID = 0;
        foreach($subjectIDResult as $row){
            $subjectID = $row['subject_id'];
        }

        $checkUniqueness = "SELECT * FROM tutor_teaches WHERE tutor_id = '$tutorID' AND subject_id = '$subjectID' LIMIT 1";
		$resultUniqueness = mysqli_query($db, $checkUniqueness);

		if(mysqli_num_rows($resultUniqueness) > 0){
			array_push($errors, "Subject has already been added.");
		}

		// if there are no errors, save subject to database
		if(count($errors) == 0){
			$sql = "INSERT INTO tutor_teaches (tutor_id, subject_id)
					VALUES('$tutorID', '$subjectID')";
			mysqli_query($db, $sql);
			$_SESSION['success'] = "Subject added succesfully.";
			header('location: tutor-index.php'); // redirect to home
		}
	}

    // update booking status for tutor
    if(isset($_GET['confirmstatus'])){
        $confirmStatus = mysqli_real_escape_string($db, $_GET['status']);
        $array = explode(",", $_GET['confirmstatus']);
        $tutorID = $array[0];
        $tuteeID = $array[1];
        $date = $array[2];
        $startTime = $array[3];
        $endTime = $array[4];
        $subject = $array[5];

       //update the status in tutorial_session 
        $tutSessionUpdateQuery = "UPDATE tutorial_session SET status='$confirmStatus' WHERE tutor_id=$tutorID AND tutee_id=$tuteeID AND date='$date' AND start_time='$startTime' AND end_time='$endTime' AND subject='$subject'";
        mysqli_query($db, $tutSessionUpdateQuery);
        $_SESSION['success'] = "Status has been updated successfully.";
        header('location: tutor-index.php');
    }

    // add available time for tutor
	if(isset($_POST['tutoraddavailabletime'])){
		$date = mysqli_real_escape_string($db, $_POST['date']);
		$start_time = mysqli_real_escape_string($db, $_POST['starttime']);
		$end_time = mysqli_real_escape_string($db, $_POST['endtime']);
        $tutor_upmail = $_SESSION['upmail'];
        $checkUniqueness = "SELECT * FROM available_time WHERE date = '$date' AND start_time = '$start_time' AND end_time = '$end_time' LIMIT 1";
		$resultUniqueness = mysqli_query($db, $checkUniqueness);

        //Get the student_id of the tutor
        $tutorQuery = "SELECT student_id FROM student WHERE upmail='$tutor_upmail'";
        $tutorResult = mysqli_query($db, $tutorQuery);
        $tutorID = 0;
        foreach($tutorResult as $row){
            $tutorID = $row['student_id'];
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
		if(mysqli_num_rows($resultUniqueness) > 0){
			array_push($errors, "Available Time has already been added.");
		}

      	// if there are no errors, save to database
		if(count($errors) == 0){
             // insert into available_time
            $insertIntoAvailableTime = "INSERT INTO available_time (date, start_time, end_time, isBooked, subject, student_id) 
                                        VALUES('$date', '$start_time', '$end_time', '0', '', '$tutorID')";
			mysqli_query($db, $insertIntoAvailableTime);
            $available_time_id = mysqli_insert_id($db);
            // insert into tutor_available_time
            $insertIntoTutorAvailableTime = "INSERT INTO tutor_available_time (available_time_id, tutor_id) 
                                             VALUES('$available_time_id', '$tutorID')";
			mysqli_query($db, $insertIntoTutorAvailableTime);
			$_SESSION['success'] = "Available time added succesfully.";
			header('location: tutor-index.php'); // redirect to home
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

    // add announcement for admins 
    if(isset($_POST['addnews'])){
		$title = mysqli_real_escape_string($db, $_POST['title']);
        $body = mysqli_real_escape_string($db, $_POST['body']);
        $visibility = mysqli_real_escape_string($db, $_POST['visibility']);

        $forTutor = 0;
        $forTutee = 0;

        // configure the the news' visibility
        if($visibility == 'All'){
            $forTutor = 1;
            $forTutee = 1;
        } else if($visibility == 'Tutors'){
            $forTutor = 1;
            $forTutee = 0;
        } else if($visibility == 'Tutees'){
            $forTutor = 0;
            $forTutee = 1;
        }


        // make sure all fields are fillled
        if(empty($title)){
			array_push($errors, "Title is required.");	// add error message to errors array
        }

        if(empty($title)){
			array_push($errors, "Body is required.");	// add error message to errors array
        }

        // if there are no errors, save news to database
        if(count($errors) == 0){
            $sql = "INSERT INTO news (title, body, forTutor, forTutee)
					VALUES('$title', '$body', '$forTutor', $forTutee)";
			mysqli_query($db, $sql);
			$_SESSION['success'] = "News added succesfully.";
			header('location: admin-index.php'); // redirect to home

        }


    }

    if(isset($_POST['pendingapproval'])){
        $approval = $_POST['acceptreject'];
        $studentID = $_POST['pendingapproval'];
        var_dump($approval);
        var_dump($studentID);
        if($approval == 'Reject'){
            $approval = 0;
            echo "REJECTED";
        } else if($approval == 'Accept'){
            $approval = 1;
            echo "ACCEPTED";
        }

        // Update isPendingApproval and isTutor attribute of student table
        $updateStudentQuery = "UPDATE student SET isPendingApproval=0, isTutor='$approval' WHERE student_id='$studentID'";
        mysqli_query($db, $updateStudentQuery);

        if($approval){
            $_SESSION['success'] = "Tutee request to become a tutor has been accepted.";
	        header('location: admin-index.php'); // redirect to home
        } else{
            $_SESSION['success'] = "Tutee request to become a tutor has been rejected.";
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
