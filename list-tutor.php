<?php include("top.html"); include("server.php"); ?>

<?php
if(isset($_GET['subject'])){
    $subject = $_GET['subject'];
}
?>

<p id="result">Available tutors for <strong><?=$subject?></strong>.</p>
<?php

//Find all tutors that teaches the given subject
$query = "SELECT t.tutor_id, t.first_name, t.last_name, t.upmail, t.program, t.year_level
    FROM tutor t
    JOIN tutor_teaches tt
    ON t.tutor_id=tt.tutor_id
    JOIN subject s
    ON tt.subject_id=s.subject_id
    WHERE title='$subject'";
$result = mysqli_query($db, $query);

foreach($result as $row){
?>
<div class="match">
        <p>
        <img src="images/user.png" width=150 alt="User" /><span><?=$row['first_name'] . " " . $row['last_name']?></span>
        </p>

        <ul>
            <li><?="<strong>UP Mail: </strong>" . $row['upmail']?></li>
            <li><?="<strong>Program: </strong>" . $row['program']?></li>
            <li><?="<strong>Year Level: </strong>" . $row['year_level']?></li>

<?php 
    //List the available schedule(s) of each tutor
    $tutor_id = $row['tutor_id'];
    $schedQuery = "SELECT date, start_time, end_time
        FROM available_time at
        JOIN tutor_available_time tat
        ON at.available_time_id=tat.available_time_id
        JOIN tutor t
        ON t.tutor_id=tat.tutor_id
        WHERE t.tutor_id=$tutor_id";
    $schedResult = mysqli_query($db, $schedQuery);
?>
            <li><?="<strong>Available Schedule: </strong>"?>
                <ul>
<?php
    foreach($schedResult as $schedRow){
?>
                    <li><?="<strong>Date: </strong>" . $schedRow['date'] . "<strong> From: </strong>" . date('h:i:s a', strtotime($schedRow['start_time'])) . "<strong> to </strong>" . date('h:i:s a', strtotime($schedRow['end_time']))?></li>
<?php } ?>
                </ul>

            <li>
                <a href=<?="https://mail.google.com/mail/?view=cm&fs=1&to=" . $row['upmail'] . "&su=UP_Tacloban_Peer_Tutoring_Program&body=Hello!"?>>Contact</a>
            </li>
        </ul>
</div>
<?php } ?>
<div class="container">
     <div class="center">
        <p><a href="find-tutor.php" class="button">Back</a></p>
     </div>
</div>

</body>
</html>



