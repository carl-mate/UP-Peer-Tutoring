<?php include("top.html"); include("server.php"); 
// if user is not logged in, they cannot access this page
    if(empty($_SESSION['upmail'])){
        header('location: login.php');
    }

$query = "SELECT first_name, last_name, program FROM tutee WHERE upmail='" . $_SESSION['upmail'] . "'";
$result = mysqli_query($db, $query);

$first_name = "";
$last_name = "";
foreach($result as $row){
    $first_name = $row['first_name'];
    $last_name = $row['last_name'];
}

?>
<h1>Find and connect with a tutor!</h1>
<div class="content">
    <p class="big-paragraph">Hello, <strong><?=$first_name . " " . $last_name?></strong>. What subject do you need help with?</p>
<?php

$program = "";
foreach($result as $row){
    $program = $row['program'];
}

$titleArray = array();
$titleQuery = "SELECT title FROM subject WHERE program='$program'";
$titleResult = mysqli_query($db, $titleQuery);

foreach($titleResult as $row){
    $titleArray[] = $row['title'];
}
?>

<form action="list-tutor.php" method="get">
    <select name="subject">
    <option selected="selected"><?=$titleArray[0]?></option>
<?php
for($i = 1; $i < count($titleArray); $i++) {
?>
    <option><?=$titleArray[$i]?></option>
<?php } ?>
    </select>
        <input type="submit" name="find" />
    </div>

</form>
    
</div>

<div class="container">
     <div class="center">
        <p><a href="index.php" class="button">Back</a></p>
     </div>
</div>

</body>
</html>

