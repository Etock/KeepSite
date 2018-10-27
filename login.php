<?php
session_start();
include './phpfiles/dbh.php';
    
$username = mysqli_real_escape_string($db, $_POST['Username']);
$password = mysqli_real_escape_string($db, $_POST['Password']);

$password = md5($password);

$sql = "SELECT ID, clvl, SecurityLevel, FirstName, LastName
		FROM student
        WHERE FirstName = '$username'
        AND Password = '$password'";


$result = mysqli_query($db,$sql);
if($row = mysqli_fetch_assoc($result)){
    /* Setting Main Session Variables */
    $_SESSION['u_id'] = $row['ID']; 
    $_SESSION['u_last'] = $row['LastName'];
    $_SESSION['u_first'] = $row['FirstName'];
    $_SESSION['clvl'] = $row['clvl'];
    $_SESSION['SecurityLevel'] = $row['SecurityLevel'];
    header("Location: ../pages/dmcstats.php");
    exit();
}else{
    header("Location: index.php?QWW");
    exit();
}









