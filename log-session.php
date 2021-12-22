<?php include("top.html"); include("server.php"); 
// if user is not logged in, they cannot access this page
    if(empty($_SESSION['upmail'])){
        header('location: login.php');
    }

$programQuery = "SELECT program FROM tutee WHERE upmail='" . $_SESSION['upmail'] . "'";
$programResult = mysqli_query($db, $programQuery);

$program = "";
foreach($programResult as $row){
    $program = $row['program'];
}

$titleArray = array();
$titleQuery = "SELECT title FROM subject WHERE program='$program'";
$titleResult = mysqli_query($db, $titleQuery);
$emails = "SELECT * FROM tutor";
$emailResult = mysqli_query($db, $emails);

foreach($titleResult as $row){
    $titleArray[] = $row['title'];
}

?>
<div class="log-session-box">
      <h1 id="log">Log Session</h1>
      <form action="log-session.php" method="post">
        <?php include('errors.php'); ?>

        <label>Tutor's UP Mail</label>
        <input type="email" name="upmail" placeholder="" />
        <label>Date</label>
        <input type="date" name="date" placeholder="" />
        <label>Start time</label>
        <input type="time" name="starttime" placeholder="" />
        <label>End time</label>
        <input type="time" name="endtime" placeholder="" />

        <label>Subject</label>

        <select name="subject">
        <option selected="selected"><?=$titleArray[0]?></option>
<?php
for($i = 1; $i < count($titleArray); $i++) {
?>
    <option><?=$titleArray[$i]?></option>
<?php } ?>
    </select>
        <input type="submit" name="logsession" /> 
      </form>

</div>

<div class="container">
     <div class="center">
        <p><a href="index.php" class="button">Back</a></p>
     </div>
</div>

</body>
</html>

