<?php include("top.html"); include("server.php");

// if user is not logged in, they cannot access this page
if(empty($_SESSION['adminEmail'])){
    header('location: admin-login.php');
}
?>

<p id="result">Viewing all sessions.</p>
<?php
//Fetch all tutorial_session
$query = "SELECT * FROM tutorial_session";
$result = mysqli_query($db, $query);

$tutor_id = 0;
$tutee_id = 0;
$i = 1;
?>
 <!--Table here --->
<table>
<tr><th>#</th><th>Tutor</th><th>Tutee</th><th>Date</th><th>Start time</th><th>End time</th><th>Subject</th></tr>
<?php
foreach($result as $sessionRow){
    $tutor_id = $sessionRow['tutor_id'];
    $tutee_id = $sessionRow['tutee_id'];
    //Get the tutor_id name
    $tutorNameQuery = "SELECT first_name, last_name FROM tutor WHERE tutor_id='" . $tutor_id . "'";
    $tutorNameResult = mysqli_query($db, $tutorNameQuery);
    $tutorNameArray = array();
    foreach($tutorNameResult as $row){
        $tutorNameArray[] = $row['first_name'] . " " . $row['last_name'];
    }
    //Get the tutee_id name
    $tuteeNameQuery = "SELECT first_name, last_name FROM tutee WHERE tutee_id='" . $tutee_id . "'";
    $tuteeNameResult = mysqli_query($db, $tuteeNameQuery);
    $tuteeNameArray = array();
    foreach($tuteeNameResult as $row){
        $tuteeNameArray[] = $row['first_name'] . " " . $row['last_name'];;
    }
?>
 <tr><td><?=$i?></td><td><?=$tutorNameArray[0]?></td><td><?=$tuteeNameArray[0]?></td><td><?=$sessionRow['date']?></td><td><?=$sessionRow['start_time']?></td><td><?=$sessionRow['end_time']?></td><td><?=$sessionRow['subject']?></td></tr>
<?php 
    $i++;
} ?>
    </table>

    <div class="container">
             <div class="center">
                <p><a href="admin-index.php" class="button">Back</a></p>
             </div>
    </div>

</body>
</html>

