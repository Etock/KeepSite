<?php

include 'dbh.php';
$SID = mysqli_real_escape_string($db,$_POST['ID_Number']);
$password = mysqli_real_escape_string($db,$_POST['password']);
$passwordconfirm = mysqli_real_escape_string($db,$_POST['passwordconfirm']);

$SID = substr( $SID, 3, 10 );
$SID = "'" . $SID . "'";

if(strcmp($password, $passwordconfirm) != 0){
	header("Location: ../pages/dmcstudents.php?PWDM");
	mysqli_close($db);
}else{
$hashedpassword = md5($password);
$sql = "UPDATE student SET Password = '$hashedpassword' WHERE ID = $SID";
$result = mysqli_query($db,$sql);

if(!$result){
    header("Location: ../pages/dmcstudents.php?QWW");
    mysqli_close($db);
}else{
    header("Location: ../pages/dmcstudents.php?Success");
    mysqli_close($db);
}
}

