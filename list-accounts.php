<?php include("top.html"); include("server.php");

// if user is not logged in, they cannot access this page
    if(empty($_SESSION['adminEmail'])){
        header('location: admin-login.php');
    }
?>

<?php
if(isset($_GET['program'])){
    $program = $_GET['program'];
}
if(isset($_GET['studentType'])){
    $studentType = $_GET['studentType'];
}
?>

<p id="result">List of accounts in the program <strong><?=$program?></strong> with student type <strong><?=$studentType?></strong>.</p>
<?php

if($studentType == "Tutor"){
    $query = "SELECT tutor_id as id, first_name, last_name, upmail, program, year_level FROM tutor WHERE program = '$program'";
    $result = mysqli_query($db, $query);
} else if($studentType == "Tutee"){
    $query = "SELECT tutee_id as id, first_name, last_name, upmail, program, year_level FROM tutee WHERE program = '$program'";
    $result = mysqli_query($db, $query);
}

foreach($result as $row){
?>
<div class="match">
        <p>
        <img src="images/user.png" width=150 alt="User" /><span><?=$row['first_name'] . " " . $row['last_name']?></span>
        </p>

        <ul>
            <li><?="<strong>UP Mail: </strong>" . $row['upmail']?></li>
            <li><?="<strong>Year Level: </strong>" . $row['year_level']?></li>
            <li>
                <a href="delete-account.php?id=<?=$row['id']?>&amp;studentType=<?=$studentType?>">Delete Account</a>
            </li>
        </ul>


</div>
<?php } ?>
<div class="container">
     <div class="center">
        <p><a href="view-accounts.php" class="button">Back</a></p>
     </div>
</div>

</body>
</html>



